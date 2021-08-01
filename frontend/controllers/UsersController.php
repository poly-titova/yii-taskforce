<?php

namespace frontend\controllers;

use frontend\models\UsersFilter;
use yii\web\Controller;
use Yii;

class UsersController extends Controller
{
    public function actionIndex()
    {
        $formFilter = new UsersFilter();
        if (Yii::$app->request->isPost) {
            $formFilter->load(Yii::$app->request->post());
        }

        return $this->render('index', [
            'provider' => $formFilter->getDataProvider(),
            'formFilter' => $formFilter,
        ]);
    }
}
