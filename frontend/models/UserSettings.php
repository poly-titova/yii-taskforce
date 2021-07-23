<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user_settings".
 *
 * @property int $id
 * @property int $user_id
 * @property int $new_response
 * @property int $new_messages
 * @property int $cancel_task
 * @property int $task_start
 * @property int $task_completion
 * @property string $created_at
 * @property string|null $updated_at
 */
class UserSettings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'new_response', 'new_messages', 'cancel_task', 'task_start', 'task_completion'], 'integer'],
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
            'user_id' => 'User ID',
            'new_response' => 'New Response',
            'new_messages' => 'New Messages',
            'cancel_task' => 'Cancel Task',
            'task_start' => 'Task Start',
            'task_completion' => 'Task Completion',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return UserSettingsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserSettingsQuery(get_called_class());
    }
}
