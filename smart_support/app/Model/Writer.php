<?php

class Writer extends AppModel
{
	public $belongsTo=array(
			'User'=>array(
				'className'=>'User',
				'foreignKey'=>'id',
				'dependent'=>true

				),
		
			'SelectionQA'=>array(
				'className'=>'SelectionTestQuestion',
				'foreignKey'=>'id',
				'dependent'=>true
			),
		
			'SelectionStatus'=>array(
				'className'=>'WriterSelectionTests',
				'foreignKey'=>'id',
				'dependent'=>true
			),
			
			'WriterClaim'=>array(
				'className'=>'WriterClaims',
				'foreignKey'=>'id',
				'dependent'=>true
			),
			
			'OrderStatus'=>array(
				'className'=>'OrderStatuses',
				'foreignKey'=>'id',
				'dependent'=>true
			),
			
			'WriterUploads'=>array(
				'className'=>'WriterUploads',
				'foreignKey'=>'id',
				'dependent'=>true
			),

			'WriterContentSamples'=>array(
				'className'=>'WriterContentSamples',
				'foreignKey'=>'id',
				'dependent'=>true
			),

			'WriterCredits'=>array(
				'className'=>'WriterCredits',
				'foreignKey'=>'id',
				'dependent'=>true
			),

			'OrderArea'=>array(
				'className'=>'OrderArea',
				'foreignKey'=>'id',
				'dependent'=>true
			),

			'AccountBalance'=>array(
				'className'=>'WriterAccountbalances',
				'foreignKey'=>'id',
				'dependent'=>true
			),

			'Transaction'=>array(
				'className'=>'WriterTransactions',
				'foreignKey'=>'id',
				'dependent'=>true
			)
//		,
//		
//			'OldWriters'=>array(
//				'className'=>'UserOlds',
//				'dependent'=>true
//			)
	);
	
	public function suggestedJobs()
	{
		//$writerId=To be fetched of writer's who have not logged on since last week.
		//$writerName=Fetch Those writer Names
		//$writerEmail=Fetch Those writer email address

		$unClaimedJobs=$this->OrderStatus->find('all',
			array('fields'=>'OrderStatus.id',
				'conditions'=>array('OrderStatus.content_status'=>'NotClaimed')));
		$orderDetails=$this->OrderDetails->find('all',
			array('fields'=>array('OrderDetails.paygrade','OrderDetails.writer_specialization','OrderDetails.content_quality','OrderDetails.stipend'),
				'conditions'=>array('OrderDetails.id'=>$unClaimedJobs['OrderStatus']['id']),
				'limit'=>5));
		$jobDetails=array('Paygrade'=>$orderDetails['OrderDetails']['paygrade'],
			'Area'=>$orderDetails['OrderDetails']['writer_specialization'],
			'Type'=>$orderDetails['OrderDetails']['content_quality'],
			'Budget'=>$orderDetails['OrderDetails']['stipend']);

		$this->genrateHtmlMail($writerEmail,'Job Suggestions','writer_suggest_job',$writerName,$jobDetails);

		
	}
	
	
	public function selectionTestQuestions(){
		
		function stringExploder($myString){
			return explode('*', $myString);
		}
		$my_array = range(1,9);
		shuffle($my_array);
		$response = $this->SelectionQA->find('first',
			array('conditions'=>array('SelectionQA.id' => $my_array[3]),
				  'fields'=>array('question_determiner_level1',
								  'question_determiner_level2',
								  'question_determiner_level3',
								  'question_scramble_level1',
								  'question_scramble_level2',
								  'question_scramble_level3',
								  'question_scramble_level4',
								  'question_wordgame_level1',
								  'question_wordgame_level2',
								  'question_wordgame_level3'
								 )								
												
				 ));
		
		$questions['shuffledQuestionID'] = $my_array[3];
		$questions['question_determiner_level1'] = stringExploder($response['SelectionQA']['question_determiner_level1']);
		$questions['question_determiner_level2'] = stringExploder($response['SelectionQA']['question_determiner_level2']);
		$questions['question_determiner_level3'] = stringExploder($response['SelectionQA']['question_determiner_level3']);
		$questions['question_scramble_level1'] = stringExploder($response['SelectionQA']['question_scramble_level1']);
		$questions['question_scramble_level2'] = stringExploder($response['SelectionQA']['question_scramble_level2']);
		$questions['question_scramble_level3'] = stringExploder($response['SelectionQA']['question_scramble_level3']);
		$questions['question_scramble_level4'] = stringExploder($response['SelectionQA']['question_scramble_level4']);
		$questions['question_wordgame_level1'] = stringExploder($response['SelectionQA']['question_wordgame_level1']);
		$questions['question_wordgame_level2'] = stringExploder($response['SelectionQA']['question_wordgame_level2']);
		$questions['question_wordgame_level3'] = stringExploder($response['SelectionQA']['question_wordgame_level3']);
		return $questions;
	}





