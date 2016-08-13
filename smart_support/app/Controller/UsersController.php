<?php
    App::uses('CakeEmail', 'Network/Email');
    class UsersController extends AppController{
    	public $components = array('RequestHandler');
        public $uses=array('User');
        public function beforeFilter() {
            parent::beforeFilter();
            // $this->Auth->loginRedirect = array('controller' => 'Users', 'action' => 'login');
            // $this->Auth->logoutRedirect = array('controller' => 'Users', 'action' => 'login');
            // $this->Auth->loginAction = array('controller' => 'Users', 'action' => 'login');
            
             // Basic setup
            $this->Auth->authenticate = array('Form');

			
      
            $this->set('isLoggedIn',$this->Auth->loggedIn());
            $this->set('activeUser',$this->Session->read('Auth'));
            $this->Auth->allow('client_login','login','activate_user','writer_login', 'editor_login', 'admin_login', 'forgot_password', 'forgot_password_mail_generate', 'password_reset', 'password_reset_success', 'accountConfirmation', 'verificationLinkGenerated');
        }
		
		

		
        public function login(){
            // pr($this->Auth->user());
            // die();
            if($this->Session->check('Auth.User')){
                if($this->Auth->user('type')=='Client'){
                    $this->redirect(array('controller'=>'Clients','action' => 'dashboard'));        
                }
                else if($this->Auth->user('type')=='Writer'){
                    $this->redirect(array('controller'=>'Writers','action' => 'dashboard'));
                }
				else if($this->Auth->user('type')=='Editor'){
                    $this->redirect(array('controller'=>'Editors','action' => 'dashboard'));
                }
                else if($this->Auth->user('type')=='Admin'){
                    $this->redirect(array('controller'=>'Admins','action' => 'dashboard'));
                }
            }
            
            // if we get the post information, try to authenticate
            if ($this->request->is('post')) {
                // pr($this->request->data);
                // die();
                if ($this->Auth->login()) {
                  
                    if($this->Auth->user('type')==$this->request->data['User']['type']){
                        // $this->Session->setFlash('You are Successfully Logged In','default',array('class'=>'alert-box success radius'),'success');
                        if($this->Auth->user('type')=='Client'){
                            $this->redirect(array('controller'=>'Clients','action' => 'dashboard'));        
                        }
                    }
                    else{
                        $this->Auth->logout();
                        $postedData = $this->request->data;
                        if($postedData['User']['type'] =='Client')
                        {
                             $this->redirect(array('controller'=>'Users','action' => 'client_login', 
                                           '?' => array(
                                               'errorkey' => '2'
                                           ) 
                                          ));
                         }
                    }
                  
                   
                } 
                else {
					
					$postedData = $this->request->data;
				
					if($postedData['User']['type'] == 'Client'){
						$this->redirect(array('controller'=>'Users','action' => 'client_login', 
											  '?' => array(
												  'errorkey' => '1'
											  ) 
						));
					}
                }
            }
            else{
                $this->redirect(array('controller'=>'Pages','action' => 'home'));
            } 
        }
        public function isAuthorized($user){
            return true;
        }

        public function logout(){
            $this->Session->destroy();
            if($this->Auth->logout()){
                $this->redirect(array('controller'=>'Users','action' => 'client_login'));
            }
            else{
                $this->Session->setFlash('Successfully Logged out of the system','default',array('class'=>'alert-box alert radius'),'error');
            }
        }

        public function client_login(){
            if($this->Session->check('Auth.User')){
                if($this->Auth->user('type')=='Client'){
                    $this->redirect(array('controller'=>'Clients','action' => 'dashboard'));        
                }
                else{
                    $this->Auth->logout();
                    $this->Session->setFlash('Please Login again to Business Section','default',array('class'=>'alert-box alert radius'),'error');
                }
            }
            $this->layout='ajax';
        }
        
		
		
    }
    ?>