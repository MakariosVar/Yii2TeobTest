<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%estateTypes}}`.
 */
class m220828_163657_create_estateTypes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%estateTypes}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'notes' => $this->text(),
            'status' => $this->string()->notNull(),
            'chargeType' => $this->string()->notNull(),
        ]);
        
 }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%estateTypes}}');
    }
}
