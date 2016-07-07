<?php

namespace Consulta\Helpers;

class Format
{
    public static function formataCpf($cpf) {
        $newCpf = (trim($cpf));
        $remover = array(".","-");
        $cpdFormatado = str_replace($remover,"", $newCpf);
        return $cpdFormatado;
    }

    public static function formataCep($cep) {
        $newcep = (trim($cep));
        $remover = array(".","-");
        $cepFormatado = str_replace($remover,"", $newcep);
        return $cepFormatado;
    }

    public static function formataTelefone($telefone) {
        $remover = array("(",")"," ","-");
        $novo_telefone = str_replace($remover,"", $telefone);
        return $novo_telefone;
    }

}