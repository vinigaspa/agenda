<?php

class Application_Model_Compromisso {

    public function select($where = null, $order = null, $limit = NULL) {
        //cria um objeto do tipo da table selecionada;
        $dao = new Application_Model_DbTable_Compromisso();
        //faz a selecao dos dados encapsulados pelos metodos referentes
        $select = $dao->select()->from($dao)->order($order)->limit($limit);

        if (!is_null($where)) {
            //se where existir,faz a selecao com a condicional
            $select->where($where);
        }
        // retorna todos os resultados do select em um array
        return $dao->fetchAll($select)->toArray();
    }

    public function find($id) {
        //cria um objeto da tabela referente
        $dao = new Application_Model_DbTable_Compromisso();
        //utiliza o metodo find para achar passado por parametro;
        $arr = $dao->find($id)->toArray();
        //retorna o os dados achados;
        return $arr[0];
    }

    public function insert(array $dados) {
        //cria um objeto da tabela referente
        $dao = new Application_Model_DbTable_Compromisso();

        //crio um array que sabe o campo eo o dado referente para ser adicionado no banco
        $insert = array(
            'com_nome' => $dados['com_nome']
        );
        // insere o array no banco de dados e retorna um true or false
        return $dao->insert($insert);
    }

    public function update(array $dados) {
        //cria um objeto da tabela referente
        $dao = new Application_Model_DbTable_Compromisso();
        
        //crio um array que sabe o campo eo o dado referente para ser alterado no banco
        $up = array(
        'com_id' => $dados['com_id'],
        'com_nome' => $dados['com_nome']
        );
        //vejo quem é o ID que sera upado;
        $where = $where = $dao->getAdapter()->quoteInto("com_id = ?",$up['com_id']);
        //faco o update no cara;
        $dao->update($up,$where);
    }
    
    public function delete($id) {
        //cria um objeto da tabela referente
        $dao = new Application_Model_DbTable_Compromisso();
        //seta a condiçao para deletar o id selecionado
        $where = $dao->getAdapter()->quoteInto("com_id = ?",$id);
        //deleta o caboclo
        $dao->delete($where);
        
    }
    
    

}

