<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%chargeTypes}}`.
 */
class m220828_163620_create_chargeTypes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%chargeTypes}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'status' => $this->string()->notNull(),
            'amount' => $this->float()->notNull(),
            'notes' => $this->text(),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%chargeTypes}}');
    }
}
