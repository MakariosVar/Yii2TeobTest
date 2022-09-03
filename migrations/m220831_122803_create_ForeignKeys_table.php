<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ForeignKeys}}`.
 */
class m220831_122803_create_ForeignKeys_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        //add foreign key for column 'customerID' of Estates TABLE from Customers table
        $this->addForeignKey('fkUserIdToEstateCustomerId', 'estates' , 'customerId', 'customers', 'id','RESTRICT','CASCADE');
        
        // ICreate Index of Customers First And Last Name
        $this->createIndex('idxCustomerFistName', 'customers', 'firstName');
        $this->createIndex('idxCustomerLastName', 'customers', 'lastName');
        
        
        //add foreign key for column 'EstateCustomerFirstName' of Estates TABLE from Customers table
        $this->createIndex('idxEstatesCustomerFirstName', 'estates', 'customerFirstName');
        $this->addForeignKey('fkEstateCustomerFirstNameToCustomerFirstName', 'estates' , 'customerFirstName', 'customers', 'firstName','RESTRICT','CASCADE');
       
        //add foreign key for column 'EstateCustomerLastName' of Estates TABLE from Customers table
        $this->createIndex('idxEstatesCustomerLastName', 'estates', 'customerLastName');
        $this->addForeignKey('fkEstateCustomerLastNameToCustomerLastName', 'estates' , 'customerLastName', 'customers', 'lastName','RESTRICT','CASCADE');


        //add foreign key for column 'estateType' of Estates TABLE from EstateTypes table
        $this->createIndex('idxEstateTypeName', 'estates', 'estateType');
        $this->addForeignKey('fkEstateTypeNameToEstateType', 'estates' , 'estateType', 'estateTypes', 'name','RESTRICT','CASCADE');

        //add foreign key for column 'estateType' of Estates TABLE from Locations table
        $this->createIndex('idxLocationName', 'estates', 'location');
        $this->addForeignKey('fkLocationNameToEstateLocation', 'estates' , 'location', 'locations', 'name','RESTRICT','CASCADE');
                
        //add foreign key for column 'chargeType' of EstateTypes TABLE  from ChargeTypes table
        $this->createIndex('idxChargeTypeName', 'estateTypes', 'chargeType');
        $this->addForeignKey('fkChargeTypeNameToChargeEstateType', 'estateTypes', 'chargeType', 'chargeTypes', 'name','RESTRICT','CASCADE');

        //add foreign key for column 'estateType' of Payments TABLE from Customers table
        $this->addForeignKey('fkcustomeridToPaymentCustomerID','payments','customerId','customers','id','RESTRICT','CASCADE');

        //add foreign key for column 'PaymentsCustomerFirstName' of Estates TABLE from Customers table
        $this->createIndex('idxPaymentsCustomerFirstName', 'payments', 'customerFirstName');
        $this->addForeignKey('fkPaymentsCustomerFirstNameToCustomerFirstName', 'payments' , 'customerFirstName', 'customers', 'firstName','RESTRICT','CASCADE');
         
        //add foreign key for column 'PaymentsCustomerLastName' of Estates TABLE from Customers table
        $this->createIndex('idxPaymentsCustomerLastName', 'payments', 'customerLastName');
        $this->addForeignKey('fkPaymentsCustomerLastNameToCustomerLastName', 'payments' , 'customerLastName', 'customers', 'lastName','RESTRICT','CASCADE');
  
    
        //add foreign key for column 'customerId' of debt TABLE from Customers table
        $this->addForeignKey('fkcustomeridToDebtCustomerID','debt','customerId','customers','id','RESTRICT','CASCADE');
      
 

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ForeignKeys}}');
    }
}
