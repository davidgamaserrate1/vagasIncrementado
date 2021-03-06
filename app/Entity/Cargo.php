<?php

  namespace App\Entity;

  use \App\Db\DataBase;
  use \PDO;


class Cargo{
    /**
     * Identificador unico de cada cargo (Chave Primaria)
     * @var integer
     */
    public $codigo_cargo;

    /**
     *  Descricao do cargo
     * @var string
     * 
     */
    public $descricao;

    /**
     * Salario por cargo
     * @var double
     * 
     */
    public $salario;

    /**
     * define se a vaga está ativa (Foreing Key)
     * @var integer 
     * 
     */
    public $codigo_setor;

  

    /**
     * Método repossavel por cadastrar nova vaga
     * @return boolean
     */
    public function cadastrar(){
        //definir a data    
        $this->data = date('Y-m-d H:i:s');

        //inserir vaga no banco
        $obDatabase = new Database('vagas');
        $this->id = $obDatabase->insert([
                'titulo'    => $this->titulo,
                'descricao' => $this->descricao,
                'ativo'     => $this->ativo,
                'data'      => $this->data
        ]);
      //RETORNAR STATUS
      return true;
    }
    /**
     * Método responsável por atualizar Vaga
     * @return boolean
     */
    public function atualizar(){
    return (new Database('vagas'))->update('id = '.$this->id,[
                                                                'titulo'    => $this->titulo,
                                                                'descricao' => $this->descricao,
                                                                'ativo'     => $this->ativo,
                                                                'data'      => $this->data
                                                              ]);
  }

    /**
     * Método responsavel por obter as vagas do banco de dados
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     * 
     */
    public static function getVagas($where = null, $order = null, $limit = null){
        return (new Database('vagas'))->select($where,$order,$limit)
                                      ->fetchAll(PDO::FETCH_CLASS,self::class);
    }
    /**
     * Método responsavel por buscar uma vaga por ID recebido
     * @param integer $id
     * @retur Vaga
     */
    public static function getVaga($id){
        return (new Database('vagas'))->select('id = '.$id)
                                      ->fetchObject(self::class);
    }
    /**
     * Método responsáve por excluir vaga do banco de dados
     *@return boolean
     */
    public function excluir(){
        return (new Database('vagas'))->delete('id ='.$this->id);
    }

}

