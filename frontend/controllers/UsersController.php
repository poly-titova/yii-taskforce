<?php

namespace frontend\controllers;

use frontend\models\Users;
use yii\web\Controller;

class UsersController extends Controller
{
    public function actionIndex()
    {
        $userData = [];
        $users = Users::find()
            ->orderBy('id DESC')
            ->all();

        foreach ($users as $user) {
            $userData[$user->id] = [
                'id' => $user->id,
                'name' => $user->name,
                'last_name' => $user->last_name,
                'first_name' => $user->first_name,
                'email' => $user->email,
                'password' => $user->password,
                'age' => $user->age,
                'last_activity_at' => $user->last_activity_at,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,
            ];
        }

        return $this->render('index', ['userData' => $userData]);
    }
}
