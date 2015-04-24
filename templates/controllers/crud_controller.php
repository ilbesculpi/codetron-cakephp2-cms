<?php

App::uses('CmsAppController', 'Cms.Controller');

class {{ Models }}Controller extends CmsAppController {
	
	public $uses = array('{{ Model }}');
	
	public function index() {
		$this->Paginator->settings = array(
			'{{ Model }}' => array(
				'order' => '{{ Model }}.id ASC',
				'limit' => 20
			)
		);
		$this->set('{{ models }}', $this->Paginator->paginate('{{ Model }}'));
	}

    public function view($id) {
        
		if( !$this->{{ Model }}->exists($id) ) {
			throw new NotFoundException();
		}
        
		${{ model }} = $this->{{ Model }}->findById($id);
		$this->set('{{ model }}', ${{ model }});
	}
    
	public function create() {
		
		if( $this->request->is('post') ) {
			 
            $this->{{ Model }}->create();
            
            if( $this->{{ Model }}->save($this->request->data) ) {
                $this->setFlash(__d('cms', '{{ Model }} created.'), 'success');
                return $this->redirect(array('action' => 'index'));
            }
			else {
				$this->setFlash(__d('cms', 'An error occurred, please try again.'), 'error');
			}
		}
		
		${{ model }} = $this->{{ Model }}->proxy( $this->request->data );
		$this->set('proxy', ${{ model }});
	}

	public function edit($id) {
		
		if( !$this->{{ Model }}->exists($id) ) {
			throw new NotFoundException();
		}
		
		if( $this->request->is(array('post', 'put')) ) {
			if( $this->{{ Model }}->save($this->request->data) ) {
				$this->setFlash(__d('cms', '{{ Model }} updated.'), 'success');
				return $this->redirect(array('action' => 'view', $this->{{ Model }}->id));
			}
			else {
				$this->setFlash(__d('cms', 'An error occurred, please try again.'), 'error');
			}
		}
		
		${{ model }} = $this->{{ Model }}->findById($id);
		$this->set('proxy', ${{ model }});
	}

	public function delete($id) {

		if( !$this->{{ Model }}->exists($id) ) {
			throw new NotFoundException();
		}
		
		if( $this->{{ Model }}->delete($id) ) {
			$this->setFlash(__d('cms', '{{ Model }} deleted.'), 'success');
			$this->redirect(array('action' => 'index'));
		}
		else {
			$this->setFlash(__d('cms', 'An error occurred, please try again.'), 'error');
			$this->redirect( array('action' => 'index') );
		}
	}
    
}
