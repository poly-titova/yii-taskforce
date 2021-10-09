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
    }

    public function down()
    {
        $this->dropTable('opinions');
    }
}
