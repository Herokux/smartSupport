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
            $this->Auth->allow('business_login','login','activate_user','writer_login', 'editor_login', 'admin_login', 'forgot_password', 'forgot_password_mail_generate', 'password_reset', 'password_reset_success', 'accountConfirmation', 'verificationLinkGenerated');
        }
		
		

		
        public function login(){
            // pr($this->Auth->user());
            // die();
            if($this->Session->check('Auth.User')){
                if($this->Auth->user('type')=='Business'){
                    $this->redirect(array('controller'=>'Businesses','action' => 'dashboard'));        
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
                    if($this->Auth->user('active')==1){
                        if($this->Auth->user('type')==$this->request->data['User']['type']){
                            // $this->Session->setFlash('You are Successfully Logged In','default',array('class'=>'alert-box success radius'),'success');
                            if($this->Auth->user('type')=='Business'){
                                $this->redirect(array('controller'=>'Businesses','action' => 'dashboard'));        
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
                        else{
                            $this->Auth->logout();
                            $postedData = $this->request->data;
                             // $this->Session->setFlash('You are Not Registered Under '.$this->request->data['User']['type'].' Section','default',array('class'=>'alert-box alert radius'),'error');
                             // echo "You are Not Registered Under ".$this->request->data['User']['type'].' Section';
                             // $this->redirect(array('controller'=>'Pages','action' => 'home'));
                             if($postedData['User']['type'] =='Business')
                             {
                                 $this->redirect(array('controller'=>'Users','action' => 'business_login', 
                                               '?' => array(
                                                   'errorkey' => '2'
                                               ) 
                                              ));
                             }
                             elseif($postedData['User']['type'] == 'Writer')
                             {
                                 $this->redirect(array('controller'=>'Users','action' => 'writer_login', 
                                               '?' => array(
                                                   'errorkey' => '2'
                                               ) 
                                              ));
                             }
                        }
                    }
                    else{
                        $this->Auth->logout();
                            $this->redirect(array('controller'=>'Users','action' => 'accountConfirmation'));
                    }
                } else {
					
					$postedData = $this->request->data;
					if($postedData['User']['type'] == 'Writer'){
						$this->redirect(array('controller'=>'Users','action' => 'writer_login', 
											  '?' => array(
												  'errorkey' => '1'
											  ) 
											 ));
					}
					else if($postedData['User']['type'] == 'Business'){
						$this->redirect(array('controller'=>'Users','action' => 'business_login', 
											  '?' => array(
												  'errorkey' => '1'
											  ) 
						));
					}
                    else if($postedData['User']['type'] == 'Editor'){
                        $this->redirect(array('controller'=>'Users','action' => 'business_login', 
                                              '?' => array(
                                                  'errorkey' => '1'
                                              ) 
                        ));
                    }

                    else if($postedData['User']['type'] == 'Admin'){
                        $this->redirect(array('controller'=>'Users','action' => 'admin_login', 
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
                $this->Session->setFlash('Successfully Logged out of the system','default',array('class'=>'alert-box success radius'),'success');
                $this->redirect(array('controller'=>'Pages','action'=>'home'));
            }
            else{
                $this->Session->setFlash('Successfully Logged out of the system','default',array('class'=>'alert-box alert radius'),'error');
            }
        }
        public function business_login(){
            if($this->Session->check('Auth.User')){
                if($this->Auth->user('type')=='Business'){
                    $this->redirect(array('controller'=>'Businesses','action' => 'dashboard'));        
                }
                else{
                    $this->Auth->logout();
                    $this->Session->setFlash('Please Login again to Business Section','default',array('class'=>'alert-box alert radius'),'error');
                }
            }
            $this->layout='login_layout_materialize';
        }
        public function writer_login(){
            if($this->Session->check('Auth.User')){

				if($this->Auth->user('type')=='Writer'){
                    $this->redirect(array('controller'=>'Pages','action' => 'home'));        

                }
                else{
                    $this->Auth->logout();
                    $this->Session->setFlash('Please Login again to Writer Section','default',array('class'=>'alert-box alert radius'),'error');
                }
            }
            $this->layout='login_layout_materialize';
        }
		
		public function editor_login(){
            if($this->Session->check('Auth.User')){

				if($this->Auth->user('type')=='Editor'){
                    $this->redirect(array('controller'=>'Pages','action' => 'home'));        

                }
                else{
                    $this->Auth->logout();
                    $this->Session->setFlash('Please Login again to Editor Section','default',array('class'=>'alert-box alert radius'),'error');
                }
            }
            $this->layout='signup_login_layout';
        }




        /***************************************************************/
        /*              ADMIN LOGIN PAGE                               */
        /***************************************************************/
        public function admin_login(){
            if($this->Session->check('Auth.User')){

                if($this->Auth->user('type')=='Admin'){
                    $this->redirect(array('controller'=>'Pages','action' => 'home'));        

                }
                else{
                    $this->Auth->logout();
                    $this->Session->setFlash('Please Login again to Editor Section','default',array('class'=>'alert-box alert radius'),'error');
                }
            }
            $this->layout='login_layout_materialize';
        }
		
		
		
		
		
		
		
		
        public function activate_user($id){
            $user['User']['id']=$id;
            $user['User']['active']=1;

            $conditions = array( 
                'User.id' => $id
            );
            
            if($id==NULL){
                $this->redirect(array('controller'=>'Pages','action'=>'home'));
            }
            elseif ($this->User->hasAny($conditions)){
                //add update query
                if($this->User->save($user)){
                    $userdata=$this->User->findById($id);
                    if($userdata['User']['type']=='Business'){
                        $this->Session->setFlash('Approved Successfully','default',array('class'=>'alert-box success radius'),'success');
                        $this->redirect(array('controller'=>'users','action'=>'business_login'));        
                    }
                    else if($userdata['User']['type']=='Writer'){
                        $this->redirect(array('controller'=>'users','action'=>'writer_login', '?' => array(
        'emailConfirmed' => '1')));
                    }   
                }
                else{
                    // $this->Session->setFlash('Sorry user is not now Available. ID, not found','default',array('class'=>'alert-box alert radius'),'error');
                    $this->redirect(array('controller'=>'Pages','action'=>'home'));
                }
            }
            else {
                $this->redirect(array('controller'=>'Pages','action'=>'home'));
            }
        }

        public function accountConfirmation(){
            if($this->Session->check('Auth.User')){

                if($this->Auth->user('type')=='Writer'){
                    $this->redirect(array('controller'=>'Pages','action' => 'home'));        

                }
                else{
                    $this->Auth->logout();
                    $this->Session->setFlash('Please Login again to Writer Section','default',array('class'=>'alert-box alert radius'),'error');
                }
            }
            $this->layout='login_layout_materialize';

            if ($this->request->is('post')) {
                $postedData = $this->request->data;
                $conditions = array( 
                    'User.username' => $postedData['User']['username']
                );
                if ($this->User->hasAny($conditions)){
                    $targetedUser = $this->User->find('first',array(
                        'conditions'=>$conditions,
                        'fields'=>array('id')
                    ));
                    
                    $userID = $targetedUser['User']['id'];
                    /***********************************/
                    /*  Email link                     */
                    /***********************************/
                    $mymessage = "Hi User,

    Please confirm your account by clicking here.

    Once you confirm, you will have full access to White Panda and all future notifications will be sent to this email address. We are excited to help you find great paid writing jobs! 

    Confirm your account by clicking on this link: http://whitepanda.in/Users/activate_user/".$userID."







White Panda Team";
                    $Email = new CakeEmail();
                    $Email->emailFormat('text')
                        ->to($postedData['User']['username'])
                        ->from(array('noreply@whitepanda.in'=>'White Panda'))
                        ->subject('Welcome aboard')
                        ->send($mymessage);

                    $this->redirect(array('controller'=>'Users','action' => 'verificationLinkGenerated'));
                                            
                }
            }
        }
		
		public function forgot_password(){
            if($this->Session->check('Auth.User')){

				if(($this->Auth->user('type')=='Writer') || ($this->Auth->user('type')=='Business')){
                    $this->redirect(array('controller'=>'Pages','action' => 'home'));        

                }
                else{
                    $this->Auth->logout();
                }
            }
            $this->layout='login_layout_materialize';
        }
		public function forgot_password_mail_generate(){
			$this->layout='login_layout_materialize';
			if($this->request->is('post')){
				
				$postedData = $this->request->data;
				$conditions = array( 
					'User.username' => $postedData['User']['username']
				);
				if ($this->User->hasAny($conditions)){
					$targetedUser = $this->User->find('first',array(
						'conditions'=>$conditions,
						'fields'=>array('id', 'type')
					));
					
					$userID = $targetedUser['User']['id'];
					$userType = $targetedUser['User']['type'];
					/***********************************/
					/*  Email link                     */
					/***********************************/
					$mymessage = "To reset your password, kindly click this link: http://whitepanda.in/Users/password_reset/".$userID."/".$userType;
					$Email = new CakeEmail();
					$Email->emailFormat('text')
						->to($postedData['User']['username'])
						->from(array('noreply@whitepanda.in'=>'White Panda'))
						->send($mymessage);
											
				}
				
			}
			else{
                    $this->redirect(array('controller'=>'Pages','action'=>'home'));
            }
			
		}
		
		public function password_reset($userID, $userType){
			if(($userID != null) && ($userType!= null)){
				$conditions = array( 
					'User.id' => $userID,
					'User.type' => $userType
				);
				if ($this->User->hasAny($conditions)){
					$this->layout='login_layout_materialize';
					
					$userInfo['id'] = $userID;
					$userInfo['type'] = $userType;
					$this->set('userInfo', $userInfo);
				}
					
			}
			
			
		}
		
		public function password_reset_success(){
			$this->layout='login_layout_materialize';
            if($this->request->is('post')){
                
                $postedData = $this->request->data;
				$createdPassword = $postedData['User']['password'];
				$hashedPassword = Security::hash($createdPassword, null, true);
                $conditions = array( 
                    'User.id' => $postedData['User']['id'],
                    'User.type' => $postedData['User']['type']
                );
                if ($this->User->hasAny($conditions)){
                    $this->User->updateAll(array( 
                        'User.password' => "'$hashedPassword'"
                        ),   //fields to update
                        $conditions  //condition
                    );
					
					if ($postedData['User']['type'] == 'Writer'){
						$this->set('userType', 'writer_login');
					}
					else if($postedData['User']['type'] == 'Business'){
						$this->set('userType', 'business_login');
					}
					else if($postedData['User']['type'] == 'Editor'){
						$this->set('userType', 'editor_login');
					}
                }
				
                
            }
            else{
                    $this->redirect(array('controller'=>'Pages','action'=>'home'));
            }
		}

        public function verificationLinkGenerated(){
            $this->layout='signup_layout_materialize';
        }
		
		
    }
    ?>