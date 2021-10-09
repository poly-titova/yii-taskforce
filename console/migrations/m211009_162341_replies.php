<?php

use yii\db\Migration;

/**
 * Class m211009_162341_replies
 */
class m211009_162341_replies extends Migration
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
    }

    public function down()
    {
        $this->dropTable('replies');
    }
}
