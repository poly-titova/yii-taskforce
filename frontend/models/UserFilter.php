<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class UserFilter extends Model
{
    public $categories = [];
    public $isFree;
    public $isOnline;
    public $withReviews;
    public $favorite;
    public $name;

    public function getDataProvider()
    {
        $query = Users::find()->where(['role' => 'executor'])->orderBy('id DESC');
        if ($this->categories) {
            $query->where(['IN', 'category_id', $this->categories]);
        }

        if ($this->isFree) {
            $query->leftJoin('task', 'task.executer_id != users.id')->groupBy('users.id');
        }

        if ($this->isOnline) {
            $query->andWhere('last_visit = NOW()');
        }

        if ($this->withReviews) {
            $query->leftJoin('reviews', 'reviews.executer_id = users.id')->groupBy('users.id');
        }

        if ($this->favorite) {
            $query->andWhere('favorite = 1');
        }

        $query->andFilterWhere(['Like', 'name', $this->name]);

        return new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
    }
}
