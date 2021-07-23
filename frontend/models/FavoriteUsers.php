<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "favorite_users".
 *
 * @property int $id
 * @property int $user_id
 * @property int $favoririte_user_id
 * @property string $created_at
 * @property string|null $updated_at
 */
class FavoriteUsers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'favorite_users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'favoririte_user_id'], 'required'],
            [['user_id', 'favoririte_user_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['favoririte_user_id', 'user_id'], 'unique', 'targetAttribute' => ['favoririte_user_id', 'user_id']],
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
            'favoririte_user_id' => 'Favoririte User ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return FavoriteUsersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FavoriteUsersQuery(get_called_class());
    }
}