	public function selectionTestAnswerCheck($postedAnswers, $currentUser){
		function stringExploder($myString){
			return explode('*', $myString);
		}
		$response = $this->SelectionQA->find('first',
			array('conditions'=>array('SelectionQA.id' => $postedAnswers['shuffledQuestionID']),
				  'fields'=>array('answer_determiner_level1',
								  'answer_determiner_level2',
								  'answer_determiner_level3',
								  'answer_scramble_level1',
								  'answer_scramble_level2',
								  'answer_scramble_level3',
								  'answer_scramble_level4',
								  'answer_wordgame_level1',
								  'answer_wordgame_level2',
								  'answer_wordgame_level3'
								 )								
												
				 ));
		
		$answersList = stringExploder($response['SelectionQA']['answer_determiner_level1']);
		$answersList = array_merge($answersList, stringExploder($response['SelectionQA']['answer_determiner_level2']),
								   stringExploder($response['SelectionQA']['answer_determiner_level3']),
								   stringExploder($response['SelectionQA']['answer_scramble_level1']),
								   stringExploder($response['SelectionQA']['answer_scramble_level2']),
								   stringExploder($response['SelectionQA']['answer_scramble_level3']),
								   stringExploder($response['SelectionQA']['answer_scramble_level4']),
								   stringExploder($response['SelectionQA']['answer_wordgame_level1']),
								   stringExploder($response['SelectionQA']['answer_wordgame_level2']),
								   stringExploder($response['SelectionQA']['answer_wordgame_level3']));
		
		
		$answers['correctAnswers'] = $answersList;
		$answers['postedAnswers'] = $postedAnswers['answer'];
		
		$score = 0;
		for ($i=0; $i<19; $i++){
			if ($answers['correctAnswers'][$i] == $answers['postedAnswers'][$i]){
				$score += 1;
			}
		}
		$WriterScore['id'] = $currentUser;
		$WriterScore['score'] = $score;
		$WriterScore['test_attempts'] = '1';
		if ($score>9){
			$WriterScore['passed'] = '1';
		}
		else{
			$WriterScore['passed'] = '0';
		}
		$this->SelectionStatus->save($WriterScore);
		
		return $WriterScore['passed'];
	}
	
	public function writerSelectionQuery($currentUser){
		$myResultQuery = $this->SelectionStatus->find('count', array(
			'conditions'=> array('SelectionStatus.id' => $currentUser,
								'SelectionStatus.passed'=> '1'
								)
		));
		return $myResultQuery;
	}
	
	
	
