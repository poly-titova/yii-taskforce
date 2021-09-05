<?php

namespace frontend\controllers;

use frontend\models\UserFilter;
use yii\web\Controller;
use Yii;

class UsersController extends Controller
{
    public function actionIndex()
    {
        $filter = new UserFilter();
        $filter->load(Yii::$app->request->get());

        return $this->render('index', ['filter' => $filter]);
    }
}
