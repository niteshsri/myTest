<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BusinessCategories Model
 *
 * @property \Cake\ORM\Association\HasMany $UserBusinessBasicDetails
 *
 * @method \App\Model\Entity\BusinessCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\BusinessCategory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BusinessCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BusinessCategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BusinessCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BusinessCategory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BusinessCategory findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BusinessCategoriesTable extends Table
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

        $this->setTable('business_categories');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('UserBusinessBasicDetails', [
            'foreignKey' => 'business_category_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('label', 'create')
            ->notEmpty('label');

        $validator
            ->boolean('status')
            ->allowEmpty('status');

        $validator
            ->dateTime('is_deleted')
            ->allowEmpty('is_deleted');

        $validator
            ->integer('last_modified_by')
            ->allowEmpty('last_modified_by');

        return $validator;
    }
}
