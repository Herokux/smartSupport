<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}
	public function home(){
		$this->layout='home_layout_materialize';
		if($this->Session->check('Auth.User')){
            if($this->Auth->user('type')=='Business'){
                $this->redirect(array('controller'=>'Businesses','action' => 'dashboard'));        
            }
            else if($this->Auth->user('type')=='Writer'){
                $this->redirect(array('controller'=>'Writers','action' => 'dashboard'));
            }
        }
        else{
        	
        }
	}
	
	public function howItWorks(){
		$this->layout='home_layout_materialize';
		$this->set('title_for_layout', 'How It works | White Panda');
	}
	public function productsAndPricing(){
		$this->layout='home_layout_materialize';
		$this->set('title_for_layout', 'Products & Pricing | White Panda');
	}
	
	public function aboutus(){
		$this->layout='home_layout_materialize';
		$this->set('title_for_layout', 'About Us | White Panda');
	}
	public function press() {
		$this->layout='home_layout_materialize';
		$this->set('title_for_layout', 'Press | White Panda');
	}
	public function wpAmbassadorProgramme(){
		$this->layout='home_layout_materialize';
		$this->set('title_for_layout', 'Ambassador Programme | White Panda');
	}
	public function partner(){
		$this->layout='home_layout_materialize';
		$this->set('title_for_layout', 'Partners | White Panda');
	}
	public function talktous(){
		$this->layout='home_layout_materialize';
		$this->set('title_for_layout', 'Talk to us | White Panda');
	}
	public function careers(){
		$this->layout='home_layout_materialize';
		$this->set('title_for_layout', 'Careers | White Panda');
	}
	public function WritingInternshipProgramme(){
		$this->layout='home_layout_materialize';
		$this->set('title_for_layout', 'Writing Internship Programme | White Panda');
	}
	public function termsUse(){
		$this->layout='home_layout_materialize';
		$this->set('title_for_layout', 'Terms of Use - White Panda');
	}
	public function privacy(){
		$this->layout='home_layout_materialize';
		// $this->fetch('title');
		$this->set('title_for_layout', 'Privacy- White Panda');
		// $this->pageTitle = 'Privacy- White Panda';
		// $this->set('title_for_layout','Privacy- White Panda');
	}
	public function writersAgreement(){
		$this->set('title_for_layout', 'Writer Service Agreement- White Panda');
		$this->layout='home_layout_materialize';
	}
	public function meetTheTeam(){
		$this->set('title_for_layout', 'WhitePanda - Content. Delivered.');
		$this->layout='home_layout';
	}
	public function beforeFilter(){
			$this->set('title_for_layout','White Panda - The One Stop Shop for all your Content needs');
            $this->Auth->allow('home','termsUse','privacy','writersAgreement','meetTheTeam', 'howItWorks', 'productsAndPricing', 'aboutus', 'wpAmbassadorProgramme', 'WritingInternshipProgramme','press','partner','careers','talktous');
        }
}
