<?php

class CompromissoController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        //instancio um objeto model;
        $model = new Application_Model_Compromisso();
        //tras todos os resultados do banco
        $dados = $model->select();
        // escapa uma visao com os resutltados referentes
        $this->view->assign("compromisso", $dados);
    }

    public function showAction() {
        //instancio um objeto model;
        $model = new Application_Model_Compromisso();
        //busco o id que eu quero ver
        $comp = $model->find($this->_getParam('id'));
        //crio uma view para o id referente;
        $this->view->assign("compromisso", $comp);
    }

    public function newAction() {
        
    }

    public function createAction() {
        //instancio um objeto model;
        $model = new Application_Model_Compromisso();
        //persisto os dados no banco
        $model->insert($this->_getAllParams());
        //redireciono para o index
        $this->_redirect('compromisso/index');
    }

    public function editAction() {
        //instancio um objeto model;
        $model = new Application_Model_Compromisso();
        //busco no banco o quem eu quero editar
        $comp = $model->find($this->_getParam('id'));
        // renderiso uma view com os dados
        $this->view->assign("compromisso", $comp);
    }

    public function updateAction() {
        //instancio um objeto model;
        $model = new Application_Model_Compromisso();
        //passo para a model os dados a serem upados
        $model->update($this->_getAllParams());
        //redireciono para a view
        $this->_redirect('compromisso/index');
    }
    
    public function destroyAction() {
        //instancio um objeto model;
        $model = new Application_Model_Compromisso();
        //mando para a model o id de quem sera excluido
        $model->delete($this->_getParam('id'));
        //redireciono
        $this->_redirect('compromisso/index');
    }
}

