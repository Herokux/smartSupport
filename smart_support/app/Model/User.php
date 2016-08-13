<?php

class User extends AppModel
{
		public $validate = array(
	        'username'=>array(
	            'unique'=>array(
	                'rule'=>'isUnique',
	                'message'=>'This email is already taken'
	        	)
	        ),
	        'password'=>array(
	        	'length' => array(
			        'rule'      => array('between', 6, 40),
			        'message'   => 'Your password must be between 6 and 40 characters.',
			    ),
	        ),
	        'cpassword'=>array(
	        	'length'=>array(
	        		'rule'=>array('between',6,40),
	        		'message'   => 'Your password must be between 8 and 40 characters.',
	        	),
	        	'compare'=>array(
	        		'rule'      => array('validate_passwords'),
	        		'message' => 'The passwords you entered do not match.',
	        	)
	        )
	    );

	    public $belongsTo=array(
			'Writer'=>array(
				'className'=>'Writer',
				'foreignKey'=>'id',
				'dependent'=>true
				)
		
		);
	    public function validate_passwords() {
		    return $this->data[$this->alias]['password'] === $this->data[$this->alias]['cpassword'];
		}
	    public function beforeSave($options = array())
	    {
	        parent::beforeSave($options);

	        if (isset($this->data['User']['password'])) {
	            $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
	        }

	        return true;
	    }

	    public function currentUserName($userID = null, $userType = null){
	    	$typeArray = ["Writer"];
	    	if (($userID != null) && (in_array($userType, $typeArray))) {
	    		$conditions = array( 
					$userType.'.id' => $userID
				);
				
				if($userType == 'Writer') {
					$currentUser = $this->Writer->find('first', array(
						'conditions'=> $conditions,
						'fields'=>array('firstname', 'lastname')
					));
					return $currentUser[$userType]['firstname'] . " " . $currentUser[$userType]['lastname'];
				}			
			}
	    }

}

?>