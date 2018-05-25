<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

class AppController extends Controller{

    private $publicAllow = [
        /*PUBLIC PAGE ACCESS*/
        'login',
        'logout',
        'myImage',
        /*PUBLIC API ACCESS*/
        'supervisorGetProcesses',
        'supervisorGetTickets',
        'supervisorGetUsers'
    ];

    protected $UploadPaths =[
        'Users'=>''
    ];

    public function beforeFilter(Event $event){
        return $this->CheckAuthorization();
    }

    public function initialize(){
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->CheckAuthentication();
        $this->PrepareUploadPaths();
        /*
         * Enable the following components for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        #$this->loadComponent('Security');
        #$this->loadComponent('Csrf');
    }

    private function PrepareUploadPaths(){
        $this->UploadPaths['Users']                 = WWW_ROOT . 'uploads' . DS . 'users' . DS;
    }

    private function CheckAuthentication(){
        $this->loadComponent('Auth', [
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login',
                'plugin' => false,
                'prefix'=>false
            ],
            #'authError' => 'Permission deny!',
            'authenticate' => [
                'Form' => [
                    'contain' => [
                        'UserGroups'=>[
                            'UserGroupMenus'=>[
                                'UserGroupMenuItems'
                            ]
                        ]
                    ],
                    'fields' => [
                        'username' => 'email_or_phone'
                    ],
                    'finder' => 'auth'
                ]
            ],
            'storage' => 'Session'
        ]);
        $this->Auth->allow($this->publicAllow);
    }

    protected function CheckAuthorization(){
        $AuthUser = $this->Auth->user();
        $this->set('AuthUser',$AuthUser);

        $controller = $this->request->params['controller'];
        $action     = $this->request->params['action'];

        if ($AuthUser && !in_array($action, $this->publicAllow)) {
            /*CHECK PREFIX AUTHORIZATION*/
            if ($AuthUser['user_group']['prefix']!='administrator') {
                if ($this->request->params['prefix'] != $AuthUser['user_group']['prefix']) {
                    $this->Flash->error('Hey Buddy! You dont have permissions to access that!');
                    return $this->redirect([
                        'prefix'=>$AuthUser['user_group']['prefix'],
                        'controller'=>'Users',
                        'action'=>'dashboard'
                    ]);
                }
            }
            /*CHECK AUTHORIZATION*/
            if (!isset($AuthUser['UserGroupPermissions'][$controller][$action]) && ($action!='dashboard')) {
                $this->Flash->error('You dont have permissions to access that!');
                return $this->redirect([
                    'prefix'=>$AuthUser['user_group']['prefix'],
                    'controller'=>'Users',
                    'action'=>'dashboard'
                ]);
            }
        }
    }

    public function beforeRender(Event $event){
        // Note: These defaults are just to get started quickly with development
        // and should not be used in production. You should instead set "_serialize"
        // in each action as required.
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

}
