<?php

namespace src\controllers;

use \core\Controller;
use \src\models\Pergunta;
use \src\models\Resposta;

class HomeController extends Controller
{

    public function index()
    {
        $this->render('home', ['nome' => 'thiago']);
    }

    public function sobre()
    {
        $this->render('sobre');
    }

    public function sobreP($args)
    {
        /*  $pergunta = Pergunta::insert(['pergunta' => 'qualquer','resposta_id' => 1, 'palavra_chave_id' => 1])->execute();
        print_r($pergunta); */
        $pergunta = Pergunta::select()->get();
        return ($pergunta);
    }
}
