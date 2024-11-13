<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%car_status}}`.
 */
class m241107_104147_create_car_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%car_status}}', [
            'id' => $this->primaryKey(),
            'status_name'=>$this->string(15)->notNull()->unique(),
            'status_value'=>$this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%car_status}}');
    }
}
