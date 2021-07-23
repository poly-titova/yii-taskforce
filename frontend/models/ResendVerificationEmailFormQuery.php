<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[ResendVerificationEmailForm]].
 *
 * @see ResendVerificationEmailForm
 */
class ResendVerificationEmailFormQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ResendVerificationEmailForm[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ResendVerificationEmailForm|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
