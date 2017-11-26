<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserEmailInvoice Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $amount
 * @property string $transcation_identifier
 * @property \Cake\I18n\FrozenTime $expiry_date
 * @property string $description
 * @property string $customer_name
 * @property string $customer_email
 * @property string $customer_phone
 * @property bool $status
 * @property bool $is_deleted
 * @property bool $is_expired
 * @property string $uuid
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class UserEmailInvoice extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
