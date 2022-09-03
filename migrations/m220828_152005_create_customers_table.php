<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%customers}}`.
 */
class m220828_152005_create_customers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%customers}}', [
            'id' => $this->primaryKey(),
            'firstName' => $this->string()->notNull(),
            'lastName' => $this->string()->notNull(),
            'VAT' => $this->integer(9)->notNull(),
            'taxAuthority' => $this->string()->notNull(),
            'address' => $this->string()->notNull(),
            'phone' => $this->string()->notNull(),
            'policeID' => $this->string()->notNull(),
            'protocol' => $this->text()->notNull(),
            'TotalDebt'=> $this->float()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%customers}}');
    }
}
