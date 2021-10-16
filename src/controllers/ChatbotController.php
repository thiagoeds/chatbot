<?php

namespace src\controllers;

use \core\Controller;
use \src\models\Pergunta;
use \src\models\Resposta;

class ChatbotController extends Controller
{
    public function index()
    {
        echo json_encode(["Hello" => 'World']);
    }
}
