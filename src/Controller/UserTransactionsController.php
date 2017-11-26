<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserTransactions Controller
 *
 * @property \App\Model\Table\UserTransactionsTable $UserTransactions
 *
 * @method \App\Model\Entity\UserTransaction[] paginate($object = null, array $settings = [])
 */
class UserTransactionsController extends AppController
{

 public function initialize()
  {
    parent::initialize();
    $this->Auth->allow(['emailInvoiceTransaction','Transaction']);
  }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $userTransactions = $this->paginate($this->UserTransactions);

        $this->set(compact('userTransactions'));
        $this->set('_serialize', ['userTransactions']);
    }

    /**
     * View method
     *
     * @param string|null $id User Transaction id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userTransaction = $this->UserTransactions->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('userTransaction', $userTransaction);
        $this->set('_serialize', ['userTransaction']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userTransaction = $this->UserTransactions->newEntity();
        if ($this->request->is('post')) {
            $userTransaction = $this->UserTransactions->patchEntity($userTransaction, $this->request->getData());
            if ($this->UserTransactions->save($userTransaction)) {
                $this->Flash->success(__('The user transaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user transaction could not be saved. Please, try again.'));
        }
        $users = $this->UserTransactions->Users->find('list', ['limit' => 200]);
        $this->set(compact('userTransaction', 'users'));
        $this->set('_serialize', ['userTransaction']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User Transaction id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userTransaction = $this->UserTransactions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userTransaction = $this->UserTransactions->patchEntity($userTransaction, $this->request->getData());
            if ($this->UserTransactions->save($userTransaction)) {
                $this->Flash->success(__('The user transaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user transaction could not be saved. Please, try again.'));
        }
        $users = $this->UserTransactions->Users->find('list', ['limit' => 200]);
        $this->set(compact('userTransaction', 'users'));
        $this->set('_serialize', ['userTransaction']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User Transaction id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userTransaction = $this->UserTransactions->get($id);
        if ($this->UserTransactions->delete($userTransaction)) {
            $this->Flash->success(__('The user transaction has been deleted.'));
        } else {
            $this->Flash->error(__('The user transaction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function emailInvoiceTransaction(){
        $this->viewBuilder()->layout('transaction-layout');
        $uuid = (isset($this->request->params['hash_key']))?($this->request->params['hash_key']):null;
        if(!$uuid){
            $this->Flash->error(__('Invalid transaction.'));
        }
        $this->loadModel('userEmailInvoices');
        $userEmailInvoiceData =  $this->userEmailInvoices->find()->contain(['Users'])->where(['userEmailInvoices.uuid'=>$uuid,'userEmailInvoices.status'=>1])->first();
        if(!$userEmailInvoiceData){
            pr('invalid transaction');die;
        }
        $this->set(compact('userEmailInvoiceData'));
        $this->set('_serialize', ['userEmailInvoiceData']);
    }
    public function Transaction(){
        $data = $this->request->data;
        $this->loadModel('userEmailInvoices');
        $userEmailInvoiceData =  $this->userEmailInvoices->find()->contain(['Users'])->where(['userEmailInvoices.uuid'=>$data['uuid'],'userEmailInvoices.status'=>1])->first();
       
        $this->loadModel('userTransactions');
        $reqData = [
            'user_id'=>$userEmailInvoiceData['user_id'],
            'amount'=>$userEmailInvoiceData['amount'],
            'user_email_invoice_id'=>$userEmailInvoiceData['id'],
            'transcation_identifier'=>$data['status'],
            'status'=>0,
            'is_deleted'=>0,
        ];
        $userTransactionData = $this->userTransactions->newEntity($reqData);
        $userTransactionData = $this->userTransactions->patchEntity($userTransactionData,$reqData);
        if($this->userTransactions->save($userTransactionData)){
             $this->userEmailInvoices->updateAll(['transcation_identifier'=>$userTransactionData->id,'status'=>0],['userEmailInvoices.uuid'=>$data['uuid']]);
            pr('transaction success');die;
        }else{

            pr('transaction failed');die;
        }
        $this->set(compact('userEmailInvoiceData'));
        $this->set('_serialize', ['userEmailInvoiceData']);
    }
}
