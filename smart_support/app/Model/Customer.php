<?php
class Customer extends AppModel
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
				'CustomerMessages.customer_token_id' => $customerID,
				'CustomerMessages.clientside_token_id' => $sessionID
			);

		$findMessageQuery = $this->CustomerMessages->find('all', array(
					'conditions'=> $conditions
			));


		$CustomerMessages = array();
		foreach ($findMessageQuery as $temp) {
			array_push($CustomerMessages, $temp["CustomerMessages"]);
		}

		$postedData['Messages'] = $CustomerMessages;

		return $postedData;
	}

	public function findClientSession($id, $client_id) {
		$conditions = array(
				'CustomerDetails.id' => $id,
				'CustomerDetails.client_id' => $client_id
			);

		$findSesionQuery = $this->CustomerDetails->find('first', array(
					'conditions'=> $conditions
		));

		return $findSesionQuery['CustomerDetails'];


	}


	public function customerSendMessage($mydata) {
		$this->CustomerMessages->save($mydata);
	}

	public function customerSendMessageClientSave($mydata) {
		$this->ClientMessages->save($mydata);
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