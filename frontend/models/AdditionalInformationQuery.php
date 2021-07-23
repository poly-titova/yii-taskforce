<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[AdditionalInformation]].
 *
 * @see AdditionalInformation
 */
class AdditionalInformationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return AdditionalInformation[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return AdditionalInformation|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
