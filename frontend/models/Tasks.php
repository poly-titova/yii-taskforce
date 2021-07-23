<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $category_id
 * @property string|null $latitude
 * @property string|null $longitude
 * @property int|null $price
 * @property string|null $task_term_at
 * @property int $client_id
 * @property int|null $executor_id
 * @property int $status
 * @property string $created_at
 * @property string|null $updated_at
 * @property int $city_id
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'category_id', 'client_id', 'city_id'], 'required'],
            [['description'], 'string'],
            [['category_id', 'price', 'client_id', 'executor_id', 'status', 'city_id'], 'integer'],
            [['task_term_at', 'created_at', 'updated_at'], 'safe'],
            [['title', 'latitude', 'longitude'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'category_id' => 'Category ID',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'price' => 'Price',
            'task_term_at' => 'Task Term At',
            'client_id' => 'Client ID',
            'executor_id' => 'Executor ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'city_id' => 'City ID',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TasksQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TasksQuery(get_called_class());
    }
}
