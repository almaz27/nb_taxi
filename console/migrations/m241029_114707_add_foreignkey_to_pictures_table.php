<?php

use yii\db\Migration;

/**
 * Class m241029_114707_add_foreignkey_to_pictures_table
 */
class m241029_114707_add_foreignkey_to_pictures_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('index_car_id', '{{%pictures}}', 'car_id');
        $this->addForeignKey('fkey_car_id','{{%pictures}}','car_id','car','id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fkey_car_id','{{%pictures}}');
        $this->dropIndex('index_car_id','{{%pictures}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241029_114707_add_foreignkey_to_pictures_table cannot be reverted.\n";

        return false;
    }
    */
}
