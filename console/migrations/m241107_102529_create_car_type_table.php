<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%car_type}}`.
 */
class m241107_102529_create_car_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%car_type}}', [
            'id' => $this->primaryKey(),
            'make'=>$this->string(50)->notNull(),
            'model'=>$this->string(50)->notNull(),
            'year'=>$this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%car_type}}');
    }
}
