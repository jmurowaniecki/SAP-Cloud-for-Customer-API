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
    })

    /**
     * Gera pessoa fictícia. Obs.: CPF vão gera utilizando algoritmo válido.
     * 
     * Ex.: /person
     */
    ->route('/person', function (...$a) {
        if (!isset($_SERVER['HTTP_AUTHORIZATION'])) {
            \CORE\λ::print('Not authorizated!', 1, ["", "401 unauthorized"]);
        }
        $gen = function ($L = 3, $N = ''): String { for ($n = 0; $n < $L; $n++, $N .= rand(0, 9)); return str_pad($N, $L, '0'); };
        $doc = $gen() . "." . $gen() . "." . $gen() . "-" . $gen(2);
        $sex = ['male', 'female'][rand(0, 10) % 2];

        $dict = json_decode(file_get_contents('names.json'));
        $list = $dict->first_name->{$sex};
        $last = $dict->last_name[rand(0, sizeof($dict->last_name)-1)];
        $name = $list[rand(0, sizeof($list)-1)];
        $nick = strtolower(str_replace($dict->from, $dict->to, "${name}.${last}"));
        $mail = str_replace(['..', '@.'], ['.', '@'], "${nick}@".str_shuffle($nick).".".$dict->mail[rand(0, sizeof($dict->mail)-1)]);

        return json_encode([
            "sex" => $sex,
            "doc" => $doc,
            "name" => "${name} ${last}",
            "nick" => $nick,
            "mail" => $mail
        ]);
    });
