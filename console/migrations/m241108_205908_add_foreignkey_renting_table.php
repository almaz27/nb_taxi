<?php

use yii\db\Migration;

/**
 * Class m241108_205908_add_foreignkey_renting_table
 */
class m241108_205908_add_foreignkey_renting_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('idx_statusValue', 'renting', 'statusValue');
        $this->createIndex('idx-renting_status_value', 'renting_status', 'renting_status_value');
        $this->addForeignKey('fk_renting_status', 'renting', 'statusValue', 'renting_status', 'renting_status_value', 'NO ACTION', 'NO ACTION');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx_statusValue', 'renting');
        $this->dropIndex('idx-renting_status_value', 'renting_status');
        $this->dropForeignKey('fk_renting_status', 'renting');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241108_205908_add_foreignkey_renting_table cannot be reverted.\n";

        return false;
    }
    */
}
