<?php
/**
 *
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
 * @package       app.Config
 * @since         CakePHP(tm) v 2.0.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

/**
 * This is email configuration file.
 *
 * Use it to configure email transports of CakePHP.
 *
 * Email configuration class.
 * You can specify multiple configurations for production, development and testing.
 *
 * transport => The name of a supported transport; valid options are as follows:
 *  Mail - Send using PHP mail function
 *  Smtp - Send using SMTP
 *  Debug - Do not send the email, just return the result
 *
 * You can add custom transports (or override existing transports) by adding the
 * appropriate file to app/Network/Email. Transports should be named 'YourTransport.php',
 * where 'Your' is the name of the transport.
 *
 * from =>
 * The origin email. See CakeEmail::from() about the valid values
 *
 */
class EmailConfig {

	// public $default = array(
	// 	'transport' => 'Mailgun.Basic',
	// 	'from' => array('noreply@whitepanda.in'=>'White Panda'),
 //        'mailgun_domain'    => 'whitepanda.in',
 //        'api_key'   => 'key-c4790787659ee07121b6bc7ace29007e'
	// );




	// public $default = array(
	// 	'transport' => 'Mail',
	// 	'from' => array('ayush.shrote@iitgn.ac.in'=>'White Panda'),
	// 	'charset' => 'utf-8',
	// 	'headerCharset' => 'utf-8'	
	// );


	public $mailgun = array(
        'transport' => 'Mailgun.Basic',
        'mailgun_domain'    => 'whitepanda.in',
        'api_key'   => 'key-c4790787659ee07121b6bc7ace29007e'
    );

	// public $smtp = array(
	// 	'transport' => 'Smtp',
	// 	// 'from' => array('noreply@whitepanda.in'=>'White Panda'),
	// 	'host' => 'ssl://smtp.sendgrid.net',
	// 	'port' => 465,
	// 	'timeout' => 30,
	// 	'username' => 'roshan.agarwal@iitgn.ac.in',
 //        'password' => 'Redhat101##'
   
	// 	//'charset' => 'utf-8',
	// 	//'headerCharset' => 'utf-8',
	// );


	

	public $default = array(
		'transport' => 'Smtp',
		'from' => array('noreply@whitepanda.in'=>'White Panda'),
		'host' => 'ssl://smtp.gmail.com',
		'port' => 465,
		'timeout' => 30,
		'username' => 'rajanigandhatulsi@gmail.com',
        'password' => 'rajanigandhatulsi1234567890',
        'secure' => 'ssl'
		// 'client' => null,
		// 'log' => false
		// 'tls' => true

    );

	public $fast = array(
		'from' => 'you@localhost',
		'sender' => null,
		'to' => null,
		'cc' => null,
		'bcc' => null,
		'replyTo' => null,
		'readReceipt' => null,
		'returnPath' => null,
		'messageId' => true,
		'subject' => null,
		'message' => null,
		'headers' => null,
		'viewRender' => null,
		'template' => false,
		'layout' => false,
		'viewVars' => null,
		'attachments' => null,
		'emailFormat' => null,
		'transport' => 'Smtp',
		'host' => 'localhost',
		'port' => 25,
		'timeout' => 30,
		'username' => 'user',
		'password' => 'secret',
		'client' => null,
		'log' => true,
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);
	 public $gmail = array(
		'transport' => 'Smtp',
        'from' => array('piyushkundnani.pk@gmail.com'=>'White Panda'),
        'host' => 'ssl://smtp.gmail.com',
        'port' => 465,
        'timeout' => 30,
        'username' => 'piyushkundnani.pk@gmail.com',
        'password' => '18march1995',
        'secure' => 'ssl'
		
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);

}
