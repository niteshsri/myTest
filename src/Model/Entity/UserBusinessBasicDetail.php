<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserBusinessBasicDetail Entity
 *
 * @property int $id
 * @property int $business_type_id
 * @property int $user_id
 * @property string $legal_entity_name
 * @property string $pan_number
 * @property int $business_category_id
 * @property string $website_url
 * @property bool $status
 * @property string $pan_img_name
 * @property string $pan_img_path
 * @property int $govt_document_id
 * @property string $govt_id_img_name
 * @property string $govt_id_image_path
 * @property bool $is_approved
 * @property \Cake\I18n\FrozenTime $is_deleted
 * @property string $remark
 * @property int $approved_by
 * @property int $last_modified_by
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\BusinessType $business_type
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\BusinessCategory $business_category
 * @property \App\Model\Entity\GovtIdentification $govt_identification
 * @property \App\Model\Entity\BusinessBankDetail[] $business_bank_details
 * @property \App\Model\Entity\UserBusinessContactDetail[] $user_business_contact_details
 */
class UserBusinessBasicDetail extends Entity
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
