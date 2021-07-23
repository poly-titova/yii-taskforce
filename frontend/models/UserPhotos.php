<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user_photos".
 *
 * @property int $id
 * @property int $user_id
 * @property int $file_id
 */
class UserPhotos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_photos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'file_id'], 'required'],
            [['user_id', 'file_id'], 'integer'],
            [['user_id', 'file_id'], 'unique', 'targetAttribute' => ['user_id', 'file_id']],
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
            'file_id' => 'File ID',
        ];
    }

    /**
     * {@inheritdoc}
     * @return UserPhotosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserPhotosQuery(get_called_class());
    }
}
