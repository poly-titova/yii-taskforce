<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "files".
 *
 * @property int $id
 * @property int $task_id
 * @property string $title
 * @property string $path
 * @property int $user_id
 * @property string $created_at
 * @property string|null $updated_at
 */
class Files extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'files';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['task_id', 'title', 'path', 'user_id'], 'required'],
            [['task_id', 'user_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'path'], 'string', 'max' => 255],
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
            'title' => 'Title',
            'path' => 'Path',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return FilesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FilesQuery(get_called_class());
    }
}
