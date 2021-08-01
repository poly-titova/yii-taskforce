<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class TasksFilter extends Model
{
    // обозначение констант
    const TIME_PERIOD_DAY = 1;
    const TIME_PERIOD_WEEK = 7;
    const TIME_PERIOD_MONTH = 30;

    public $category;
    public $remoteWork;
    public $withoutExecutor;
    public $timePeriod;
    public $title;

    // правила, доступные для поиска
    public function rules()
    {
        return [
            [['category', 'remoteWork', 'withoutExecutor', 'timePeriod', 'title'], 'safe'],
            ['remoteWork', 'number'],
            ['withoutExecutor', 'number'],
            ['timePeriod', 'number'],
            ['title', 'string'],
        ];
    }

    // метки атрибутов
    public function attributeLabels()
    {
        return [
            'category' => 'Категории',
            'remoteWork' => 'Удаленная работа',
            'withoutExecutor' => 'Без исполнителя',
            'timePeriod' => 'Период',
            'title' => 'Поиск по названию'
        ];
    }

    // значение констант
    public function getTimePeriodMap()
    {
        return [
            self::TIME_PERIOD_DAY => 'За день',
            self::TIME_PERIOD_WEEK => 'За неделю',
            self::TIME_PERIOD_MONTH => 'За месяц'
        ];
    }

    // получение данных
    public function getDataProvider()
    {
        // поиск заданий
        $query = Tasks::find()
            ->where(['status' => 'new'])
            ->orderBy('id DESC');

        // настроили запрос, добавив фильтры
        $query->andFilterWhere(['category_id' => $this->category]);

        // смена значений
        if ($this->remoteWork) {
            $query->andWhere(['location' => null]);
        }

        // смена значений
        if ($this->withoutExecutor) {
            $query->andWhere(['executor_id' => null]);
        }

        // смена значений
        if ($this->timePeriod) {
            $query->andWhere('date_create > NOW() - INTERVAL :period DAY', [':period' => $this->timePeriod]);
        }

        // настроили запрос, добавив фильтры
        $query->andFilterWhere(['Like', 'title', $this->title]);

        return new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
    }
}
