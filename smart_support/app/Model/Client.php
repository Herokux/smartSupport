<?php
class Client extends AppModel
{
	public $belongsTo=array(
			'User'=>array(
				'className'=>'User',
				'foreignKey'=>'id',
				'dependent'=>true
			),


			'ClientMessages'=>array(
				'className'=>'ClientMessages',
				'foreignKey'=>'client_id',
				'dependent'=>true
			),

			'CustomerDetails'=>array(
				'className'=>'CustomerDetails',
				'foreignKey'=>'id',
				'dependent'=>true
			),

			'CustomerMessages'=>array(
				'className'=>'CustomerMessages',
				'foreignKey'=>'client_id',
				'dependent'=>true
			)
			




	);


	public function findUnreadMessageClient($customerID, $sessionID) {
		$conditions = array(
				'ClientMessages.customer_token_id' => $customerID,
				'ClientMessages.clientside_token_id' => $sessionID
			);

		$findMessageQuery = $this->ClientMessages->find('all', array(
					'conditions'=> $conditions
			));


		$clientMessages = array();
		foreach ($findMessageQuery as $temp) {
			array_push($clientMessages, $temp["ClientMessages"]);
		}

		$postedData['Messages'] = $clientMessages;

		return $postedData;
	}


	public function findWaitingWriters() {
		$conditions = array(
				'CustomerDetails.assigned' => 'none'
			);

		$findWaitingArr = $this->CustomerDetails->find('all', array(
					'conditions'=> $conditions
					// 'fields' => array('writer_id')
			));
		$writerList = array();
		foreach ($findWaitingArr as $temp) {
			array_push($writerList, $temp["CustomerDetails"]);
		}

		$postedData['CustomerDetails'] = $writerList;

		return $postedData;
	}






	public function setClientCustomerLink($mydata) {
		$conditions = array(
				'CustomerDetails.id' => $mydata['customerID'],
				'CustomerDetails.assigned' => 'none'
			);


		if ($this->CustomerDetails->hasAny($conditions)) {
			$currentClientTokenID = $mydata['sessionID'];
			$conditionUpdate = array(
				'CustomerDetails.id' => $mydata['customerID']
			);
			
	
			$this->CustomerDetails->updateAll(
				array( 'CustomerDetails.assigned' => "'$currentClientTokenID'"),   //fields to update
				$conditionUpdate  //condition
			);


			echo 'success';
		}
		else {
			echo 'failure';
		}
	}




	public function clientSendMessage($mydata) {
		$this->ClientMessages->save($mydata);
	}

	public function clientSendMessageCustomerSave($mydata) {
		$this->CustomerMessages->save($mydata);
	}





	public function currentUserName($userID = null, $userType = null){
    	$typeArray = ["Business"];
    	if (($userID != null) && (in_array($userType, $typeArray))) {
    		$conditions = array(
				$userType.'.user_id' => $userID
			);

			if($userType == 'Business') {
				$currentUser = $this->Business->find('first', array(
					'conditions'=> $conditions,
					'fields'=>array('firstname', 'lastname')
				));
				return $currentUser[$userType]['firstname'] . " " . $currentUser[$userType]['lastname'];
			}

		}
	}




	public function checkforClientApproval($customerID) {
		$conditions = array(
				'CustomerDetails.id' => $customerID,
			);

		$approveCkArr = $this->CustomerDetails->find('first', array(
					'conditions'=> $conditions
					// 'fields' => array('writer_id')
		));

		$approveFlag = $approveCkArr['CustomerDetails']['assigned'];

		if ($approveFlag == 'none') {
			echo 'notAssigned';
		}
		else {
			echo 'assigned';
		}
	}






	public function getCustomerLang($userID) {
		$conditions = array(
				'CustomerDetails.id' => $userID
			);

		$findSesionQuery = $this->CustomerDetails->find('first', array(
					'conditions'=> $conditions
		));

		echo $findSesionQuery['CustomerDetails']['language'];
	}

	

	

}

?>
