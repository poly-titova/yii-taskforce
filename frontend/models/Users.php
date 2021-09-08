<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $dt_add
 * @property string $last_visit
 * @property string|null $description
 * @property string $bd
 * @property string|null $address
 * @property string|null $phone
 * @property string|null $skype
 * @property string $role
 * @property int|null $rate
 * @property int|null $favorite
 *
 * @property Opinions[] $opinions
 * @property Replies[] $replies
 * @property Reviews[] $reviews
 * @property Reviews[] $reviews0
 * @property Tasks[] $tasks
 * @property Tasks[] $tasks0
 * @property UsersCategories[] $usersCategories
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
            [['name', 'email', 'password'], 'required'],
            [['dt_add', 'last_visit', 'bd'], 'safe'],
            [['rate', 'favorite'], 'integer'],
            [['name', 'email', 'password'], 'string', 'max' => 45],
            [['description', 'address'], 'string', 'max' => 255],
            [['phone', 'role'], 'string', 'max' => 15],
            [['skype'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'dt_add' => 'Dt Add',
            'last_visit' => 'Last Visit',
            'description' => 'Description',
            'bd' => 'Bd',
            'address' => 'Address',
            'phone' => 'Phone',
            'skype' => 'Skype',
            'role' => 'Role',
            'rate' => 'Rate',
            'favorite' => 'Favorite',
        ];
    }

    /**
     * Gets query for [[Opinions]].
     *
     * @return \yii\db\ActiveQuery|OpinionsQuery
     */
    public function getOpinions()
    {
        return $this->hasMany(Opinions::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Replies]].
     *
     * @return \yii\db\ActiveQuery|RepliesQuery
     */
    public function getReplies()
    {
        return $this->hasMany(Replies::className(), ['executor_id' => 'id']);
    }

    /**
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery|ReviewsQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Reviews::className(), ['executor_id' => 'id']);
    }

    /**
     * Gets query for [[Reviews0]].
     *
     * @return \yii\db\ActiveQuery|ReviewsQuery
     */
    public function getReviews0()
    {
        return $this->hasMany(Reviews::className(), ['customer_id' => 'id']);
    }

    /**
     * Gets query for [[Tasks]].
     *
     * @return \yii\db\ActiveQuery|TasksQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Tasks::className(), ['executor_id' => 'id']);
    }

    /**
     * Gets query for [[Tasks0]].
     *
     * @return \yii\db\ActiveQuery|TasksQuery
     */
    public function getTasks0()
    {
        return $this->hasMany(Tasks::className(), ['customer_id' => 'id']);
    }

    /**
     * Gets query for [[UsersCategories]].
     *
     * @return \yii\db\ActiveQuery|UsersCategoriesQuery
     */
    public function getUsersCategories()
    {
        return $this->hasMany(UsersCategories::className(), ['user_id' => 'id']);
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
