<?php

  namespace App\Entity;

  use \App\Db\DataBase;
  use \PDO;
 

class Empresa{
    /**
     * Identificador unico de cada empresa (Chave Primaria)
     * @var integer
     */
    public $id;

    /**
     * Nome da empresa
     * @var string
     * 
     */
    public $nome;

    /**
     * Endereço da empresa
     * @var string
     * 
     */
    public $endereco;


    /**
     * Método responsavel por buscar uma vaga por ID recebido
     * @param string $nome
     * @retur Vaga
     */
    // public static function getEmpresa(){
    //     return (new Database('vagas'))->select()
    //                                   ->fetchObject(self::class);
    // }
    public static function getEmpresas(){
        return (new Database('empresa'))->selectEmpresa()
                                      ->fetchAll(PDO::FETCH_CLASS,self::class);
    }
 

}

