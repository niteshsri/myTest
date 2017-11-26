<?php
namespace App\Controller;

use App\Controller\AppController;

/**
* Users Controller
*
* @property \App\Model\Table\UsersTable $Users
*/
class UsersController extends AppController
{
  public function initialize()
  {
    parent::initialize();
    $this->Auth->allow(['logout','add','login']);
  }

  /**
  * Index method
  *
  * @return \Cake\Network\Response|null
  */
  public function index()
  {
    $userData = $this->Users->findById($this->Auth->user('id'))->contain(['UserAddress','UserBusinessBasicDetails','UserBusinessContactDetails','BusinessBankDetails'])->first();
    $this->loadModel('BusinessTypes');
    $businessType = $this->BusinessTypes->find('list')->toArray();
    $this->loadModel('BusinessCategories');
    $businessCat = $this->BusinessCategories->find('list')->toArray();
    $this->loadModel('GovtDocuments');
    $govtDocs = $this->GovtDocuments->find('list')->toArray();
    $this->set(compact('userData'));
    $this->set(compact('businessType'));
    $this->set(compact('businessCat'));
    $this->set(compact('govtDocs'));
    $this->set('_serialize', ['userData','businessType','businessCat','govtDocs']);
  }
  public function dashboard()
  {
    $userData = $this->Users->findById($this->Auth->user('id'))->first();
    $this->loadModel('UserTransactions');
    $userTransactions= $this->UserTransactions->findByUserId($this->Auth->user('id'));
    $totalTransations = $userTransactions->sumOf('amount'); 
    $successfulTransations = $this->UserTransactions->findByUserId($this->Auth->user('id'))->where(['transcation_identifier'=>'1'])->count();
    $failedTransations = $this->UserTransactions->findByUserId($this->Auth->user('id'))->where(['transcation_identifier'=>'0'])->sumOf('amount');
    $pendingTransations = $this->UserTransactions->findByUserId($this->Auth->user('id'))->where(['transcation_identifier'=>'2'])->sumOf('amount'); 
    $refundTransations = $this->UserTransactions->findByUserId($this->Auth->user('id'))->where(['transcation_identifier'=>'3'])->sumOf('amount'); 
    $collectionTransations = $this->UserTransactions->findByUserId($this->Auth->user('id'))->where(['transcation_identifier'=>'4'])->sumOf('amount');
    $this->set(compact('userData','totalTransations','successfulTransations','failedTransations','pendingTransations','refundTransations','collectionTransations'));
    $this->set('_serialize', ['userData']);
  }

  /**
  * View method
  *
  * @param string|null $id User id.
  * @return \Cake\Network\Response|null
  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
  */
  public function view($id = null)
  {
    $userData = $this->Users->findById($this->Auth->user('id'))->contain(['UserAddress','UserBusinessBasicDetails','UserBusinessContactDetails','BusinessBankDetails'])->first();
    $this->set(compact('userData'));
    $this->set('_serialize', ['userData']);
  }

