<?php

namespace API;

/**
 * NBW Digital / SAP API Integration
 * Interface simples de conexão para testes de integração com o treinamento SAP.
 *
 * @category Package
 * @package  API
 * @author   John Murowaniecki <john@compilou.com.br>
 * @license  Creative Commons 4.0 - Some rights reserved
 * @link     https://github.com/jmurowaniecki/lambda-nano-php
 */

require_once '../vendor/autoload.php';

/**
 * …Instanciando motor com a URL da requisição…
 */
(new class($_SERVER['REQUEST_URI']) extends \CORE\λ {})

    /**
     * Rota principal/índice retorna 32 bytes encodados em 64 bits.
     */
    ->route('/', function () {
        return json_encode(["key" => base64_encode(random_bytes(32))]);
    })

    /**
     * Calcula a soma dos parâmetros informados.
     * 
     * Ex.: /sum/1/2/3           retorna {"value":6}
     */
    ->route('/sum', function (...$a) {
        return json_encode(["value" => array_sum($a)]);
    });
