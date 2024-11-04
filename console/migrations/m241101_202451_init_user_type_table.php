<?php

use yii\db\Migration;

/**
 * Class m241101_202451_init_user_type_table
 */
class m241101_202451_init_user_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_type}}', [
            'id' => $this->primaryKey(6),
            'role_name' => $this->string(45)->notNull(),
            'role_value' => $this->smallInteger(6)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_type}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241101_202451_init_user_type_table cannot be reverted.\n";

        return false;
    }
    */
}
