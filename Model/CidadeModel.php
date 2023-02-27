<?php

namespace App\Model;

use App\DAO\EnderecoDAO;
use Exception;

class CidadeModel extends Model
{
    public $descricao, $id_cidade, $uf, $codigo_ibge, $ddd;
       
    public function getCidadesByUF($uf)
    {
        try {
            $dao = new EnderecoDAO;

            $this->rows = $dao->selectCidadesByUF($uf);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}
