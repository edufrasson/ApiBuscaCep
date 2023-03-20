<?php

namespace App\Controller;

use App\Model\CidadeModel;
use App\Model\EnderecoModel;
use FFI\Exception;

class EnderecoController extends Controller
{

    /*     
        localhost:8000/endereco/by-cep
    */
    public static function getLogradouroByCep(): void
    {
        try {

            $cep = parent::getIntFromURL((isset($_GET['cep'])) ? $_GET['cep'] : null, 'cep');

            $model = new EnderecoModel();
            $model->getLogradouroByCep($cep);

            parent::setResponseAsJSON($model->rows);
        } catch (Exception $e) {
            parent::getExceptionAsJSON($e);
        }
    }

    /*     
        localhost:8000/cep/by-logradouro
    */
    public static function getCepByLogradouro(): void
    {
        try {

            $logradouro = $_GET['logradouro'];
            $model = new EnderecoModel();
            $model->getCepByLogradouro($logradouro);

            parent::setResponseAsJSON($model->rows);
        } catch (Exception $e) {
            parent::getExceptionAsJSON($e);
        }
    }
    public static function getLogradouroByBairroAndCidade(): void
    {
        try {

            $bairro = parent::getStringFromURL((isset($_GET['bairro'])) ? $_GET['bairro'] : null, 'bairro');
            $id_cidade = parent::getIntFromURL((isset($_GET['id_cidade'])) ? $_GET['id_cidade'] : null, 'id_cidade');

            $model = new EnderecoModel();
            $model->getLograoduroByBairroAndCidade($bairro, $id_cidade);

            parent::setResponseAsJSON($model->rows);
        } catch (Exception $e) {
            parent::getExceptionAsJSON($e);
        }
    }
    public static function getCidadesByUF(): void
    {
        try {

            $uf = $_GET['uf'];
            $model = new CidadeModel();
            $model->getCidadesByUF($uf);

            parent::setResponseAsJSON($model->rows);
        } catch (Exception $e) {
            parent::getExceptionAsJSON($e);
        }
    }
    public static function getBairrosByIdCidade(): void
    {
        try {

            $cidade = parent::getIntFromURL($_GET['id_cidade']);
            $model = new EnderecoModel();
            $model->getBairrosByIdCidade($cidade);

            parent::setResponseAsJSON($model->rows);
        } catch (Exception $e) {
            parent::getExceptionAsJSON($e);
        }
    }
}
