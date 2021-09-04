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
 * @property int|null $reviews
 * @property int|null $tasks
 * @property string|null $description
 * @property int|null $rate
 * @property string|null $spec
 * @property string $role
 *
 * @property Categories[] $categories
 * @property Opinions[] $opinions
 * @property Profiles[] $profiles
 * @property Replies[] $replies
 * @property UserSpec[] $userSpecs
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
            [['dt_add', 'last_visit'], 'safe'],
            [['reviews', 'tasks', 'rate'], 'integer'],
            [['name', 'email', 'password', 'spec'], 'string', 'max' => 45],
            [['description'], 'string', 'max' => 255],
            [['role'], 'string', 'max' => 15],
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
            'reviews' => 'Reviews',
            'tasks' => 'Tasks',
            'description' => 'Description',
            'rate' => 'Rate',
            'spec' => 'Spec',
            'role' => 'Role',
        ];
    }

    /**
     * Gets query for [[Categories]].
     *
     * @return \yii\db\ActiveQuery|CategoriesQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Categories::className(), ['id' => 'category_id'])->viaTable('user_spec', ['user_id' => 'id']);
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
     * Gets query for [[Profiles]].
     *
     * @return \yii\db\ActiveQuery|ProfilesQuery
     */
    public function getProfiles()
    {
        return $this->hasMany(Profiles::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Replies]].
     *
     * @return \yii\db\ActiveQuery|RepliesQuery
     */
    public function getReplies()
    {
        return $this->hasMany(Replies::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[UserSpecs]].
     *
     * @return \yii\db\ActiveQuery|UserSpecQuery
     */
    public function getUserSpecs()
    {
        return $this->hasMany(UserSpec::className(), ['user_id' => 'id']);
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
