<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "reviews".
 *
 * @property int $id
 * @property string|null $comment
 * @property int $rating
 * @property int $author_id
 * @property string $created_at
 * @property string|null $updated_at
 * @property int $user_id
 */
class Reviews extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reviews';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comment'], 'string'],
            [['rating', 'author_id', 'user_id'], 'required'],
            [['rating', 'author_id', 'user_id'], 'integer'],
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
            'comment' => 'Comment',
            'rating' => 'Rating',
            'author_id' => 'Author ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_id' => 'User ID',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ReviewsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ReviewsQuery(get_called_class());
    }
}
