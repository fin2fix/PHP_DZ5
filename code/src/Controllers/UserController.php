<?php

namespace Geekbrains\Application1\Controllers;

use Geekbrains\Application1\Render;
use Geekbrains\Application1\Models\User;
use Geekbrains\Application1\Models\Message;

class UserController
{


    public function actionIndex()
    {
        $users = User::getAllUsersFromStorage();

        $render = new Render();

        if (!$users) {
            return $render->renderPage(
                'user-empty.twig',
                [
                    'title' => 'Список пользователей в хранилище',
                    'message' => "Список пуст или не найден"
                ]
            );
        } else {
            return $render->renderPage(
                'user-index.twig',
                [
                    'title' => 'Список пользователей в хранилище',
                    'users' => $users,
                ]
            );
        }
    }

    public function actionSave()
    {
        $address = "./storage/birthdays.txt";
        $name = $_GET['name'];
        $birthday = $_GET['birthday'];
        $data = $name . ", " . $birthday . PHP_EOL;

        $fileHandler = fopen($address, 'a');

        if (fwrite($fileHandler, $data)) {
            header("location: ../");
            die();
        } else {
            return "Ошибка при попытке записи в файл. Запись не добавлена";
        }
    }
}
