<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
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
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
Router::parseExtensions('rss','json');
Router::connect('/', array('controller' => 'pages', 'action' => 'home', 'home'));
/*
 * ...and connect the rest of 'Pages' controller's URLs.
*/
Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

Router::connect('/faqs', array('controller' => 'faqs', 'action' => 'index'));

Router::connect('/faqs/writer', array('controller' => 'faqs', 'action' => 'index'));

Router::connect('/faqs/writer/:id', ['controller' => 'faqs', 'action' => 'writer'],
    ['id' => '\d+', 'pass'=>['id']]
);

Router::connect('/faqs/client', array('controller' => 'faqs', 'action' => 'index'));

Router::connect('/faqs/client/:id', ['controller' => 'faqs', 'action' => 'client'],
    ['id' => '\d+', 'pass'=>['id']]
);

Router::connect('/faqs/intern', array('controller' => 'faqs', 'action' => 'index'));

Router::connect('/faqs/intern/:id', ['controller' => 'faqs', 'action' => 'intern'],
    ['id' => '\d+', 'pass'=>['id']]
);

Router::connect('/faqs/guest', array('controller' => 'faqs', 'action' => 'index'));

Router::connect('/faqs/guest/:id', ['controller' => 'faqs', 'action' => 'guest'],
    ['id' => '\d+', 'pass'=>['id']]
);

Router::connect('/faqs/payment', array('controller' => 'faqs', 'action' => 'index'));

Router::connect('/faqs/payment/:id', ['controller' => 'faqs', 'action' => 'payment'],
    ['id' => '\d+', 'pass'=>['id']]
);


Router::connect('/faqs/credits', array('controller' => 'faqs', 'action' => 'index'));

Router::connect('/faqs/credits/:id', ['controller' => 'faqs', 'action' => 'credits'],
    ['id' => '\d+', 'pass'=>['id']]
);

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
require CAKE . 'Config' . DS . 'routes.php';
