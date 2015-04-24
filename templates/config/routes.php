<?php

Router::redirect(
	'/cms',
	array('plugin' => 'cms', 'controller' => 'dashboard', 'action' => 'home'),
	array('persist' => true)
);

Router::connect(
	'/cms/login',
	array('plugin' => 'cms', 'controller' => 'auth', 'action' => 'login')
);

Router::connect(
	'/cms/logout',
	array('plugin' => 'cms', 'controller' => 'auth', 'action' => 'logout')
);

Router::connect(
	'/cms/register',
	array('plugin' => 'cms', 'controller' => 'auth', 'action' => 'register')
);

Router::connect(
	'/cms/welcome',
	array('plugin' => 'cms', 'controller' => 'auth', 'action' => 'welcome')
);

Router::connect(
	'/cms/dashboard',
	array('plugin' => 'cms', 'controller' => 'dashboard', 'action' => 'home')
);
