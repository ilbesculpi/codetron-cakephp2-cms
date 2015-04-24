<?php

App::uses('CmsAppModel', 'Cms.Model');
App::uses('AuthComponent', 'Controller/Component');
App::uses('CakeEmail', 'Network/Email');

class Admin extends CmsAppModel {
	
    const STATUS_INACTIVE = 0;
	const STATUS_ACTIVE = 1;
	const STATUS_BLOCKED = -1;
    const ROLE_ADMIN = 'admin';
    
	public $useTable = 'administrators';
    private $seed = 'aec19c041bbc1254ef89dee';
	
	public function beforeSave($options = array()) {
		// hash password
		if( isset($this->data[$this->alias]['password']) ) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
        return parent::beforeSave($options);
    }
	
	public function login($admin) {
		$this->set('id', $admin['id']);
		$this->set('last_login', date('Y-m-d H:i:s'));
		$this->save();
	}

	public function forgotPassword($emailto) {
		
		$user = $this->findByEmail($emailto);
		
		if( !$user ) {
			return false;
		}
		
		$link = $this->getResetPasswordConfirmationLink($user);
		
		// notify event
		$email = new CakeEmail('default');
		
		$viewVars = array(
			'user' => $user,
			'link' => $link
		);

		$result = $email->to( $emailto )
			->subject('Cambia tu contraseña')
			->emailFormat('html')
			->template('Cms.user_reset_password', 'default')
			->viewVars($viewVars)
			->send();
		
		$this->log($result, 'debug');
		
		return true;
	}

	private function getResetPasswordConfirmationLink($user) {
		$ch = sha1($this->seed . ':' . $user['Admin']['id']);
		$url = Router::url(array(
			'controller' => 'auth', 
			'action' => 'reset_password', 
			'?' => array(
				'id' => $user['Admin']['id'],
				'ch' => $ch
			)
		), true);
		return $url;
	}

	public function resetPassword($user, $password, $ch) {
		if( $this->checkResetPasswordLink($user, $ch) ) {
			$data = array(
				'id' => $user['Admin']['id'],
				'password' => $password,
			);
			return $this->save($data, false);
		}
		return false;
	}
	
	public function checkResetPasswordLink($user, $ch) {
		$cho = sha1($this->seed . ':' . $user['Admin']['id']);
		return $ch === $cho;
	}
	
}