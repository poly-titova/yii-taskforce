<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class UsersFilter extends Model
{
    public $category;
    public $available;
    public $online;
    public $isFeedback;
    public $favorites;
    public $name;

    // правила, доступные для поиска
    public function rules()
    {
        return [
            [['category', 'available', 'online', 'isFeedback', 'favorites', 'name'], 'safe'],
            ['available', 'number'],
            ['online', 'number'],
            ['isFeedback', 'number'],
            ['favorites', 'number'],
            ['name', 'string'],
        ];
    }

    // метки атрибутов
    public function attributeLabels()
    {
        return [
            'category' => 'Категории',
            'available' => 'Сейчас свободен',
            'online' => 'Сейчас онлайн',
            'isFeedback' => 'Есть отзывы',
            'favorites' => 'В избранном',
            'name' => 'Поиск по имени'
        ];
    }

    // получение данных
    public function getDataProvider()
    {
        // поиск пользователей
        $query = Users::find()
            ->where(['role' => 'executor'])
            ->orderBy('users.id DESC');

        // смена значений
        if ($this->category) {
            $query
                ->leftJoin('user_category', 'user_category.user_id = users.id')
                ->andWhere(['IN', 'user_category.category_id', $this->category]);
        }

        // смена значений
        if ($this->available) {
            $query
                ->leftJoin('task', 'task.executor_id = users.id AND task.status =\'in_work\'')
                ->groupBy('users.id')
                ->andHaving(['COUNT(task.id)' => '0']);
        }

        // смена значений
        if ($this->online) {
            $query->andWhere('last_visit > NOW() - INTERVAL 30 MINUTE');
        }

        // смена значений
        if ($this->isFeedback) {
            $query
                ->leftJoin('response', 'response.user_id = users.id')
                ->groupBy('users.id')
                ->andHaving('COUNT(response.id) > 0');
        }

        // смена значений
        if ($this->online) {
            $query->andWhere('last_visit > NOW() - INTERVAL 30 MINUTE');
        }

        // смена значений
        if ($this->favorites) {
            $currentUserId = 41;
            $query
                ->leftJoin('favourites', 'favourites.user_id = :user', [':user' => $currentUserId])
                ->andWhere('users.id = favourites.favourite_id');
        }

        // настроили запрос, добавив фильтры
        $query->andFilterWhere(['Like', 'name', $this->name]);

        return new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
    }
}
