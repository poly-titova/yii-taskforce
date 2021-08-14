<?php

namespace frontend\controllers;

use frontend\models\Tasks;
use yii\web\Controller;

class TasksController extends Controller
{
    public function actionIndex()
    {
        $query = Tasks::find()
            ->where(['status' => 'new'])
            ->orderBy('id DESC');

        $countQuery = clone $query;
        $pages = new \yii\data\Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 5]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
    
        return $this->render('index', ['tasks' => $models, 'pages' => $pages]);
    }
}
