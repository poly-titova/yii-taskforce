<?php

namespace frontend\controllers;

use frontend\models\Users;
use yii\web\Controller;

class UsersController extends Controller
{
    public function actionIndex()
    {
        $users = Users::find()
            ->orderBy('id DESC')
            ->all();

        return $this->render('index', ['users' => $users]);
    }
}
