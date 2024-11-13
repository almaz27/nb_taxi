<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%renting_status}}`.
 */
class m241108_204040_create_renting_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%renting_status}}', [
            'id' => $this->primaryKey(),
            'renting_status_value' => $this->integer()->notNull()->defaultValue(0),
            'renting_status_name' => $this->string()->notNull()->defaultValue('PENDING'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%renting_status}}');
    }
}
