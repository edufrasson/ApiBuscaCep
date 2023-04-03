<?php

namespace App\Controller;

use App\Model\CidadeModel;
use App\Model\EnderecoModel;
use FFI\Exception;

class EnderecoController extends Controller
{

    /*     
        localhost:8000/endereco/by-cep?cep=17207495
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
        http://localhost:8000/cep/by-logradouro?logradouro=Rua%20Vinte%20e%20Quatro%20de%20Fevereiro
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
    /*     
        localhost:8000/logradouro/by-bairro?bairro=Centro&id_cidade=4874
    */
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
     /*     
        localhost:8000/cidade/by-uf?uf=SP
    */
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

    /*     
        localhost:8000/bairro/by-cidade?id_cidade=4874
    */
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
