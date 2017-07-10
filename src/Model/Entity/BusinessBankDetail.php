<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Routing\Router;

/**
 * BusinessBankDetail Entity
 *
 * @property int $id
 * @property int $user_business_basic_detail_id
 * @property int $user_id
 * @property string $bank_name
 * @property string $account_type
 * @property string $bank_account_name
 * @property string $account_number
 * @property string $bank_branch
 * @property string $ifsc_code
 * @property bool $status
 * @property string $cheque_img_name
 * @property string $cheque_img_path
 * @property bool $is_approved
 * @property \Cake\I18n\FrozenTime $is_deleted
 * @property string $remark
 * @property int $approved_by
 * @property int $last_modified_by
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\UserBusinessBasicDetail $user_business_basic_detail
 * @property \App\Model\Entity\User $user
 */
class BusinessBankDetail extends Entity
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
      protected $_virtual = ['cancelled_cheque_image_url'];

    protected function _getCancelledChequeImageUrl()
      {
          if(isset($this->_properties['cheque_img_name']) && is_array($this->_properties['cheque_img_name'])){
              $this->_properties['cheque_img_name'] = '';
          }
          if(isset($this->_properties['cheque_img_name']) && !empty($this->_properties['cheque_img_name'])) {
              $url = Router::url('/cancelled_cheque/'.$this->_properties['cheque_img_name'],true);
          }else{
              $url = Router::url('/img/default-img.jpeg',true);
          }
          return $url;
      }
}
