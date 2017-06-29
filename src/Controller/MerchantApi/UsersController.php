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
		$user = $this->Users->findById($id)->contain(['UserAddress','UserBusinessBasicDetails.UserBusinessContactDetails'])->first();
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
		if(isset($requestData['is_approved'])){
			$processRequest['is_approved'] =  $requestData['is_approved'];
		}
		if(isset($requestData['is_verified'])){
			$processRequest['is_verified'] = $requestData['is_verified'];
		}
		if(isset($requestData['remark'])){
			$processRequest['remark'] = $requestData['remark'];
		}
		$user = $this->Users->patchEntity($user,$processRequest);
		if($user->errors()){
			pr($user->errors());die;
		}
		if(!$this->Users->save($user)){
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
