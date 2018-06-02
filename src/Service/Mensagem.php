<?php

namespace App\Service;

class Mensagem
{
    public function escreverMensagem($nome)
    {
        return "Um frase qualquer feita pelo {$nome}!";
    }
}