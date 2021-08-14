<?php

namespace frontend\controllers;

use frontend\models\Tasks;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class TasksController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Tasks::find()->where(['status' => 'new'])->orderBy('id DESC'),
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
    
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }
}
