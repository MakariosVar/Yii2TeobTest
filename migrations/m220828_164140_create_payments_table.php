<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payments}}`.
 */
class m220828_164140_create_payments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%payments}}', [
            'id' => $this->primaryKey(),
            'customerId' => $this->integer(11)->notNull(),
            'customerFirstName' => $this->string()->notNull(),
            'customerLastName' => $this->string()->notNull(),
            'amount' => $this->float()->notNull(),
            'receiptNumber' => $this->string()->notNull(),
            'debtType' => $this->string()->notNull(),
            'payOff' => $this->dateTime()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%payments}}');
    }
}
