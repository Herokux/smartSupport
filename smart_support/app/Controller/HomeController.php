<?php
    App::uses('CakeEmail', 'Network/Email');
    class HomeController extends AppController{

        public $uses=array('PricingPlan');

		public function beforeFilter(){
            $this->Auth->allow('pricingplan');
        }		
	}		
?>
