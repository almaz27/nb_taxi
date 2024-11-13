<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%car_plate_number}}`.
 */
class m241107_110613_create_car_plate_number_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%car_plate_number}}', [
            'id' => $this->primaryKey(),
            'serial_number' => $this->string(1)->notNull(),
            'serial_number_secondary' => $this->string(2)->notNull(),
            'registration_code' => $this->integer(3)->notNull(),
            'registration__region_code' => $this->integer(2)->notNull(),
            'country'=>$this->string(5)->defaultValue('rus'),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%car_plate_number}}');
    }
}
