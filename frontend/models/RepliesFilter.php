<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class RepliesFilter extends Model
{
    public $withoutReplies;

    public function getDataProvider()
    {
        $query = Replies::find()->orderBy('id DESC');

        if ($this->withoutReplies) {
            $query->andWhere(['executor_id' => null]);
        }

        return new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
    }
}
