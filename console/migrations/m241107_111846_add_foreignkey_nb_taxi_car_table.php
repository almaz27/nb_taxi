<?php

use yii\db\Migration;

/**
 * Class m241107_111846_add_foreignkey_nb_taxi_car_table
 */
class m241107_111846_add_foreignkey_nb_taxi_car_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('idx-plate', '{{%nb_taxi_car}}', 'plateNumberId');
        $this->addForeignKey(
            'fk-plate',
            '{{%nb_taxi_car}}','plateNumberId','{{%car_plate_number}}','id');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx-plate', '{{%nb_taxi_car}}');
        $this->dropForeignKey('fk-plate', '{{%nb_taxi_car}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241107_111846_add_foreignkey_nb_taxi_car_table cannot be reverted.\n";

        return false;
    }
    */
}