	/*===============================*/
	/*  FILE UPLOAD STATUS UPDATE    */
	/*===============================*/
	public function writerUploadConfirmChanges($orderID, $writerID, $fileName){
		
		$conditions = array( 
				'WriterClaim.writer_id' => $writerID,
				'WriterClaim.order_id' => $orderID
			);
		$this->WriterClaim->updateAll(array( 
					'WriterClaim.current_status' => "'Uploaded'"
				),   //fields to update
			       	 $conditions  //condition
				);
		
		$this->OrderStatus->updateAll(array( 
					'OrderStatus.content_status' => "'Uploaded'"
				),   //fields to update
				array( 
					'OrderStatus.id' => $orderID
					)  //condition
				);
		
		$conditionsFile = array( 
				'WriterUploads.writer_id' => $writerID,
				'WriterUploads.order_id' => $orderID
			);
		
		if ($this->WriterUploads->hasAny($conditionsFile)){
				$this->WriterUploads->updateAll(array( 
					'WriterUploads.filename' => "'$fileName'"
				),   //fields to update
				$conditionsFile  //condition
				);
		}
		else{
			$postedData['writer_id'] = $writerID;
			$postedData['order_id'] = $orderID;
			$postedData['filename'] = $fileName;
			$this->WriterUploads->save($postedData);
		}
		
		
	}






	/***************************************************************************************************/
	/*                             WRITER SAMPLE SUBMISSION VALIDATION                                 */
	/***************************************************************************************************/
	public function checkSampleSubmissionValidations($postedData)
	{
		$flag=0;
		$writerID=$postedData['writer_id'];
		$areaID=$postedData['area_id'];
		$conditions=array('WriterContentSamples.writer_id' => $writerID,
			'WriterContentSamples.area_id'=>$areaID);
		//return $this->WriterContentSamples->hasAny($conditions);
		$samplecount=$this->WriterContentSamples->find('count',
			array('fields'=>'DISTINCT WriterContentSamples.id',
			'conditions'=>$conditions));
		if ($samplecount>0) {
			$areaName=$this->OrderArea->find('first',
						array('fields' => 'DISTINCT OrderArea.area',
						'conditions'=>array('OrderArea.id'=>$areaID)));
			$hasPayGrade=$this->WriterCredits->find('count',
				array('conditions'=>array('WriterCredits.writer_id'=>$writerID,
					'WriterCredits.area'=>$areaName['OrderArea']['area'])));
			//$flag=$hasPayGrade;
			//return $hasPayGrade;
			if ($hasPayGrade==1) {
				# code...
				$xp=$this->WriterCredits->find('first',
				array('fields'=>'DISTINCT WriterCredits.xp','conditions'=>array('WriterCredits.writer_id'=>$writerID,
					'WriterCredits.area'=>$areaName['OrderArea']['area'])));
				//$flag=$xp['WriterCredits']['xp'];
				if ($xp['WriterCredits']['xp']==0) {
					# code...
					$lastrecord=$this->WriterContentSamples->find('first',
						array('conditions'=>array('WriterContentSamples.writer_id'=>$writerID,
							'WriterContentSamples.area_id'=>$areaID),
						'order'=>array('WriterContentSamples.date_created'=>'desc')));
					//$flag=date_create($lastrecord['WriterContentSamples']['date_created']);
					$currentdate=date_create(date("Y/m/d H:i:s"));
					// $flag=$currentdate;
					$diff=date_diff($currentdate, date_create($lastrecord['WriterContentSamples']['date_created']), true);
					//$xxx = $diff->d;
					//$flag=$xxx;
					if ($diff->d>0) {
						# code...
						$flag=true;
					} else {
						$flag=false;
					}
					
				}
				else {
					# code...
					$flag=false;
				}
				


			}
			else{
				$lastrecord=$this->WriterContentSamples->find('first',
						array('conditions'=>array('WriterContentSamples.writer_id'=>$writerID,
							'WriterContentSamples.area_id'=>$areaID),
						'order'=>array('WriterContentSamples.date_created'=>'desc')));
					//$flag=date_create($lastrecord['WriterContentSamples']['date_created']);
					$currentdate=date_create(date("Y/m/d H:i:s"));
					// $flag=$currentdate;
					$diff=date_diff($currentdate, date_create($lastrecord['WriterContentSamples']['date_created']), true);
					//$xxx = $diff->d;
					//$flag=$xxx;
					if ($diff->d>0) {
						# code...
						$flag=true;
					} else {
						$flag=false;
					}

			}

		}
	
		else
		{
			$flag=true;
		}
		return $flag;

	}


