<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%car_rent_bisness}}`.
 */
class m241107_103218_create_car_rent_bisness_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%car_rent_bisness}}', [
            'id' => $this->primaryKey(),
            'pricePerDay'=>$this->integer()->notNull(),
            'workDays'=>$this->integer()->notNull()->defaultValue(7),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%car_rent_bisness}}');
    }
}
