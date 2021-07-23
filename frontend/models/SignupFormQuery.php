<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[SignupForm]].
 *
 * @see SignupForm
 */
class SignupFormQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return SignupForm[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return SignupForm|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
