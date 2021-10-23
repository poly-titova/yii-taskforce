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

        $this->addForeignKey(
            'fk_executor_id_users_id',
            'tasks',
            'executor_id',
            'users',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_customer_id_users_id',
            'tasks',
            'customer_id',
            'users',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_category_id_categories_id',
            'tasks',
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
            'customer_id',
            'users'
        );
        
        $this->dropForeignKey(
            'executor_id',
            'users'
        );

        $this->dropTable('tasks');
    }
}
