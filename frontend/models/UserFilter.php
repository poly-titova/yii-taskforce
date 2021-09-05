<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;

class UserFilter extends Model
{
    public $categories = [];
    public $isFree;
    public $isOnline;
    public $withReviews;
    public $favorite;

    public function getDataProvider()
    {
        $query = Tasks::find()->alias('u')->where(['role' => 'executor'])->orderBy('id DESC');
        if ($this->categories) {
            $query->where(['IN', 'category_id', $this->categories]);
        }

        if ($this->isFree) {
            $query->joinWith('tasks', function (ActiveQuery $query) {
                $query->andWhere('COUNT(u.tasks) = 0');
            });
        }

        if ($this->isOnline) {
            $query->joinWith('users', function (ActiveQuery $query) {
                $query->andWhere('COUNT(u.last_visit) = CURRENT_TIMESTAMP');
            });
        }

        if ($this->withReviews) {
            // SELECT * FORM users u
            // LEFT JOIN reviews r ON r.user_id = u.id
            $query->joinWith('reviews', function (ActiveQuery $query) {
                $query->andWhere('COUNT(r.id) > 0');
            });
        }

        if ($this->favorite) {
            $query->joinWith('users', function (ActiveQuery $query) {
                $query->andWhere('COUNT(u.favorite) = 1');
            });
        }

        $query->groupBy('u.id');

        return new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
    }
}
