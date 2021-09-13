<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class TaskFilter extends Model
{
    public $categories = [];
    public $isRemote;
    public $withoutReplies;
    public $period;
    public $name;

    public function getDataProvider()
    {
        $query = Tasks::find()->where(['status' => 'new'])->orderBy('id DESC');
        if ($this->categories) {
            $query->where(['IN', 'category_id', $this->categories]);
        }

        if ($this->isRemote) {
            $query->andWhere(['address' => null]);
        }

        if ($this->withoutReplies) {
            $query->leftJoin('replis', 'reviews.executer_id = null');
        }

        if ($this->period) {
            $query->andWhere('dt_add > NOW() - INTERVAL :period DAY', [':period' => $this->timePeriod]);
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
