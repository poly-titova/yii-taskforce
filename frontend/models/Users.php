<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string|null $last_name
 * @property string $first_name
 * @property string $email
 * @property string $password
 * @property int|null $age
 * @property string|null $last_activity_at
 * @property string $created_at
 * @property string|null $updated_at
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'email', 'password'], 'required'],
            [['age'], 'integer'],
            [['last_activity_at', 'created_at', 'updated_at'], 'safe'],
            [['last_name', 'first_name', 'email'], 'string', 'max' => 45],
            [['password'], 'string', 'max' => 255],
            [['email', 'password'], 'unique', 'targetAttribute' => ['email', 'password']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'last_name' => 'Last Name',
            'first_name' => 'First Name',
            'email' => 'Email',
            'password' => 'Password',
            'age' => 'Age',
            'last_activity_at' => 'Last Activity At',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return UsersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsersQuery(get_called_class());
    }
}
