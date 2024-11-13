<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%owning}}`.
 */
class m241113_172424_create_owning_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%owning}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'car_id' => $this->integer()->notNull(),
        ]);
        $this->createIndex('idx-owning-owner_id', '{{%owning}}', 'owner_id');
        $this->createIndex('idx-owning-car_id', '{{%owning}}', 'car_id');
        $this->addForeignKey('fk-owner', '{{%owning}}', 'owner_id', 'user', 'id', 'NO ACTION', 'NO ACTION');
        $this->addForeignKey('fk-car','{{%owning}}', 'car_id', 'nb_taxi_car', 'id', 'NO ACTION', 'NO ACTION');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-owner', '{{%owning}}');
        $this->dropForeignKey('fk-car', '{{%owning}}');
        $this->dropIndex('idx-owning-owner_id', '{{%owning}}');
        $this->dropIndex('idx-owning-car_id', '{{%owning}}');
        $this->dropTable('{{%owning}}');
    }
}
