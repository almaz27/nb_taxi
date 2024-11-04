<?php

use yii\db\Migration;

/**
 * Class m241101_150214_alter_name_of_columns_user_table
 */
class m241101_150214_alter_name_of_columns_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('{{%user}}', 'status', 'status_id');
        $this->addColumn('{{%user}}', 'role_id', $this->integer()->defaultValue(10));
        $this->alterColumn('{{%user}}', 'status_id', $this->integer()->defaultValue(10));
        $this->addColumn('{{%user}}', 'user_type_id', $this->integer()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'status_id');
        $this->dropColumn('{{%user}}', 'role_id');
        $this->dropColumn('{{%user}}', 'user_type_id');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241101_150214_alter_name_of_columns_user_table cannot be reverted.\n";

        return false;
    }
    */
}
