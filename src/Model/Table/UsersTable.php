<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use App\Controller\AppHelper;
use Cake\Utility\Text;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Roles
 * @property \Cake\ORM\Association\HasMany $BusinessBankDetails
 * @property \Cake\ORM\Association\HasMany $ResetPasswordHash
 * @property \Cake\ORM\Association\HasMany $UserAddress
 * @property \Cake\ORM\Association\HasMany $UserBusinessBasicDetails
 * @property \Cake\ORM\Association\HasMany $UserBusinessContactDetails
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('BusinessBankDetails', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('ResetPasswordHash', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserAddress', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserBusinessBasicDetails', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserBusinessContactDetails', [
            'foreignKey' => 'user_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->allowEmpty('last_name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('username', 'create')
            ->notEmpty('username')
            ->add('username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->allowEmpty('phone');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->boolean('status')
            ->allowEmpty('status');

        $validator
            ->boolean('is_individual')
            ->requirePresence('is_individual', 'create')
            ->notEmpty('is_individual');

        $validator
            ->boolean('is_verified')
            ->allowEmpty('is_verified');

        $validator
            ->boolean('is_approved')
            ->allowEmpty('is_approved');

        $validator
            ->dateTime('is_deleted')
            ->allowEmpty('is_deleted');

        $validator
            ->allowEmpty('remark');

        $validator
            ->integer('approved_by')
            ->allowEmpty('approved_by');

        $validator
            ->integer('last_modified_by')
            ->allowEmpty('last_modified_by');

        $validator
            ->allowEmpty('account_number');

        $validator
            ->allowEmpty('profile_img_name');

        $validator
            ->allowEmpty('profile_img_path');

        $validator
            ->allowEmpty('pan_number');

        $validator
            ->allowEmpty('adhaar_number');

        $validator
            ->allowEmpty('pan_img_name');

        $validator
            ->allowEmpty('pan_img_path');

        $validator
            ->allowEmpty('adhaar_img_name');

        $validator
            ->allowEmpty('adhaar_img_path');

        $validator
            ->uuid('uuid')
            ->allowEmpty('uuid');

        return $validator;
    }

    public function beforeSave($event, $entity, $options) {
    if($entity->isNew()){
      $entity['uuid'] = Text::uuid();
      $entity['account_number'] = AppHelper::generateCryptographicString('numeric','10');
      $entity['img_salt'] = AppHelper::generateCryptographicString();
    }
  }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->existsIn(['role_id'], 'Roles'));

        return $rules;
    }
}
