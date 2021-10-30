<?php

use yii\db\Migration;

/**
 * Class m211030_113807_create_replies
 */
class m211030_113807_create_replies extends Migration
{
    public function up()
    {
        $this->createTable('replies', [
            'id' => $this->primaryKey(),
            'executor_id' => $this->integer()->notNull(),
            'description' => $this->text()->defaultValue(null),
            'task_id' => $this->integer()->notNull(),
            'dt_add' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk_replies_executor_id_users_id',
            'replies',
            'executor_id',
            'users',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_replies_task_id_tasks_id',
            'replies',
            'task_id',
            'tasks',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            'task_id',
            'tasks'
        );

        $this->dropForeignKey(
            'executor_id',
            'users'
        );

        $this->dropTable('replies');
    }
}
