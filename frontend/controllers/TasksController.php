<?php

namespace frontend\controllers;

use frontend\models\Tasks;
use yii\web\Controller;

class TasksController extends Controller
{
    public function actionIndex()
    {
        $taskData = [];
        $tasks = Tasks::find()
            ->where(['status' => 'new'])
            ->orderBy('id DESC')
            ->all();

        foreach ($tasks as $task) {
            $taskData[$task->id] = [
                'id' => $task->id,
                'title' => $task->title,
                'description' => $task->description,
                'category' => $task->category_id,
                'latitude' => $task->latitude,
                'longitude' => $task->longitude,
                'price' => $task->price,
                'task_term_at' => $task->task_term_at,
                'client_id' => $task->client_id,
                'executor_id' => $task->executor_id,
                'status' => $task->status,
                'created_at' => $task->created_at,
                'updated_at' => $task->updated_at,
                'city_id' => $task->city_id,
            ];
        }

        return $this->render('index', ['taskData' => $taskData]);
    }
}
