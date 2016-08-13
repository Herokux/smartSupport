<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $components = array(
	'DebugKit.Toolbar',
    'Session',
    'Auth' => array(
        'loginRedirect' => array('controller' => 'Pages', 'action' => 'home'),
        'logoutRedirect' => array('controller' => 'Users', 'action' => 'login'),
        'authError' => 'You must be logged in to view this page.',
        'loginError' => 'Invalid Username or Password entered, please try again.'
 
    ));
	
    public function beforeFilter(){
        //Logged In user variables
        $this->set('title_for_layout','White Panda - The One Stop Shop for all your Content needs');
        $this->set('isLoggedIn',$this->Auth->loggedIn());
        $this->set('activeUser',$this->Session->read('Auth'));
        $this->activeUser = $this->Session->read('Auth');
        $this->isLoggedIn = $this->Auth->loggedIn();
        
    }
    public function isAuthorized($user) {
        // Here is where we should verify the role and give access based on role   
        return true;
    }


	//User Errors page

	// public function beforeRender() {
	// 	    if($this->name == 'CakeError') {
	// 	        $this->layout='home_layout_materialize';
	// 			$this->set('title_for_layout', 'Page not found | White Panda');
	// 		}
	// }
	
	/**
 		* Function to send json response. This function is generally used when an ajax request is made
 		*
 		* @param array   $response Data to be sent in json response
 		*
 		* @return void
		*/
	public function sendJson($response)
		{
			// Make sure no debug info is printed
			Configure::write('debug', 0); // Turn this to 2 for debugging
			// Set the data for view
			$this->set('response', $response);
			// We will use no layout	
			$this->layout = '';
			// Render the json element    
			$this->render(null, null, View . 'elements' . DS . 'json.ctp');
		}//end sendJson()
	
	
	
}
