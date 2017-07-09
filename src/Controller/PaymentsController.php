<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PaymentsController Controller
 *
 *
 * @method \App\Model\Entity\PaymentsController[] paginate($object = null, array $settings = [])
 */
class PaymentsController extends AppController
{
  public function initialize()
  {
    parent::initialize();
  }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function transactions()
    {
    }
    public function settlements()
    {
    }
    public function disputes()
    {
    }
    public function refunds()
    {
    }
    /**
     * View method
     *
     * @param string|null $id Payments Controller id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $paymentsController = $this->PaymentsController->get($id, [
            'contain' => []
        ]);

        $this->set('paymentsController', $paymentsController);
        $this->set('_serialize', ['paymentsController']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $paymentsController = $this->PaymentsController->newEntity();
        if ($this->request->is('post')) {
            $paymentsController = $this->PaymentsController->patchEntity($paymentsController, $this->request->getData());
            if ($this->PaymentsController->save($paymentsController)) {
                $this->Flash->success(__('The payments controller has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payments controller could not be saved. Please, try again.'));
        }
        $this->set(compact('paymentsController'));
        $this->set('_serialize', ['paymentsController']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Payments Controller id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $paymentsController = $this->PaymentsController->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $paymentsController = $this->PaymentsController->patchEntity($paymentsController, $this->request->getData());
            if ($this->PaymentsController->save($paymentsController)) {
                $this->Flash->success(__('The payments controller has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payments controller could not be saved. Please, try again.'));
        }
        $this->set(compact('paymentsController'));
        $this->set('_serialize', ['paymentsController']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Payments Controller id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $paymentsController = $this->PaymentsController->get($id);
        if ($this->PaymentsController->delete($paymentsController)) {
            $this->Flash->success(__('The payments controller has been deleted.'));
        } else {
            $this->Flash->error(__('The payments controller could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
