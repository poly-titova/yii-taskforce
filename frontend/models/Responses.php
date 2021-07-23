<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "responses".
 *
 * @property int $id
 * @property int $task_id
 * @property int $user_id
 * @property int|null $price
 * @property string|null $comment
 * @property string $created_at
 * @property string|null $updated_at
 */
class Responses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'responses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['task_id', 'user_id'], 'required'],
            [['task_id', 'user_id', 'price'], 'integer'],
            [['comment'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'task_id' => 'Task ID',
            'user_id' => 'User ID',
            'price' => 'Price',
            'comment' => 'Comment',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ResponsesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ResponsesQuery(get_called_class());
    }
}
