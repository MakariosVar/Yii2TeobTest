<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%debt}}`.
 */
class m220831_122005_create_debt_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%debt}}', [
            'id' => $this->primaryKey(),
            'customerId' => $this->integer(11)->notNull(),
            'amount' => $this->float()->notNull(),
            'debtType' => $this->string()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%debt}}');
    }
}
