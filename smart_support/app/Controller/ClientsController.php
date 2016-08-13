<?php
    App::uses('CakeEmail', 'Network/Email');
    class ClientsController extends AppController{

        public $uses=array('Client','User');


        public function beforeFilter(){
            $this->Auth->allow('login','signup', 'signupSuccess');
            $this->set('isLoggedIn',$this->Auth->loggedIn());
            $this->set('activeUser',$this->Session->read('Auth'));
            $userDetails = $this->Session->read('Auth');
            // echo $userDetails['User']['id'];
            // echo json_encode($this->Session->read('Auth'));
            $loginCheck = $this->Auth->loggedIn();
            if ($loginCheck == "1") {
 	           $this->set('userName', $this->Client->currentUserName($userDetails['User']['id'], $userDetails['User']['type']));
            }
        }



    	public function signup(){
			$this->layout='ajax';

            if($this->request->is('post')){

                $findUser = $this->User->findByUsername($this->data['Client']['username']);

                if($findUser != null){
                    $this->redirect(array('controller'=>'Users','action'=>'business_login', '?' => array(
        'userExist' => '1')
                    ));
                }

                else{
                    $data['User']['username']=$this->request->data['Client']['username'];
                    $data['User']['password']=$this->request->data['Client']['password'];
                    $data['User']['type']="Client";
                    $data['User']['active']="1";
                    $this->User->save($data);
                    $businessid=$this->User->getInsertId();
                    // pr($businessid);
                    // die();
                    $value['Client']['id']=$businessid;
                    $value['Client']['firstname']=$this->request->data['Client']['firstname'];
                    $value['Client']['lastname']=$this->request->data['Client']['lastname'];
                    $value['Client']['company']=$this->request->data['Client']['company'];
                    $this->Client->save($value);
                    


        

                    $this->redirect(array('controller'=>'Clients','action'=>'signupSuccess'));
                    }
                }
 		}

 		
 		public function signupSuccess(){
 			$this->layout='ajax';
 		}


        public function dashboard(){

        	
            $this->layout='business_dashboard_layout';
            // $this->set('activeUser',$this->Session->read('Auth'));
        }
		



}
 ?>
