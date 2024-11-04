<?php

use yii\db\Migration;

/**
 * Class m241101_202200_init_status_table
 */
class m241101_202200_init_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%status}}', [
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
        $this->dropTable('{{%status}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241101_202200_init_status_table cannot be reverted.\n";

        return false;
    }
    */
}