	/***************************************************************************************************/
	/*                             WRITER SPECILIZATION GET                                       */
	/***************************************************************************************************/

	public function specilization() {
		$allspecilization = $this->OrderArea->find('all', array(
			'fields' => array('id', 'area', 'specilization')
			)
		);
		return $allspecilization;
	} 




	/***************************************************************************************************/
	/*                             WRITER SAMPLE SUBMISSION MAIL                                       */
	/***************************************************************************************************/
	public function mailForSample($postedData)
 	{
 		
 						$conditions = array( 
 							'WriterContentSamples.writer_id' => $postedData['writer_id']
 						);
 						$industryName=$this->OrderArea->find('first',
 							array('fields' => 'DISTINCT OrderArea.area',
 							'conditions'=>array('OrderArea.id'=>$postedData['area_id'])));
 					
 						if ($this->WriterContentSamples->hasAny($conditions)){
 							//MAIL TEMPLATE FOR EXIATING USER
 							$fields=array('writerName'=>$postedData['username'],
 								'industryName'=>$industryName['OrderArea']['area']);
 							// $this->request->data['Writer']['username']
 							$this->genrateTextMail($postedData['email'],'Welcome aboard','writer_subsequent_sample',$fields);
 						}
 						else{
 							//MAIL TEMPLATE FOR NEW USER
             				$fields=array('writerName'=>$postedData['username'],
 								'industryName'=>$industryName['OrderArea']['area']);
             				$this->genrateTextMail($postedData['email'],'Welcome aboard','writer_first_sample',$fields);
 						}
 	}
 






 	/***************************************************************************************************/
	/*                             EMAIL TEMPLATE                                                      */
	/***************************************************************************************************/
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






 	/***************************************************************************************************/
	/*                             DATE + ARGUMENT(in hours) = str=> 'DAY', 'X' HOURS                  */
	/***************************************************************************************************/
	//MISSING FUNCTION













	/***************************************************************************************************/
	/*                          WRITER BALANCE UPDATE + ADD TRANSACTION HISTORY                        */
	/***************************************************************************************************/
	public function balanceUpdate($writerID = null, $amount = null){

		//UPDATE CURRENT BALANCE
		$conditions = array(
				'AccountBalance.id'=> $writerID
		);

		$AccountBalanceQuery = $this->AccountBalance->find('first', array(
				'conditions'=> $conditions
		));

		$currentBal = $AccountBalanceQuery['AccountBalance']['balance'];
		$updatedBal = $currentBal + $amount;

		$this->AccountBalance->updateAll(array( 
				'AccountBalance.balance' => "'$updatedBal'"
				),   //fields to update
				$conditions  //condition
			);


		//ADD TRANSACTION HISTORY
		$TransactionData['writer_id'] = $writerID;
		$TransactionData['action'] = 'Deposit';
		$TransactionData['amount'] = $amount;

		$this->Transaction->save($TransactionData);

	}





































	
	
	/**************************************************************************************************************************/
	/*                                     DANGER ZONE -> DONOT CROSS THIS LINE                                               */
	/**************************************************************************************************************************/
	
	/*===============================*/
	/*        DATABASE BACKUP        */
	/*===============================*/
	public function entrynew(){
			function toArrays($myArray, $focusedString){	
				$temp_post = array();
				foreach ($myArray as $order_firstarr){	
				array_push($temp_post, $order_firstarr[$focusedString]);
				}
				return $temp_post;
			}
			$result = $this->OldWriters->find('all',
					array(
						'conditions'=> array(
								'OldWriters.ID'=>range(601, 800)
					) 
											 ));
			$oldWriters = toArrays($result, 'OldWriters');
			return $oldWriters;
	}


