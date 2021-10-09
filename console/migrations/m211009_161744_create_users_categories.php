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
            'user_id' => $this->primaryKey(),
            'category_id' => $this->primaryKey(),
        ]);
    }

    public function down()
    {
        $this->dropTable('users_categories');
    }
}
