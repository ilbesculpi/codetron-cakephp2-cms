<?php

App::uses('AppController', 'Controller');

class CmsAppController extends AppController {
	
	public $components = array(
		'Auth' => array(
			'loginRedirect'  => array('plugin' => 'cms', 'controller' => 'dashboard', 'action' => 'home'),
			'logoutRedirect' => array('plugin' => 'cms', 'controller' => 'auth', 'action' => 'login'),
			'loginAction'    => array('plugin' => 'cms', 'controller' => 'auth', 'action' => 'login'),
			'authenticate' => array(
				'Form' => array(
					'fields' => array('username' => 'email'),
					'userModel' => 'Cms.Admin'
				)
			),
			'authorize' => array('Controller')
		),
        'Paginator'
	);
	
	public $helpers = array('Cms.Theme');
	
	public $section = 'Dashboard';
	
	
	public function beforeRender() {
		parent::beforeRender();
		$this->set('section', $this->section);
	}
	
    
	public function renderJSON($result, $root = 'result') {
		$this->autoLayout = false;
		$this->autoRender = false;
		if( $root ) {
			$result = array($root => $result);
		}
		$this->response->type('json');
		$this->response->body(json_encode($result));
	}
	
	public function setFlash($message, $type = 'info') {
		if( $type === 'error' ) $type = 'danger';
		$this->Session->setFlash( $message, 'flash', array('type' => $type) );
	}
	
	public function isAuthorized($user) {
		// default strategy is to allow access to any logged user
		return $user['status'] == 1 ? true : false;
	}
	
	public function setSection($section) {
		$this->section = $section;
		$this->set('section', $section);
	}
	
}