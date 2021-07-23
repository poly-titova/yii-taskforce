<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[VerifyEmailForm]].
 *
 * @see VerifyEmailForm
 */
class VerifyEmailFormQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return VerifyEmailForm[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return VerifyEmailForm|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
