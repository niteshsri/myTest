<?php
namespace App\Controller\MerchantApi;

use App\Controller\MerchantApi\ApiController;
use Cake\Network\Exception\MethodNotAllowedException;
use Cake\Network\Exception\BadRequestException;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Network\Exception\ConflictException;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Exception\InternalErrorException;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Collection\Collection;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\Routing\Router;

/**
* Legacy Redemptions Controller
*
* @property \App\Model\Table\LegacyRedemptionsTable $legacyRedemptions
*/
class UsersController extends ApiController
{
	public function initialize()
	{
		parent::initialize();
		$this->loadComponent('RequestHandler');
		$this->Auth->allow(['index','view','edit']);
	}
	public function view($id)
	{
		if (!$this->request->is(['get'])) {
			throw new MethodNotAllowedException(__('BAD_REQUEST'));
		}
		$user = $this->Users->findById($id)->contain(['UserAddress','UserBusinessBasicDetails.UserBusinessContactDetails','BusinessBankDetails','UserBusinessBasicDetails.BusinessTypes','UserBusinessBasicDetails.BusinessCategories','UserBusinessBasicDetails.GovtDocuments'])->first();
		if(!$user){
			throw new NotFoundException(__('ENTITY_DOES_NOT_EXISTS','User'));
		}
		$data =array();
		$data['status']=true;
		$data['data']=$user;
		$this->set('data',$data['data']);
		$this->set('status',$data['status']);
		$this->set('_serialize', ['status','data']);
	}
	public function index()
	{
		if (!$this->request->is(['get'])) {
			throw new MethodNotAllowedException(__('BAD_REQUEST'));
		}
		$queryData = $this->request->query;
		$user = $this->Users->find()->toArray();
		$data =array();
		$data['status']=true;
		$data['data']=$user;
		$this->set('data',$data['data']);
		$this->set('status',$data['status']);
		$this->set('_serialize', ['status','data']);
	}
	public function edit($id)
	{
		if (!$this->request->is(['post','put'])) {
			throw new MethodNotAllowedException(__('BAD_REQUEST'));
		}
		$requestData = $this->request->data;
		if(!$requestData){
			throw new BadRequestException(__('BAD_REQUEST'));
		}
		$user = $this->Users->findById($id)->first();
		if(!$user){
			throw new NotFoundException(__('ENTITY_DOES_NOT_EXISTS','User'));
		}
		$processRequest=[];		
		$processRequest['id'] =  $id;
		if(!$requestData['emp_id']){
			throw new BadRequestException(__('Kindly provide emp Id'));
		}
		if(isset($requestData['is_approved'])){
			$processRequest['is_approved'] =  $requestData['is_approved'];
		}
		if((isset($requestData['is_approved']) && empty($requestData['is_approved']) && !isset($requestData['remark'])) ||
		isset($requestData['is_approved']) && empty($requestData['is_approved']) && isset($requestData['remark']) && empty($requestData['remark'])){
				throw new BadRequestException(__('Kindly provide reasons to decline merchant application'));
		}
		$processRequest['approved_by'] = $requestData['emp_id'];
		$processRequest['last_modified_by'] = $requestData['emp_id'];
		if(isset($requestData['remark'])){
			$processRequest['remark'] = $requestData['remark'];
		}
		$businessRequest = null;
		if(isset($requestData['business_data'])){
			$this->loadModel('UserBusinessBasicDetails');
			$businessData = $this->UserBusinessBasicDetails->find()->where(['id'=>$requestData['business_data']['business_id'],'user_id'=>$id])->first();
			if(!$businessData){
				throw new NotFoundException(__('ENTITY_DOES_NOT_EXISTS','Business Data'));
			}
			if(isset($requestData['id'])){
				$businessRequest['id'] =  $requestData['business_data']['business_id'];
			}
			if(isset($requestData['is_approved'])){
				$businessRequest['is_approved'] =  $requestData['business_data']['is_approved'];
				$businessRequest['is_verified'] = $requestData['business_data']['is_verified'];
			}
			if((isset($requestData['business_data']['is_approved']) && empty($requestData['business_data']['is_approved']) && !isset($requestData['business_data']['remark'])) ||
			isset($requestData['business_data']['is_approved']) && empty($requestData['business_data']['is_approved']) && isset($requestData['business_data']['remark']) && empty($requestData['business_data']['remark'])){
					throw new BadRequestException(__('Kindly provide reasons to decline merchant business application'));
			}
			if(isset($requestData['remark'])){
				$businessRequest['remark'] = $requestData['business_data']['remark'];
			}
			$businessRequest['approved_by'] = $requestData['emp_id'];
			$businessRequest['last_modified_by'] = $requestData['emp_id'];
		}
		if($businessRequest){
			$processRequest['user_business_basic_details']=[$businessRequest];
		}
		$bankRequest = null;
		if(isset($requestData['bank_data'])){
			$this->loadModel('BusinessBankDetails');
			$bankData = $this->UserBusinessBasicDetails->find()->where(['id'=>$requestData['bank_data']['bank_id'],'user_id'=>$id])->first();
			if(!$bankData){
				throw new NotFoundException(__('ENTITY_DOES_NOT_EXISTS','Bank Data'));
			}
			if(isset($requestData['id'])){
				$bankRequest['id'] =  $requestData['bank_data']['bank_id'];
			}
			if(isset($requestData['is_approved'])){
				$bankRequest['is_approved'] =  $requestData['bank_data']['is_approved'];
				$bankRequest['is_verified'] = $requestData['bank_data']['is_verified'];
			}
			if((isset($requestData['bank_data']['is_approved']) && empty($requestData['bank_data']['is_approved']) && !isset($requestData['bank_data']['remark'])) ||
			isset($requestData['bank_data']['is_approved']) && empty($requestData['bank_data']['is_approved']) && isset($requestData['bank_data']['remark']) && empty($requestData['bank_data']['remark'])){
					throw new BadRequestException(__('Kindly provide reasons to decline merchant bank application'));
			}
			if(isset($requestData['remark'])){
				$bankRequest['remark'] = $requestData['bank_data']['remark'];
			}
			$bankRequest['approved_by'] = $requestData['emp_id'];
			$bankRequest['last_modified_by'] = $requestData['emp_id'];
		}
		if($bankRequest){
			$processRequest['business_bank_details']=[$bankRequest];
		}
		$user = $this->Users->patchEntity($user,$processRequest,['associated'=>['UserBusinessBasicDetails','BusinessBankDetails']]);
		if($user->errors()){
			pr($user->errors());die;
		}
		if(!$this->Users->save($user,['associated'=>['UserBusinessBasicDetails','BusinessBankDetails']])){
			throw new InternalErrorException(__('Something went wrong'));
		}
		$data =array();
		$data['status']=true;
		$data['data']=$user;
		$this->set('data',$data['data']);
		$this->set('status',$data['status']);
		$this->set('_serialize', ['status','data']);
	}
}