	public function userTestPass(){
		$IDrange = range(400, 450);
		$conditions = array( 
				'WriterSkillSamples.id' => $IDrange
			);
		$UserEmailIDS = $this->WriterSkillSamples->find('all', array(
				'conditions'=> $conditions,
				'fields'=>array('email')
		));
		
		$UserEmailArray = array();
		foreach ($UserEmailIDS as $parsedKey) {
			array_push($UserEmailArray, $parsedKey["WriterSkillSamples"]['email']);
		}


		$conditions = array( 
				'User.username' => $UserEmailArray
			);
		$UserIDScond = $this->User->find('all', array(
				'conditions'=> $conditions,
				'fields'=>array('id')
		));
		
		$UserIDS = array();
		foreach ($UserIDScond as $parsedKey) {
			array_push($UserIDS, $parsedKey["User"]['id']);
		}
		

	
		
		foreach ($UserIDS as $parsedKey) {
			$postedData['id'] = $parsedKey;
			$postedData['score'] = '16';
			$postedData['passed'] = '1';
			$this->SelectionStatus->save($postedData);
		} 

		
			
		echo json_encode($UserIDS);
	}

	public function userCreditEntry(){
		$IDrange = range(400, 500);
		$paygradeRange = ['200', '400', '800', '1600'];
		$conditions = array( 
				'WriterSkillSamples.id' => $IDrange,
				'WriterSkillSamples.paygrade' => $paygradeRange


			);

		$UserEmailIDS = $this->WriterSkillSamples->find('all', array(
				'conditions'=> $conditions,
				'fields'=>array('email', 'catagory', 'paygrade')
		));
		
		
		$UserEmailArray = array();
		foreach ($UserEmailIDS as $parsedKey) {
			array_push($UserEmailArray, $parsedKey["WriterSkillSamples"]['email']);
		}

		$emailBasedDetails = array();
		foreach ($UserEmailIDS as $parsedKey) {
			$emailBasedDetails[$parsedKey['WriterSkillSamples']['email']] = $parsedKey['WriterSkillSamples'];
		}

		// echo json_encode($emailBasedDetails);
		$conditions = array( 
				'User.username' => $UserEmailArray
			);
		$UserIDScond = $this->User->find('all', array(
				'conditions'=> $conditions,
				'fields'=>array('id', 'username')
		));
		

		
		$UserIDS = array();
		foreach ($UserIDScond as $parsedKey) {
			array_push($UserIDS, $parsedKey["User"]['id']);
		}

		$IDbasedemails = array();
		foreach ($UserIDScond as $parsedKey) {
			$IDbasedemails[$parsedKey['User']['id']] = $parsedKey['User'];
		}
		
		

		
		$insertAttary = array();
		foreach ($UserIDS as $parsedKey) {
			$postedData['writer_id'] = $parsedKey;
			$postedData['area'] = $emailBasedDetails[$IDbasedemails[$parsedKey]['username']]['catagory'];
			$UserLevel = $emailBasedDetails[$IDbasedemails[$parsedKey]['username']]['paygrade'];

			switch ($UserLevel) {
				case '200':
					$userPaygrade = 'Bronze';
					break;
				
				case '400':
					$userPaygrade = 'Silver';
					break;
				case '800':
					$userPaygrade = 'Gold';
					break;
				case '1600':
					$userPaygrade = 'Platinum';
					break;

			}
			$postedData['level'] = $userPaygrade;
			
			array_push($insertAttary, $postedData);
			
		} 

		foreach ($insertAttary as $parsedKey) {
			$this->WriterCredits->saveAll($parsedKey);
		}
		echo json_encode($insertAttary);
		// $this->WriterCredits->save($postedData);

		// echo json_encode($postedData);
			
		// echo json_encode($UserIDS);
	}






























	// M2M communication
	// public function tempfx(){
	// 	App::import('Model','TimeHandler');
	// 	$TimeHandler = new TimeHandler();
	// 	$TimeHandler->timeEnd();
	// }

}

?>