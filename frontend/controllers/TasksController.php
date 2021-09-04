<?php

namespace frontend\controllers;

use frontend\models\TaskFilter;
use yii\web\Controller;
use Yii;

class TasksController extends Controller
{
    public function actionIndex()
    {
        $filter = new TaskFilter();
        $filter->load(Yii::$app->request->get());
    
        return $this->render('index', ['filter' => $filter]);
    }
}