  /**
  * Add method
  *
  * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
  */
  public function add()
  {
    $this->viewBuilder()->layout('login-users');
    $user = $this->Users->newEntity();
    if ($this->request->is('post')) {
      $data = $this->request->getData();
      $isValidated = true;
      if($data['password'] != $data['cnf_password']){
        $this->Flash->error(__('Kindly enter correct password.'));
        $isValidated = false;
      }else{
        if(isset($data['email'])&& $data['email']){
          $data['username'] = $data['email'];
        }else{
          $this->Flash->error(__('Kindly provide valid email.'));
          $isValidated = false;
        }
      }
      if($data['is_individual'] != 'Individual' && $data['is_individual'] != 'Business'){
        $this->Flash->error(__('Kindly select valid Sign Up option.'));
        $isValidated = false;
      }else{
          $data['is_individual'] = ($data['is_individual'] == 'Individual')?1:0;
      }

      if($isValidated){
        $user = $this->Users->patchEntity($user, $data);
        if ($this->Users->save($user)) {
          $this->Flash->success(__('The user has been saved.'));
          return $this->redirect(['action' => 'index']);
        }else{
          pr($user->errors());die;
          $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
      }
    }
    $this->set(compact('user'));
    $this->set('_serialize', ['user']);
  }

  /**
  * Edit method
  *
  * @param string|null $id User id.
  * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
  * @throws \Cake\Network\Exception\NotFoundException When record not found.
  */
  public function edit($id = null)
  {
    $user = $this->Users->get($id, [
      'contain' => []
    ]);
    if ($this->request->is(['patch', 'post', 'put'])) {
      $user = $this->Users->patchEntity($user, $this->request->getData());
      if ($this->Users->save($user)) {
        $this->Flash->success(__('The user has been saved.'));

        return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('The user could not be saved. Please, try again.'));
    }
    $this->set(compact('user'));
    $this->set('_serialize', ['user']);
  }

  /**
  * Delete method
  *
  * @param string|null $id User id.
  * @return \Cake\Network\Response|null Redirects to index.
  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
  */
  public function delete($id = null)
  {
    $this->request->allowMethod(['post', 'delete']);
    $user = $this->Users->get($id);
    if ($this->Users->delete($user)) {
      $this->Flash->success(__('The user has been deleted.'));
    } else {
      $this->Flash->error(__('The user could not be deleted. Please, try again.'));
    }

    return $this->redirect(['action' => 'index']);
  }

  public function login()
  {
    // Layout for the admin login
    $this->viewBuilder()->layout('login-users');
    if ($this->request->is('post')) {
      $user = $this->Auth->identify();
      if ($user) {
        $this->loadModel('Roles');
        $user['role'] =  $this->Roles->find('RolesById', ['role' => $user['role_id']])->select(['name', 'label'])->first();
        $this->Auth->setUser($user);
        if(!($user['is_approved'])){
          $this->redirect(['controller' => 'Users',
          'action' => 'index']);
        }else{
          $this->redirect(['controller' => 'Users',
          'action' => 'dashboard']);
        }

      }else{
        $this->Flash->error(__('Invalid User name or password'));
      }
    }
  }
  public function logout()
  {
    $this->Flash->success('You are now logged out.');
    return $this->redirect($this->Auth->logout());
  }
  public function downloads()
  {

  }
  public function referrals()
  {

  }
  public function isAuthorized($user)
  {
    $action = $this->request->getParam('action');

    // The add and index actions are always allowed.
    // return parent::isAuthorized($user);
    return true;
  }
  public function updateUserAddress()
  {
    if ($this->request->is('post')) {
      $reqData = [];
      $isValidated  = true;
      $user = $this->Users->findById($this->Auth->user('id'))->first();
      if($this->request->data['first_name']){
        $reqProfileData['first_name'] = $this->request->data['first_name'];
      }else{
        $this->Flash->error(__('Kindly Provide valid Name.'));
        $isValidated  = false;
      }
      if($this->request->data['last_name']){
        $reqProfileData['last_name'] = $this->request->data['last_name'];
      }else{
        $this->Flash->error(__('Kindly Provide valid Name.'));
        $isValidated  = false;
      }
      if($this->request->data['email']){
        $reqProfileData['email'] = $this->request->data['email'];
      }else{
        $this->Flash->error(__('Kindly Provide valid Email.'));
        $isValidated  = false;
      }
      if($this->request->data['phone']){
        $reqProfileData['phone'] = $this->request->data['phone'];
      }else{
        $this->Flash->error(__('Kindly Provide valid Email.'));
        $isValidated  = false;
      }
      if($this->request->data['pan_number']){
        $reqProfileData['pan_number'] = $this->request->data['pan_number'];
      }else{
        $this->Flash->error(__('Kindly Provide valid Pan Number.'));
        $isValidated  = false;
      }
      if($this->request->data['pan_image_name']){
        $reqProfileData['pan_img_name'] = $this->request->data['pan_image_name'];
      }else{
        $this->Flash->error(__('Kindly Provide valid Pan Number.'));
        $isValidated  = false;
      }
      if($this->request->data['adhaar_number']){
        $reqProfileData['adhaar_number'] = $this->request->data['adhaar_number'];
      }else{
        $this->Flash->error(__('Kindly Provide valid Adhaar Number.'));
        $isValidated  = false;
      }
      if($this->request->data['adhaar_image_name']){
        $reqProfileData['adhaar_img_name'] = $this->request->data['adhaar_image_name'];
      }else{
        $this->Flash->error(__('Kindly Provide valid Adhaar Number.'));
        $isValidated  = false;
      }
      if($this->request->data['address1']){
        $reqData['address1'] = $this->request->data['address1'];
      }else{
        $this->Flash->error(__('Kindly Provide valid Address.'));
        $isValidated  = false;
      }
      if($this->request->data['address2']){
        $reqData['address2'] = $this->request->data['address2'];
      }
      if($this->request->data['city']){
        $reqData['city'] = $this->request->data['city'];
      }else{
        $this->Flash->error(__('Kindly Provide valid City.'));
        $isValidated  = false;
      }
      if($this->request->data['state']){
        $reqData['state'] = $this->request->data['state'];
      }else{
        $this->Flash->error(__('Kindly Provide valid State.'));
        $isValidated  = false;
      }
      if($this->request->data['country']){
        $reqData['country'] = $this->request->data['country'];
      }else{
        $this->Flash->error(__('Kindly Provide valid Country.'));
        $isValidated  = false;
      }
      if($this->request->data['pin_code']){
        $reqData['zip'] = $this->request->data['pin_code'];
      }else{
        $this->Flash->error(__('Kindly Provide valid Pin Code.'));
        $isValidated  = false;
      }
      if($isValidated){
        $reqData['user_id']=$this->Auth->user('id');
        $reqProfileData['user_address']= [$reqData];
        $req  = $this->Users->patchEntity($user, $reqProfileData,['associated'=>'UserAddress']);
        $req  = $this->Users->patchEntity($req, $reqProfileData,['associated'=>'UserAddress']);
        if($this->Users->save($req,['associated'=>'UserAddress'])){
          $this->Flash->success(__('Address updated successfully.'));
        }else{
          $this->Flash->error(__('Kindly Provide valid Data.'));
        }
      }
    }else{
      $this->Flash->error(__('Invalid Request.'));
    }
    $this->redirect(['controller' => 'Users',
    'action' => 'index']);
    return;
  }
  public function updateBusinessDetails()
  {
    if ($this->request->is('post')) {
      // pr($this->request->data);die;
      $reqData = [];
      $reqAddData = [];
      $isValidated  = true;
      if($this->request->data['business_type']){
        $reqData['business_type_id'] = $this->request->data['business_type'];
      }else{
        $this->Flash->error(__('Kindly Provide valid Business Type.'));
        $isValidated  = false;
      }
      if($this->request->data['entity_name']){
        $reqData['legal_entity_name'] = $this->request->data['entity_name'];
      }else{
        $this->Flash->error(__('Kindly Provide valid Legal Entity Name.'));
        $isValidated  = false;
      }
      if($this->request->data['website_url']){
        $reqData['website_url'] = $this->request->data['website_url'];
      }else{
        $this->Flash->error(__('Kindly Provide valid Website Url.'));
        $isValidated  = false;
      }
      if($this->request->data['business_category']){
        $reqData['business_category_id'] = $this->request->data['business_category'];
      }else{
        $this->Flash->error(__('Kindly Provide valid Business Category.'));
        $isValidated  = false;
      }
      if($this->request->data['business_pan_card']){
        $reqData['pan_number'] = $this->request->data['business_pan_card'];
      }else{
        $this->Flash->error(__('Kindly Provide valid PAN Card Number.'));
        $isValidated  = false;
      }
      if($this->request->data['pan_img_name']){
        $reqData['pan_img_name'] = $this->request->data['pan_img_name'];
      }else{
        $this->Flash->error(__('Kindly Provide valid Pan Image.'));
        $isValidated  = false;
      }
      if($this->request->data['govt_document_id']){
        $reqData['govt_document_id'] = $this->request->data['pan_img_name'];
      }else{
        $this->Flash->error(__('Kindly select Govt document.'));
        $isValidated  = false;
      }
      if($this->request->data['govt_id_img_name']){
        $reqData['govt_id_img_name'] = $this->request->data['govt_id_img_name'];
      }else{
        $this->Flash->error(__('Kindly Provide valid Govt Id Image.'));
        $isValidated  = false;
      }
      if($this->request->data['business_address1']){
        $reqAddData['address1'] = $this->request->data['business_address1'];
      }else{
        $this->Flash->error(__('Kindly Provide valid Address.'));
        $isValidated  = false;
      }
      if($this->request->data['business_address2']){
        $reqAddData['address2'] = $this->request->data['business_address2'];
      }
      if($this->request->data['business_pin_code']){
        $reqAddData['zip'] = $this->request->data['business_pin_code'];
      }else{
        $this->Flash->error(__('Kindly Provide valid pin code.'));
        $isValidated  = false;
      }
      if($this->request->data['business_city']){
        $reqAddData['city'] = $this->request->data['business_city'];
      }else{
        $this->Flash->error(__('Kindly Provide valid city.'));
        $isValidated  = false;
      }
      if($this->request->data['business_state']){
        $reqAddData['state'] = $this->request->data['business_state'];
      }else{
        $this->Flash->error(__('Kindly Provide valid state.'));
        $isValidated  = false;
      }
      if($this->request->data['business_country']){
        $reqAddData['country'] = $this->request->data['business_country'];
      }else{
        $this->Flash->error(__('Kindly Provide valid country.'));
        $isValidated  = false;
      }
      if($isValidated){
        $reqData['user_id'] =  $this->Auth->user('id');
        $reqAddData['user_id'] =  $this->Auth->user('id');
        $this->loadModel('userBusinessBasicDetails');
        $reqData['user_business_contact_details'] = [$reqAddData];
        $req = $this->userBusinessBasicDetails->newEntity($reqData);
        $req = $this->userBusinessBasicDetails->patchEntity($req,$reqData);
        if($this->userBusinessBasicDetails->save($req)){
          $this->Flash->success(__('Business Detail updated successfully.'));
        }else{
          $this->Flash->error(__('Kindly Provide valid Business Details.'));
        }
      }
    }else{
      $this->Flash->error(__('Invalid Request.'));
    }
    $this->redirect(['controller' => 'Users',
    'action' => 'index']);
    return;
  }
  public function updateBusinessBankDetails()
  {
    if ($this->request->is('post')) {
      $reqData = [];
      $isValidated  = true;
      if($this->request->data['name']){
        $reqData['bank_account_name'] = $this->request->data['name'];
      }else{
        $this->Flash->error(__('Kindly Provide valid Account Holder Name.'));
        $isValidated  = false;
      }
      if($this->request->data['bank_name']){
        $reqData['bank_name'] = $this->request->data['bank_name'];
      }else{
        $this->Flash->error(__('Kindly Provide valid Bank Name.'));
        $isValidated  = false;
      }
      if($this->request->data['account_number']){
        $reqData['account_number'] = $this->request->data['account_number'];
      }else{
        $this->Flash->error(__('Kindly Provide valid Account Holder Name.'));
        $isValidated  = false;
      }
      if($this->request->data['bank_branch']){
        $reqData['bank_branch'] = $this->request->data['bank_branch'];
      }else{
        $this->Flash->error(__('Kindly Provide valid Bank Branch Name.'));
        $isValidated  = false;
      }
      if($this->request->data['ifsc']){
        $reqData['ifsc_code'] = $this->request->data['ifsc'];
      }else{
        $this->Flash->error(__('Kindly Provide valid IFSC Code.'));
        $isValidated  = false;
      }
      if($this->request->data['account_type']){
        $reqData['account_type'] = $this->request->data['account_type'];
      }else{
        $this->Flash->error(__('Kindly Provide valid Account Type.'));
        $isValidated  = false;
      }
      if($this->request->data['cheque_img_name']){
        $reqData['cheque_img_name'] = $this->request->data['cheque_img_name'];
      }else{
        $this->Flash->error(__('Kindly Provide valid Cancelled Cheque Image.'));
        $isValidated  = false;
      }
      $userBusinessBasicDetails = $this->Users->findById($this->Auth->user('id'))->contain(['UserBusinessBasicDetails'])->first();
      if(!empty($userBusinessBasicDetails->user_business_basic_details) && !$userBusinessBasicDetails->is_individual){
        $reqData['user_business_basic_detail_id'] = $userBusinessBasicDetails->user_business_basic_details[0]->id;
      }else{
        if(!$userBusinessBasicDetails->is_individual){
          $this->Flash->error(__('Kindly Provide Business Detail First.'));
          $isValidated  = false;
        }
      }
      if($isValidated){
        $reqData['user_id']=$this->Auth->user('id');
        $this->loadModel('BusinessBankDetails');
        $req  = $this->BusinessBankDetails->newEntity($reqData);
        $req  = $this->BusinessBankDetails->patchEntity($req, $reqData);
        if($this->BusinessBankDetails->save($req)){
          $this->Flash->success(__('Bank Details updated successfully.'));
        }else{
          $this->Flash->error(__('Kindly Provide valid Data.'));
        }
      }
    }else{
      $this->Flash->error(__('Invalid Request.'));
    }
    $this->redirect(['controller' => 'Users',
    'action' => 'index']);
    return;
  }
}
