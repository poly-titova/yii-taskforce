<?php

use yii\db\Migration;

/**
 * Class m211009_152327_create_users
 */
class m211009_152327_create_users extends Migration
{
    public function up()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'password' => $this->string()->notNull(),
            'dt_add' => $this->integer()->notNull(),
            'last_visit' => $this->integer()->notNull(),
            'description' => $this->text()->defaultValue(null),
            'bd' => $this->integer()->notNull(),
            'address' => $this->text()->defaultValue(null),
            'phone' => $this->string()->defaultValue(null),
            'skype' => $this->string()->defaultValue(null),
            'role' => $this->string()->defaultValue('executor')->notNull(),
            'rate' => $this->integer()->defaultValue(null),
            'favorite' => $this->integer()->defaultValue(0),
        ]);
    }
    
    public function down()
    {
        $this->dropTable('users');
    }
}
