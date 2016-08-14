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
			)
			




	);


	public function findClientSession($id, $client_id) {
		$conditions = array(
				'CustomerDetails.id' => $id,
				'CustomerDetails.client_id' => $client_id
			);

		$findSesionQuery = $this->CustomerDetails->find('first', array(
					'conditions'=> $conditions
		));

		echo json_encode($findSesionQuery);

		return $findSesionQuery['CustomerDetails'];


	}




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


	public function customerSendMessage($mydata) {
		$this->ClientMessages->save($mydata);
	}




}