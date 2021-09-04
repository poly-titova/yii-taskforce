<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;

class TaskFilter extends Model
{
    public $categories = [];
    public $isRemote;
    public $withoutReplies;
    public $period;
    public $name;

    public function getDataProvider()
    {
        $query = Tasks::find()->alias('t')->where(['status' => 'new'])->orderBy('id DESC');
        if ($this->categories) {
            $query->where(['IN', 'category_id', $this->categories]);
        }

        if ($this->isRemote) {
            // $query->where(['IN', 'category_id', $filter->categories]);
            // REMOTE
        }

        if ($this->withoutReplies) {
            // SELECT * FORM tasks t
            // LEFT JOIN replies0 r ON r.task_id = t.id
            $query->joinWith('replies0', function (ActiveQuery $query) {
                $query->andWhere('COUNT(r.id) = 0');
            });
        }

        if ($this->period) {
            // ...
        }

        if ($this->name) {
            // WHERE name LIKE '%dfvdfv%'
        }

        $query->groupBy('t.id');

        return new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
    }
}
