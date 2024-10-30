<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%car}}`.
 */
class m241024_204356_create_car_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%car}}', [
            'id' => $this->primaryKey(),
            'year' => $this->integer(4)->notNull()->defaultValue(0),
            'make' => $this->string()->notNull()->defaultValue(''),
            'model' => $this->string()->notNull()->defaultValue(''),
            'pricePerDay' => $this->integer()->notNull()->defaultValue(0),
            'workday' => $this->integer()->notNull()->defaultValue(7),
            'mileage' => $this->integer()->notNull()->defaultValue(0),
            'plateNumber' => $this->string()->notNull()->defaultValue(''),
        ]);
        $this->addColumn('{{%car}}', 'class', 'ENUM("econom","comfort","comfort +")');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%car}}');
    }
}
