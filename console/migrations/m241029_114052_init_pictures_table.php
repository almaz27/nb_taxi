<?php

use yii\db\Migration;

/**
 * Class m241029_114052_init_pictures_table
 */
class m241029_114052_init_pictures_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pictures}}', [
            'id' => $this->primaryKey(),
            'car_id' => $this->integer()->notNull(),
            'image' => $this->string()->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pictures}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241029_114052_init_pictures_table cannot be reverted.\n";

        return false;
    }
    */
}
