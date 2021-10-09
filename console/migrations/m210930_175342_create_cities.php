<?php

use yii\db\Migration;

/**
 * Class m210930_175342_create_cities
 */
class m210930_175342_create_cities extends Migration
{
    public function up()
    {
        $this->createTable('cities', [
            'id' => $this->primaryKey(),
            'city' => $this->string()->notNull(),
            'lat' => $this->text()->defaultValue(null),
            'long' => $this->text()->defaultValue(null),
        ]);
    }

    public function down()
    {
        $this->dropTable('cities');
    }
}
