<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Core\Configure;

/**
 * BusinessBankDetails Model
 *
 * @property \Cake\ORM\Association\BelongsTo $UserBusinessBasicDetails
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\BusinessBankDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\BusinessBankDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BusinessBankDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BusinessBankDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BusinessBankDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BusinessBankDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BusinessBankDetail findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BusinessBankDetailsTable extends Table
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

        $this->setTable('business_bank_details');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('UserBusinessBasicDetails', [
            'foreignKey' => 'user_business_basic_detail_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->addBehavior('Josegonzalez/Upload.Upload', [
          'cheque_img_name' => [
            'path' => Configure::read('ImageUpload.cancelledChequeImages'),
            'fields' => [
              'dir' => 'cheque_img_path'
            ],
            'nameCallback' => function ($data, $settings) {
              return time(). str_replace(' ', '_', $data['name']) ;
            },
          ]
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
            ->requirePresence('bank_name', 'create')
            ->notEmpty('bank_name');

        $validator
            ->requirePresence('account_type', 'create')
            ->notEmpty('account_type');

        $validator
            ->requirePresence('bank_account_name', 'create')
            ->notEmpty('bank_account_name');

        $validator
            ->requirePresence('account_number', 'create')
            ->notEmpty('account_number');

        $validator
            ->requirePresence('bank_branch', 'create')
            ->notEmpty('bank_branch');

        $validator
            ->requirePresence('ifsc_code', 'create')
            ->notEmpty('ifsc_code');

        $validator
            ->boolean('status')
            ->allowEmpty('status');

        $validator
            ->allowEmpty('cheque_img_name');

        $validator
            ->allowEmpty('cheque_img_path');

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
        $rules->add($rules->existsIn(['user_business_basic_detail_id'], 'UserBusinessBasicDetails'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
