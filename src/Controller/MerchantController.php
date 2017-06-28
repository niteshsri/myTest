<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;


/**
* Settings Controller
*
* @property \App\Model\Table\SettingsTable $Settings
*/
class Merchantontroller extends AppController
{

  /**
  * Index method
  *
  * @return \Cake\Network\Response|null
  */
  public function index()
  {
    $this->loadComponent('UserPanel');
    $cardSeries = $this->UserPanel->ViewMerchants();
    pr($cardSeries);die;
    if(!$cardSeries['status']){
      foreach ($cardSeries['response']->error as $key => $value) {
        $this->Flash->error(__($value));
      }
    }
    $this->set('_serialize', ['cardSeries']);
  }

}
