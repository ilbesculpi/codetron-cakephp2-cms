<?php

App::uses('AppHelper', 'View/Helper');

class ThemeHelper extends AppHelper {
	
	public function breadcrumbs($navigation) {
		return $this->_View->element('breadcrumbs', array('navigation' => $navigation));
	}
	
	public function getStatusAdministrador($status) {
		switch( $status ) {
			case Administrador::STATUS_ACTIVO:
				return 'activo';
			case Administrador::STATUS_BLOCKED:
				return 'bloqueado';
			case Administrador::STATUS_INACTIVO:
				return 'inactivo';
			case Administrador::STATUS_PASSWORD_NOT_SET:
				return 'inactivo';
		}
		return 'N/A';
	}
	
}