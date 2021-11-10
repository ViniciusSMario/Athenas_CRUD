<?php

namespace App\Helpers;

use App\Exceptions\CustomExceptions;

class CustomHelper
{
    private static $mensagens_validacao = [
        'required' => 'campo :attribute é obrigatório.',
        'numeric' => 'campo :attribute deve ser um número',
        'date' => 'campo :attribute deve ser uma data',
        'integer' => 'campo :attribute deve ser um número inteiro',
        'exists' => 'campo correspondente a :attribute = :input não existe no banco de dados.',
        'regex' => 'campo :attribute possui formato incorreto',
        'size' => 'campo :attribute deve possuir tamanho :size.',
        'string' => 'campo :attribute deve ser uma string',
        'file' => 'campo :attribute deve ser um arquivo',
        'max' => 'campo :attribute deve ser no máximo :max',
        'unique' => 'campo :attribute já presente no banco, deve ser único',
        'required_without' => 'é obrigatório ao menos um dos campos: :attribute, :values',
    ];

    /**
     * Retorna as mensagens padrão para o validator e adiciona mensagens customizadas enviadas por parametro
     */
    static public function get_mensagens_validacao ($mensagens_custom = []){
        return array_merge(self::$mensagens_validacao, $mensagens_custom);
    }
}
