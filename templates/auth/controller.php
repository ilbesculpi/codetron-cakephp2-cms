<?php

App::uses('CmsAppController', 'Cms.Controller');

class AuthController extends CmsAppController {
	
	public $layout = 'auth';
	
	public $uses = array('Cms.Admin');
	
	public function beforeFilter() {
		parent::beforeFilter();
		$allowed = array('login', 'register', 'welcome','forgot_password','reset_password');
		$this->Auth->allow( $allowed );
	}
	
	public function login() {

		if( $this->request->is('post') ) {
			if( $this->Auth->login() ) {
				if($this->Auth->user('status') == Admin::STATUS_ACTIVE) {
					$this->Admin->login( $this->Auth->user() );
					$this->redirect( $this->Auth->redirectUrl() );
				}
				else{
					$this->setFlash(__d('cms', 'Your account is not activated yet. Please contact an administrator.'), 'error');
					$this->logout();
				}
			}
			else {
				$this->setFlash(__d('cms', 'Invalid username/password.'), 'error');
			}
		}
        
		$admin = $this->Admin->proxy($this->request->data);
		$this->set('admin', $admin);
	}
	
	public function logout() {
		$this->redirect( $this->Auth->logout() );
	}
	
	public function register() {
		if( $this->request->is('post') ) {
			$this->Admin->create();
			$this->request->data['Admin']['status'] = Admin::STATUS_INACTIVE;
			if( $this->Admin->save($this->request->data) ) {
				$this->setFlash(__d('cms', 'Your account has been created.'), 'success');
				return $this->redirect('welcome');
			}
			else {
				$this->setFlash(__d('cms', 'An error occurred, please try again.'), 'error');
			}
		}
	}
	
	public function welcome() {
		
	}

	public function profile(){
		$this->layout = 'default';
		$admin = $this->Admin->proxy($this->request->data);
		$this->set('admin', $admin);
	} 

	public function forgot_password() {
		if( $this->request->is('post') ) {
			$email = $this->request->data['email'];
			$result = $this->Admin->forgotPassword($email);
			if( $result ) {
				$this->setFlash(sprintf('Te hemos enviado un correo a <b>%s</b> con instrucciones para restablecer tu contrase&ntilde;a', $email), 'info');
				return $this->redirect(array('action' => '../login'));
			}
			else {
				$this->setFlash(sprintf('La direcci&oacute;n <b>%s</b> no se encuentra registrada.', $email), 'error');
			}
		}
	}

	public function reset_password() {
		
		$user_id = $this->request->query['id'];
		$user = $this->Admin->findById($user_id);
		$this->set('user', $user);
		$ch = $this->request->query['ch'];
		$this->set('ch', $ch);
		
		if( !$user ) {
			return $this->redirect(array('action' => 'login'));
		}
		
		$check = $this->Admin->checkResetPasswordLink($user, $ch);
		if( !$check ) {
			$this->setFlash('Ha ocurrido un error.', 'error');
			return $this->redirect(array('action' => 'login'));
		}
		
		if( $this->request->is('post') ) {
			$newPassword = $this->request->data['password'];
			$ch = $this->request->data['ch'];
			$result = $this->Admin->resetPassword($user, $newPassword, $ch);
			if( $result ) {
				$this->setFlash('Se ha restablecido tu contrase&ntilde;a.', 'success');
			}
			else {
				$this->setFlash('Ha ocurrido un error.', 'error');
			}
			return $this->redirect(array('action' => 'login'));
		}
		
	}
	
}