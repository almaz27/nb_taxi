<?php

use yii\db\Migration;

/**
 * Class m241107_114336_add_foreignkey_class_nb_taxi_car_table
 */
class m241107_114336_add_foreignkey_class_nb_taxi_car_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
//        $this->createIndex('idx-class', '{{%nb_taxi_car}}', 'classValue');
//        $this->createIndex('idx-car','{{%car_class}}','class_value');
        $this->addForeignKey('fk-class',
            '{{%nb_taxi_car}}',
            'classValue',
            '{{%car_class}}',
            'class_value',
            'NO ACTION',
            'NO ACTION');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//        $this->dropIndex('idx-class', '{{%nb_taxi_car}}');
//        $this->dropIndex('idx-car', '{{%nb_taxi_car}}');
        $this->dropForeignKey('fk-class', '{{%nb_taxi_car}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241107_114336_add_foreignkey_class_nb_taxi_car_table cannot be reverted.\n";

        return false;
    }
    */
}
