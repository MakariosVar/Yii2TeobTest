<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%estates}}`.
 */
class m220828_155955_create_estates_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%estates}}', [
            'id' => $this->primaryKey(),
            'customerId' => $this->integer(11)->notNull(),
            'customerFirstName' => $this->string()->notNull(),
            'customerLastName' => $this->string()->notNull(),
            'estateType' => $this->string()->notNull(),
            'size' => $this->float()->notNull(),
            'location'=> $this->string()->notNull(),
            'notes' => $this->text()

        ]);
       
        }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%estates}}');
    }
}
