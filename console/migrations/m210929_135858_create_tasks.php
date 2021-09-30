<?php

use yii\db\Migration;

/**
 * Class m210929_135858_create_tasks
 */
class m210929_135858_create_tasks extends Migration
{
    public function up()
    {
        $this->createTable('tasks', [
            'id' => $this->primaryKey(),
            'executor_id' => $this->integer()->notNull(),
            'customer_id' => $this->integer()->notNull(),
            'dt_add' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
            'description' => $this->text()->defaultValue(null),
            'status' => $this->string()->defaultValue('new')->notNull(),
            'expire' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'address' => $this->text()->defaultValue(null),
            'budget' => $this->integer()->notNull(),
            'lat' => $this->text()->defaultValue(null),
            'long' => $this->text()->defaultValue(null),
            'opinions' => $this->integer()->defaultValue(null),
        ]);
    }

    public function down()
    {
        $this->dropTable('tasks');
    }
}
