<?php

use yii\db\Migration;

/**
 * Class m241101_202807_init_profile_table
 */
class m241101_202807_init_profile_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%profile}}', [
            'id' => $this->primaryKey()->unsigned(),
            'user_id' => $this->integer(11)->notNull(),
            'first_name' => $this->text(),
            'last_name' => $this->text(),
            'birthday' => $this->date(),
            'gender_id' => $this->integer()->notNull()->unsigned(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);

        $this->addForeignKey('fk-user_id', 'profile', 'user_id', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk-gender_id', 'profile', 'gender_id', 'gender', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-user_id', 'profile');
        $this->dropForeignKey('fk-gender_id', 'profile');
        $this->dropTable('{{%profile}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241101_202807_init_profile_table cannot be reverted.\n";

        return false;
    }
    */
}
