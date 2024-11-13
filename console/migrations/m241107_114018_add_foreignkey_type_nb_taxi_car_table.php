<?php

use yii\db\Migration;

/**
 * Class m241107_114018_add_foreignkey_type_nb_taxi_car_table
 */
class m241107_114018_add_foreignkey_type_nb_taxi_car_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('idx-type','{{%nb_taxi_car}}','carTypeId');
        $this->addForeignKey('fk-type',
            '{{%nb_taxi_car}}',
            'carTypeId','{{%car_type}}','id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropIndex('idx-type','{{%nb_taxi_car}}');
        $this->dropForeignKey('fk-type','{{%nb_taxi_car}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241107_114018_add_foreignkey_type_nb_taxi_car_table cannot be reverted.\n";

        return false;
    }
    */
}
