<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%nb_taxi_car}}`.
 */
class m241107_105617_create_nb_taxi_car_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%nb_taxi_car}}', [
            'id' => $this->primaryKey(),
            'statusValue'=>$this->integer()->notNull()->defaultValue(10),
            'classValue'=>$this->integer()->notNull()->defaultValue(10),
            'carTypeId'=>$this->integer()->notNull(),
            'pricePerDay'=>$this->integer()->notNull()->defaultValue(3350),
            'plateNumberId'=>$this->integer()->notNull(),
            'mileage'=>$this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%nb_taxi_car}}');
    }
}
