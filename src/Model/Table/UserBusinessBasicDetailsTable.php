<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserBusinessBasicDetails Model
 *
 * @property \Cake\ORM\Association\BelongsTo $BusinessTypes
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $BusinessCategories
 * @property \Cake\ORM\Association\BelongsTo $GovtDocuments
 * @property \Cake\ORM\Association\HasMany $BusinessBankDetails
 * @property \Cake\ORM\Association\HasMany $UserBusinessContactDetails
 *
 * @method \App\Model\Entity\UserBusinessBasicDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserBusinessBasicDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UserBusinessBasicDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserBusinessBasicDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserBusinessBasicDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserBusinessBasicDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserBusinessBasicDetail findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UserBusinessBasicDetailsTable extends Table
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

        $this->setTable('user_business_basic_details');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('BusinessTypes', [
            'foreignKey' => 'business_type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('BusinessCategories', [
            'foreignKey' => 'business_category_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('GovtDocuments', [
            'foreignKey' => 'govt_document_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('BusinessBankDetails', [
            'foreignKey' => 'user_business_basic_detail_id'
        ]);
        $this->hasMany('UserBusinessContactDetails', [
            'foreignKey' => 'user_business_basic_detail_id'
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
            ->requirePresence('legal_entity_name', 'create')
            ->notEmpty('legal_entity_name');

        $validator
            ->requirePresence('pan_number', 'create')
            ->notEmpty('pan_number');

        $validator
            ->allowEmpty('website_url');

        $validator
            ->boolean('status')
            ->allowEmpty('status');

        $validator
            ->allowEmpty('pan_img_name');

        $validator
            ->allowEmpty('pan_img_path');

        $validator
            ->allowEmpty('govt_id_img_name');

        $validator
            ->allowEmpty('govt_id_image_path');

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

        return $validator;
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
        $rules->add($rules->existsIn(['business_type_id'], 'BusinessTypes'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['business_category_id'], 'BusinessCategories'));
        $rules->add($rules->existsIn(['govt_document_id'], 'GovtDocuments'));

        return $rules;
    }
}
