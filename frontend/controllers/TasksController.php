<?php

namespace frontend\controllers;

use frontend\models\TasksFilter;
use yii\web\Controller;
use Yii;

class TasksController extends Controller
{
    public function actionIndex()
    {
        $formFilter = new TasksFilter();
        if (Yii::$app->request->isPost) {
            $formFilter->load(Yii::$app->request->post());
        }

        return $this->render('index', [
            'provider' => $formFilter->getDataProvider(),
            'formFilter' => $formFilter,
        ]);
    }
}
