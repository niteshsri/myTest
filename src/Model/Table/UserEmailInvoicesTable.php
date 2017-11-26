<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Utility\Text;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Exception\InternalErrorException;


/**
 * UserEmailInvoices Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\UserEmailInvoice get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserEmailInvoice newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UserEmailInvoice[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserEmailInvoice|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserEmailInvoice patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserEmailInvoice[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserEmailInvoice findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UserEmailInvoicesTable extends Table
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

        $this->setTable('user_email_invoices');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
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
            ->requirePresence('amount', 'create')
            ->notEmpty('amount');

        $validator
            ->allowEmpty('transcation_identifier');

        $validator
            ->dateTime('expiry_date')
            ->allowEmpty('expiry_date', 'create');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->requirePresence('customer_name', 'create')
            ->notEmpty('customer_name');

        $validator
            ->requirePresence('customer_email', 'create')
            ->notEmpty('customer_email');

        $validator
            ->requirePresence('customer_phone', 'create')
            ->notEmpty('customer_phone');

        $validator
            ->boolean('status')
            ->allowEmpty('status');

        $validator
            ->boolean('is_deleted')
            ->allowEmpty('is_deleted');

        $validator
            ->boolean('is_expired')
            ->allowEmpty('is_expired');

        $validator
            ->uuid('uuid')
            ->requirePresence('uuid', 'create')
            ->notEmpty('uuid');

        return $validator;
    }

      public function beforeMarshal( \Cake\Event\Event $event, \ArrayObject $data, \ArrayObject $options)
    {
      if (!isset($data['uuid'])) {
        $data['uuid'] = Text::uuid();
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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
