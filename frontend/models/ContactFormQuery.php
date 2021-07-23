<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[ContactForm]].
 *
 * @see ContactForm
 */
class ContactFormQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ContactForm[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ContactForm|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
