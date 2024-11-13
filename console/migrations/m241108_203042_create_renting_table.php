<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%renting}}`.
 */
class m241108_203042_create_renting_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%renting}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'car_id' => $this->integer()->notNull(),
            'contract_time' => $this->integer()->defaultValue(null),
            'statusValue'=>$this->integer()->defaultValue(0),
        ]);
        $this->createIndex('id-user_id', '{{%renting}}', 'user_id');
        $this->createIndex('id-car_id', '{{%renting}}', 'car_id');
        $this->addForeignKey('fk-renting-user_id', '{{%renting}}', 'user_id', '{{%user}}', 'id');
        $this->addForeignKey('fk-renting-car_id', '{{%renting}}', 'car_id', '{{%nb_taxi_car}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%renting}}');
    }
}
