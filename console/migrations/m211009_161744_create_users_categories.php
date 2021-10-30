<?php

use yii\db\Migration;

/**
 * Class m211009_161744_create_users_categories
 */
class m211009_161744_create_users_categories extends Migration
{
    public function up()
    {
        $this->createTable('users_categories', [
            'user_id' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk_users_categories_user_id_users_id',
            'users_categories',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_users_categories_category_id_categories_id',
            'users_categories',
            'category_id',
            'categories',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            'category_id',
            'categories'
        );

        $this->dropForeignKey(
            'users_id',
            'users'
        );

        $this->dropTable('users_categories');
    }
}
