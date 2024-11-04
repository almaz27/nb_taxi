<?php

use yii\db\Migration;

/**
 * Class m241101_202622_init_gender_table
 */
class m241101_202622_init_gender_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%gender}}', [
            'id' => $this->primaryKey()->unsigned(),
            'gender_name' => $this->string(45)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%gender}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241101_202622_init_gender_table cannot be reverted.\n";

        return false;
    }
    */
}
