<?php

use yii\db\Migration;

/**
 * Class m241101_201910_init_role_table
 */
class m241101_201910_init_role_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%role}}', [
            'id' => $this->primaryKey(),
            'role_name' => $this->string(45)->notNull(),
            'role_value' => $this->integer(11)->notNull(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%role}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241101_201910_init_role_table cannot be reverted.\n";

        return false;
    }
    */
}
