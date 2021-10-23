<?php

use yii\db\Migration;

/**
 * Class m211009_172802_opinions
 */
class m211009_172802_opinions extends Migration
{
    public function up()
    {
        $this->createTable('opinions', [
            'id' => $this->primaryKey(),
            'dt_add' => $this->integer()->notNull(),
            'rate' => $this->integer()->defaultValue(null),
            'description' => $this->text()->defaultValue(null),
            'task_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk_task_id_tasks_id',
            'opinions',
            'task_id',
            'tasks',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_user_id_users_id',
            'opinions',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            'user_id',
            'users'
        );

        $this->dropForeignKey(
            'task_id',
            'tasks'
        );

        $this->dropTable('opinions');
    }
}
