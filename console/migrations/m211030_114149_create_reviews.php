<?php

use yii\db\Migration;

/**
 * Class m211030_114149_create_reviews
 */
class m211030_114149_create_reviews extends Migration
{
    public function up()
    {
        $this->createTable('reviews', [
            'id' => $this->primaryKey(),
            'executor_id' => $this->integer()->notNull(),
            'customer_id' => $this->integer()->notNull(),
            'description' => $this->text()->defaultValue(null),
            'rate' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk_reviews_executor_id_users_id',
            'reviews',
            'executor_id',
            'users',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_reviews_customer_id_users_id',
            'reviews',
            'customer_id',
            'users',
            'id',
            'CASCADE'
        );
    }
    
    public function down()
    {
        $this->dropForeignKey(
            'customer_id',
            'users'
        );
        
        $this->dropForeignKey(
            'executor_id',
            'users'
        );

        $this->dropTable('reviews');
    }
}
