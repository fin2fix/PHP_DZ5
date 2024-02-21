<?php

namespace Geekbrains\Application1\Controllers;

use Geekbrains\Application1\Render;

class PageController
{


    public function actionIndex()
    {
        $render = new Render();
        date_default_timezone_set('Europe/Moscow');

        return $render->renderPage('page-index.twig', [
            'title' => 'Главная страница',
            'realTime' => date('d-m-Y H:i:s')
        ]);
    }
}
