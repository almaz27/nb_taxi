<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%car_class}}`.
 */
class m241107_101841_create_car_class_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%car_class}}', [
            'id' => $this->primaryKey(),
            'class_name' => $this->string()->notNull()->defaultValue('econom'),
            'class_value' => $this->integer()->notNull()->defaultValue(10),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%car_class}}');
    }
}
