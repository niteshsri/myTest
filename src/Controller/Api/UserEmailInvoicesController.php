<?php
namespace App\Controller\Api;

use App\Controller\Api\ApiController;
use \Cake\Routing\Router;
/**
 * UserEmailInvoices Controller
 *
 * @property \App\Model\Table\UserEmailInvoicesTable $UserEmailInvoices
 *
 * @method \App\Model\Entity\UserEmailInvoice[] paginate($object = null, array $settings = [])
 */
class UserEmailInvoicesController extends ApiController
{

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
        $userEmailInvoices = $this->paginate($this->UserEmailInvoices);

        $this->set(compact('userEmailInvoices'));
        $this->set('_serialize', ['userEmailInvoices']);
    }

    /**
     * View method
     *
     * @param string|null $id User Email Invoice id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userEmailInvoice = $this->UserEmailInvoices->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('userEmailInvoice', $userEmailInvoice);
        $this->set('_serialize', ['userEmailInvoice']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userEmailInvoice = $this->UserEmailInvoices->newEntity($this->request->data);
        if (!$this->request->is('post')) {
            die('dasad');
        }
        $this->request->data['user_id']=$this->Auth->user('id');
            $userEmailInvoice = $this->UserEmailInvoices->patchEntity($userEmailInvoice, $this->request->getData());
            if ($this->UserEmailInvoices->save($userEmailInvoice)) {

             $data =array();
                $data['status']=true;
                $data['data'] = Router::url('/transact/'.$userEmailInvoice->uuid,true);
                $this->set('data',$data['data']);
                $this->set('status',$data['status']);
                $this->set('_serialize', ['status','data']);
            }else{
                    pr($userEmailInvoice);die;
            }
            
        
        
    }

    /**
     * Edit method
     *
     * @param string|null $id User Email Invoice id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userEmailInvoice = $this->UserEmailInvoices->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userEmailInvoice = $this->UserEmailInvoices->patchEntity($userEmailInvoice, $this->request->getData());
            if ($this->UserEmailInvoices->save($userEmailInvoice)) {
                $this->Flash->success(__('The user email invoice has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user email invoice could not be saved. Please, try again.'));
        }
        $users = $this->UserEmailInvoices->Users->find('list', ['limit' => 200]);
        $this->set(compact('userEmailInvoice', 'users'));
        $this->set('_serialize', ['userEmailInvoice']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User Email Invoice id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userEmailInvoice = $this->UserEmailInvoices->get($id);
        if ($this->UserEmailInvoices->delete($userEmailInvoice)) {
            $this->Flash->success(__('The user email invoice has been deleted.'));
        } else {
            $this->Flash->error(__('The user email invoice could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
