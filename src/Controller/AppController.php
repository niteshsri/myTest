<?php
/**
* CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
* Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
*
* Licensed under The MIT License
* For full copyright and license information, please see the LICENSE.txt
* Redistributions of files must retain the above copyright notice.
*
* @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
* @link      http://cakephp.org CakePHP(tm) Project
* @since     0.2.9
* @license   http://www.opensource.org/licenses/mit-license.php MIT License
*/
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
* Application Controller
*
* Add your application-wide methods in the class below, your controllers
* will inherit them.
*
* @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
*/
class AppController extends Controller
{

  /**
  * Initialization hook method.
  *
  * Use this method to add common initialization code like loading components.
  *
  * e.g. `$this->loadComponent('Security');`
  *
  * @return void
  */
  public function initialize()
  {
    $this->loadComponent('Flash');
    // $this->loadComponent('Security');
    // $this->loadComponent('Csrf');
    $this->loadComponent('Auth', [
      'authorize'=> 'Controller',//added this line
      'loginAction' => [
        'controller' => 'Users',
        'action' => 'login'
      ],
      'storage' => 'Session',
      'unauthorizedRedirect' => $this->referer()
    ]);


    // Allow the display action so our pages controller
    // continues to work.
    $this->Auth->allow(['display']);
  }
  /**
  * Before render callback.
  *
  * @param \Cake\Event\Event $event The beforeRender event.
  * @return \Cake\Network\Response|null|void
  */
  public function beforeRender(Event $event)
  {
    if (!array_key_exists('_serialize', $this->viewVars) &&
    in_array($this->response->type(), ['application/json', 'application/xml'])
    ) {
      $this->set('_serialize', true);
    }
  }
  public function isAuthorized($user)
  {
    return true;
  }

  public function beforeFilter(Event $event)
  {
      $user = $this->Auth->user();
      if($user){
        $fullName = ($user['last_name'])?$user['first_name'].' '.$user['last_name']: $user['first_name'];
        $sideNavData = ['id'=>$user['id'],
        'full_name'=>$fullName,'first_name' => $user['first_name'],'last_name' => $user['last_name'],
        'is_approved'=> $user['is_approved'] ,
        'is_verified'=> $user['is_verified'] ,
        'role_name' => $user['role']['name'],'role_label' => $user['role']['label']];
        $this->set('sideNavData', $sideNavData);
      }
   }

}
