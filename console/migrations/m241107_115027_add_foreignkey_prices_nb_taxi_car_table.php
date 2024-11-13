<?php

use yii\db\Migration;

/**
 * Class m241107_115027_add_foreignkey_prices_nb_taxi_car_table
 */
class m241107_115027_add_foreignkey_prices_nb_taxi_car_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('idx-car','{{%car_rent_bisness}}','pricePerDay');
        $this->createIndex('idx-price','{{%nb_taxi_car}}','pricePerDay');
        $this->addForeignKey('fk-price',
            '{{%nb_taxi_car}}',
            'pricePerDay','{{%car_rent_bisness}}',
            'pricePerDay','NO ACTION','NO ACTION');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx-car','{{%car_rent_bisness}}');
        $this->dropIndex('idx-price','{{%nb_taxi_car}}');
        $this->dropForeignKey('fk-price','{{%nb_taxi_car}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241107_115027_add_foreignkey_prices_nb_taxi_car_table cannot be reverted.\n";

        return false;
    }
    */
}
