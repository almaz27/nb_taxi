<?php

use yii\db\Migration;

/**
 * Class m241029_194351_init_rent_car
 */
class m241029_194351_init_rent_car extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('rent_car', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'car_id' => $this->integer()->notNull(),
            'rent_period' => $this->dateTime()->defaultValue(null),
        ]);
        $this->addForeignKey('fk_rent_car_user', 'rent_car', 'user_id', 'user', 'id');
        $this->addForeignKey('fk_rent_car_car', 'rent_car', 'car_id', 'car', 'id');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_rent_car_user', 'rent_car');
        $this->dropForeignKey('fk_rent_car_car', 'rent_car');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241029_194351_init_rent_car cannot be reverted.\n";

        return false;
    }
    */
}
