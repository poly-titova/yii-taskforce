<?php

use yii\db\Migration;

/**
 * Class m211009_145208_create_categories
 */
class m211009_145208_create_categories extends Migration
{
    public function up()
    {
        $this->createTable('categories', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'icon' => $this->string()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('categories');
    }
}
