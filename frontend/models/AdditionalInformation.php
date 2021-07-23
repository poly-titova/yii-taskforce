<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "additional_information".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $biografy
 * @property int|null $is_public
 */
class AdditionalInformation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'additional_information';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'is_public'], 'integer'],
            [['biografy'], 'string'],
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
            'biografy' => 'Biografy',
            'is_public' => 'Is Public',
        ];
    }

    /**
     * {@inheritdoc}
     * @return AdditionalInformationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AdditionalInformationQuery(get_called_class());
    }
}
