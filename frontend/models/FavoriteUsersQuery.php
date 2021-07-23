<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[FavoriteUsers]].
 *
 * @see FavoriteUsers
 */
class FavoriteUsersQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return FavoriteUsers[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return FavoriteUsers|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
