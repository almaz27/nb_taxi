<?php

use yii\db\Migration;

/**
 * Class m241108_205036_add_time_columns_renting_table
 */
class m241108_205036_add_time_columns_renting_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%renting}}', 'created_at', $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'));
        $this->addColumn('{{%renting}}', 'run_at', $this->timestamp()->defaultValue(null));
        $this->addColumn('{{%renting}}', 'returned_at', $this->timestamp()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%renting}}', 'created_at');
        $this->dropColumn('{{%renting}}', 'run_at');
        $this->dropColumn('{{%renting}}', 'returned_at');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241108_205036_add_time_columns_renting_table cannot be reverted.\n";

        return false;
    }
    */
}
