<?php

use yii\db\Migration;

/**
 * Class m241107_112343_add_foreignkey_status_nb_taxi_car_table
 */
class m241107_112343_add_foreignkey_status_nb_taxi_car_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
//        $this->createIndex('idx-status', '{{%nb_taxi_car}}', 'statusValue');
        $this->addForeignKey('fk-status',
            '{{%nb_taxi_car}}', 'statusValue', '{{%car_status}}',
            'status_value',
            'NO ACTION', 'NO ACTION');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-status', '{{%nb_taxi_car}}');
//        $this->dropIndex('idx-status', '{{%nb_taxi_car}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241107_112343_add_foreignkey_status_nb_taxi_car_table cannot be reverted.\n";

        return false;
    }
    */
}
