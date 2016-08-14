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

	public function rateWriter($claimId)
	{
		$writersRating=$this->OrderRating->find('first',
				array('fields'=>'DISTINCT OrderRating.rating_value',
					'conditions'=>array('OrderRating.claimed_id'=>$claimId)));
		$clientRating=$writersRating['OrderRating']['rating_value'];

		$claimDetails=$this->WriterClaims->find('first',
				array('conditions'=>array('WriterClaims.id'=>$claimId)));
		$writerId=$claimDetails['WriterClaims']['writer_id'];
		$orderId=$claimDetails['WriterClaims']['order_id'];

		$area=$this->OrderDetails->find('first',
			array('fields'=>'DISTINCT OrderDetails.writer_specialization',
				'conditions'=>array('OrderDetails.id'=>$orderId)));
		$area=$area['OrderDetails']['writer_specialization'];

		$creditDetails=$this->WriterCredit->find('first',
			array('conditions'=>array('WriterCredit.writer_id'=>$writerId,'WriterCredit.area'=>$area)));
		$xp=$creditDetails['WriterCredit']['xp'];
		$level=$creditDetails['WriterCredit']['level'];

		switch ($clientRating) {
				case 5:
					$xp+=20;
					break;
				case 4.5:
					$xp+=14;
					break;
				case 4:
					$xp+=10;
					break;
				case 3.5:
					$xp+=5;
					break;
				case 3:
					$xp+=2;
					break;
				case 2.5:
					$xp+=1;
					break;
				case 2:
					$xp+=0;
					break;
				case 1.5:
					$xp+=0;
					break;
				case 1:
					$xp+=-5;
					break;
				case 0.5:
					$xp+=-10;
					break;
				default:
					$xp+=0;
					break;
			}

				if ($xp>=20000) {
				# code...
				$newXp=$xp-20000;
				switch ($level) {
					case 'Bronze':
						$newLevel='Silver';
						break;
					case 'Silver':
						$newLevel='Gold';
						break;
					case 'Gold':
						$newLevel='Platinium';
						break;
				}
				$newData=array('writer_id'=>$writerId,
					'area'=>$area,
					'level'=>$newLevel,
					'xp'=>$newXp);

				$modelObject=new Editor();

				$modelObject->paygradeUpdate($newData);

			}
			else
			{
				$newData=array('writer_id'=>$writerId,
					'area'=>$area,
					'level'=>$level,
					'xp'=>$xp);

				$modelObject=new Editor();

				$modelObject->paygradeUpdate($newData);
			}
	}


	public function businessUserDetails($userID){

		$details = $this->Business->find('first', array(
			'conditions'=>array(
				'Business.user_id'=> $userID),
			'fields'=>array('firstname', 'lastname', 'mobile')

		));

		return $details;
	}

	public function genrateTextMail($reciver,$subject,$templateName,$fields)
 	{

 		$Email = new CakeEmail('default');
         $Email->emailFormat('text')
             ->to($reciver)
             ->subject($subject)
             ->template($templateName, '')
             ->viewVars(compact('fields'));
         $Email->send();

 	}

	public function setTransactionID(){
		return substr(hash('sha256', mt_rand() . microtime()), 0, 20);
	}

	public function saveOrderedContent($details){

		$txnIDexistCk = $this->OrderStatus->find('count', array(
			'conditions'=>array(
				'OrderStatus.txnid'=> $details['txnid']
			)
		));

		if($txnIDexistCk == 0){
			
			if ($details['attachment'] == 'uploaded') {
				$uploadPath = "../webroot/files/client_attachments/".$details['txnid'];

				if (is_dir($uploadPath)){
					$myFilename = scandir($uploadPath);
					$details['attachment'] = $myFilename[2];
				}
			}
			else {
				$details['attachment'] = 'none';
			}
			

			$this->OrderStatus->save($details , false, array('txnid', 'client_id'));

			$orderID = $this->OrderStatus->find('first', array('conditions'=>array('OrderStatus.txnid' => $details['txnid'])));
			$details['id'] = $orderID['OrderStatus']['id'];
			$this->OrderDetails->save($details);


			//SAVE ORDER PARAMETERS => stipend, writer feeds timespan, editor review timespan, writer submission timespan
			$deliveryTime = $details['delivery_time'];
			$deliveryTime = $deliveryTime[0];
			if ($deliveryTime == '5') {
				$writerFeedsTimespan = 96;
				$editorReviewTimespan = 24;
				$writerSubmissionTimespan = 36;
			}
			elseif ($deliveryTime == '7') {
				$writerFeedsTimespan = 120;
				$editorReviewTimespan = 48;
				$writerSubmissionTimespan = 48;
			}

			$orderParameterData['id'] = $details['id'];
			$orderParameterData['stipend'] = $details['stipend'];
			$orderParameterData['writer_feeds_timespan'] = $writerFeedsTimespan;
			$orderParameterData['editor_review_timespan'] = $editorReviewTimespan;
			$orderParameterData['writer_submission_timespan'] = $writerSubmissionTimespan;

			$this->OrderParameters->save($orderParameterData);    //Save data to table OrderParameters

		}




	}

	public function successPaymentActiveOrder($successOrderDetails){

		$status=$successOrderDetails["status"];
		$firstname=$successOrderDetails["firstname"];
		$amount=$successOrderDetails["amount"];
		$txnid=$successOrderDetails["txnid"];
		$posted_hash=$successOrderDetails["hash"];
		$key=$successOrderDetails["key"];
		$productinfo=$successOrderDetails["productinfo"];
		$email=$successOrderDetails["email"];
		$salt="lkXTUXtR";


		if (isset($successOrderDetails["additionalCharges"])) {
			$additionalCharges=$successOrderDetails["additionalCharges"];
			$retHashSeq = 		$additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

                  }
		else {

			$retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

		}
		$hash = hash("sha512", $retHashSeq);

		if ($hash != $posted_hash) {
			return false;
		   }
		else {


			$this->OrderStatus->updateAll(
			array( 'OrderStatus.client_payment' => '1',
				   'OrderStatus.content_status' => "'NotClaimed'"),   //fields to update
				array( 'OrderStatus.txnid' => $txnid )  //condition
			);




			$orderTxnDetails = $this->OrderStatus->find('first', array('conditions'=>array('OrderStatus.txnid' => $txnid)));

			$saveData['id'] = $orderTxnDetails['OrderStatus']['id'];
			$saveData['client_id'] = $orderTxnDetails['OrderStatus']['client_id'];
			$saveData['txnid'] = $orderTxnDetails['OrderStatus']['txnid'];
			$saveData['amount'] = $amount;

			$this->OrderTransactions->save($saveData);

			//Data for Mail to Client On Placing Order
			$clientName=$firstname;
			/*$orderId=$this->OrderStatus->find('first',
				array('fields'=>'DISTINCT OrderStatus.id',
					'conditions'=>array('OrderStatus.txnid'=>$txnid)));*/
			$orderId=$saveData['id'];
			$typeId=$this->OrderDetails->find('first',
				array('fields'=>'DISTINCT OrderDetails.ordertype_id',
					'conditions'=>array('OrderDetails.id'=>$orderId)));
			$orderType=$this->OrderType->find('first',
				array('fields'=>'DISTINCT OrderType.type',
					'conditions'=>array('OrderType.id'=>$typeId['OrderDetails']['ordertype_id'])));
			//Below Array to be sent to Mail Template
			$orderDetails=$this->OrderDetails->find('all',
				array('conditions'=>array('OrderDetails.id'=>$orderId)));

			$modelObject=new TimeHandler();
			$submitDeadline=$modelObject->getSubmissionDeadline($orderId,'Business');

			$orderDetails=array('Topic'=>$orderDetails['OrderDetails']['topic'],
				'Content Plan'=>$orderDetails['OrderDetails']['paygrade'],
				'Due Date'=>$submitDeadline,
				'Amount'=>$amount);

			$fields=array('clientName'=>$clientName,
				'orderId'=>$orderId,
				'orderType'=>$orderType['OrderType']['type']);
			$this->genrateHtmlMail($email,'Order Placed','business_order',$fields,$orderDetails);

			return true;

		   }


	}

	public function genrateHtmlMail($reciver,$subject,$templateName,$fields,$body)
 	{

 		$Email = new CakeEmail('default');
         $Email->emailFormat('html')
             ->to($reciver)
             ->subject($subject)
             ->template($templateName, '')
             ->viewVars(compact('fields','body'));
         $Email->send();

 	}

	public function recentOrderData($clientID){
		$orders = $this->OrderStatus->find('all', array(
			'conditions'=>array(
				'OrderStatus.client_id'=> $clientID,
				'OrderStatus.client_payment'=> '1'
			)
		));

		$temp_post = array();
		$filteredOrderID = array();
		foreach ($orders as $order_firstarr){
			array_push($temp_post, $order_firstarr["OrderStatus"]);
			array_push($filteredOrderID, $order_firstarr["OrderStatus"]["id"]);
		}

		$fina_post['Orders'] = $temp_post;

		$orderDetails = $this->OrderDetails->find('all', array(
			'conditions'=>array(
				'OrderDetails.id'=> $filteredOrderID
			)
		));

		$temp_detail = array();
		foreach ($orderDetails as $order_firstarr){
			array_push($temp_detail, $order_firstarr["OrderDetails"]);
		}
		$fina_post['OrderDetails'] = $temp_detail;

		echo json_encode($fina_post);


	}





	/******************************************************/
	/*             CLIENT RECEIVED FILES                  */
	/******************************************************/
	public function clientReceivedContentDetails($clientID){
		$uploadedOrders = $this->OrderStatus->find('all', array(
			'conditions'=>array(
				'OrderStatus.client_id'=> $clientID,
				'OrderStatus.content_status'=> array('Delivered', 'Approved')
			),
			'fields' => array('id', 'content_status')
		));

		$uploadedOrderIDs = array();
		foreach ($uploadedOrders as $parsedKey) {
			array_push($uploadedOrderIDs, $parsedKey["OrderStatus"]['id']);
		}

		$orderDetailsCondition = array(
				'OrderDetails.id'=> $uploadedOrderIDs
		);

		$receivedOrderDetails = $this->OrderDetails->find('all', array(
				'conditions'=> $orderDetailsCondition,
		));

		$receivedFileNameConditions = array(
				'OrderReceived.order_id'=> $uploadedOrderIDs
		);

		$receivedFileName = $this->OrderReceived->find('all', array(
				'conditions'=> $receivedFileNameConditions,
				'fields'=>array('order_id','claimed_id', 'filename', 'date_uploaded')
		));


		$contentDetails =array();
		foreach ($receivedOrderDetails as $parsedKey) {
			array_push($contentDetails, $parsedKey['OrderDetails']);
		}

		$uploadedFilename =array();
		foreach ($receivedFileName as $parsedKey) {
			$uploadedFilename[$parsedKey['OrderReceived']['order_id']] = $parsedKey['OrderReceived'];
		}

		$ratingValueCondition = array(
				'OrderRating.order_id'=> $uploadedOrderIDs
		);

		$ratingValueArray = $this->OrderRating->find('all', array(
				'conditions'=> $ratingValueCondition,
				'fields'=>array('order_id','rating_value')
		));

		$ratingValue =array();
		foreach ($ratingValueArray as $parsedKey) {
			$ratingValue[$parsedKey['OrderRating']['order_id']] = $parsedKey['OrderRating'];
		}

		$orderStatus =array();
		foreach ($uploadedOrders as $parsedKey) {
			$orderStatus[$parsedKey['OrderStatus']['id']] = $parsedKey['OrderStatus'];
		}


		$postData['receivedOrderDetails'] = $contentDetails;
		$postData['receivedOrderFilename'] = $uploadedFilename;
		$postData['OrderRating'] = $ratingValue;
		$postData['OrderStatus'] = $orderStatus;
		return $postData;
	}






	/**********************************************************************************/
	/*       CLIENT CONTENT APPROVAL                                                  */
	/**********************************************************************************/
	public function clientContentApproval($postedData){
		$conditions = array(
			'OrderStatus.id' => $postedData['order_id'],
			'OrderStatus.client_id' => $postedData['client_id']
		);
		if ($this->OrderStatus->hasAny($conditions)){
			$this->OrderStatus->updateAll(array(
				'OrderStatus.content_status' => "'Approved'",
				'OrderStatus.mark_completed' => "'1'"
				),   //fields to update
				$conditions  //condition
			);
		}

		$conditions = array(
			'WriterClaims.id' => $postedData['claimed_id'],
			'WriterClaims.order_id' => $postedData['order_id']
		);
		if ($this->WriterClaims->hasAny($conditions)){
			$this->WriterClaims->updateAll(array(
				'WriterClaims.current_status' => "'Approved'"
				),   //fields to update
				$conditions  //condition
			);
		}





		//FIND WRITER ID, CLAIMED ID , AMOUNT
		//UPDATE WRITER ACCOUNT -> ADD THE RESPECTIVE AMOUNT THO HIS ACCOUNT
		$this->findAmountAndWriterID($postedData['order_id']);

	}






	/**********************************************************************************/
	/*                      CLIENT REVISION REQUEST                                   */
	/**********************************************************************************/
	public function clientRevisionRequestQuery($postedData = null) {
		$conditions = array(
			'ClientRevision.id' => $postedData['id'],
		);

		$conditionsOrderStatus = array(
			'OrderStatus.id' => $postedData['id']
		);

		$updateData = $postedData['expected_changes'];
		if ($this->ClientRevision->hasAny($conditions)){
				$this->ClientRevision->updateAll(array(
				'ClientRevision.expected_changes' => "'$updateData'"
				),   //fields to update
				$conditions  //condition
			);

			//Update order status to Revision Request
			$this->OrderStatus->updateAll(array(
				'OrderStatus.content_status' => "'RevisionRequest'"
				),   //fields to update
				$conditionsOrderStatus  //condition
			);

		}

		else {
			$this->ClientRevision->save($postedData);

			//Update order status to Revision Request
			$this->OrderStatus->updateAll(array(
				'OrderStatus.content_status' => "'RevisionRequest'"
				),   //fields to update
				$conditionsOrderStatus  //condition
			);
		}
	}










	/******************************************************************/
	/*           CLIENT ORDER EDIT MODE DATA UPDATE  query            */
	/******************************************************************/
	public function clientUpdateOrderDetail($postedData){
		$conditions = array(
			'OrderDetails.id' => $postedData['order_id']
		);

		$topic = $postedData['topic'];
		$target_audience = $postedData['target_audience'];
		$keypoints = $postedData['keypoints'];
		$keywords = $postedData['keywords'];
		$avoid = $postedData['avoid'];
		$instructions = $postedData['instructions'];
		$sample =$postedData['sample'];
		$link_to_sources = $postedData['link_to_sources'];


		if ($this->OrderDetails->hasAny($conditions)){
			$this->OrderDetails->updateAll(array(
				'OrderDetails.topic' => "'$topic'",
				'OrderDetails.target_audience' => "'$target_audience'",
				'OrderDetails.keypoints' => "'$keypoints'",
				'OrderDetails.keywords' => "'$keywords'",
				'OrderDetails.avoid' => "'$avoid'",
				'OrderDetails.instructions' => "'$instructions'",
				'OrderDetails.sample' => "'$sample'",
				'OrderDetails.link_to_sources' =>  "'$link_to_sources'"
				),   //fields to update
				$conditions  //condition
			);
			return true;
		}
	}







	/******************************************************************/
	/*           CLIENT HELP MESSAGE QUERY + MESSAGE US               */
	/******************************************************************/
	public function clientHelpMessageEntry($postedData) {
		$this->ClientHelpmessages->save($postedData);

		$fields=array('email'=>$postedData['username'],
 					  'message'=>$postedData['message']
 				);
		genrateTextMail('ashim.raj@iitgn.ac.in', 'Help Message ', 'clientHelpmessage',$fields);
	}







	/******************************************************************/
	/*       APPROVAL FORWARD AMOUNT + WRITER ID TO WRITER MODEL      */
	/******************************************************************/
	public function findAmountAndWriterID ($orderId = null) {

		//FIND PAYABLE AMOUNT
		$orderAmountCond = array(
				'OrderParameters.id'=> $orderId
		);

		$orderAmountQuery = $this->OrderParameters->find('first', array(
				'conditions'=> $orderAmountCond,
				'fields' => array('stipend')
		));
		$orderAmount = $orderAmountQuery['OrderParameters']['stipend'];


		//FIND CLAIMED ID
		$orderClaimedIDCond = array(
				'OrderReceived.order_id'=> $orderId
		);

		$orderClaimedIDQuery = $this->OrderReceived->find('first', array(
				'conditions'=> $orderClaimedIDCond,
				'fields' => array('claimed_id')
		));
		$orderClaimedID = $orderClaimedIDQuery['OrderReceived']['claimed_id'];



		//FIND WRITER ID IF CLAIMED
		//CALL WRITER BALANCE UPDATE FUNCTION
		if($orderClaimedID != 'unclaimed') {

			//FIND WRITER ID
			$findWriterIDCond = array(
					'WriterClaims.id'=> $orderClaimedID
			);

			$findWriterIDQuery = $this->WriterClaims->find('first', array(
					'conditions'=> $findWriterIDCond,
					'fields' => array('writer_id')
			));
			$writerId = $findWriterIDQuery['WriterClaims']['writer_id'];


			//CALL WRITER BALANCE UPDATE -> WRITER MODEL
			App::import('Model','Writer');
			$Writer = new Writer();
			$Writer->balanceUpdate($writerId, $orderAmount);

		}



	}

}

?>
