<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payments".
 *
 * @property int $id
 * @property int $customerId
 * @property string $customerFirstName
 * @property string $customerLastName
 * @property float $amount
 * @property int $receiptNumber
 * @property string $debtType
 * @property string|null $payOff
 *
 * @property Customers $customer
 */
class Payments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customerId', 'amount', 'receiptNumber', 'debtType'], 'required'],
            [['customerId', 'receiptNumber'], 'integer'],
            [['amount'], 'number'],
            [['payOff'], 'safe'],
            [['customerFirstName', 'customerLastName', 'debtType'], 'string', 'max' => 255],
            [['customerId'], 'exist', 'skipOnError' => true, 'targetClass' => Customers::className(), 'targetAttribute' => ['customerId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customerId' => 'ID πελάτη',
            'customerFirstName' => 'Όνομα πελάτη',
            'customerLastName' => 'Επίθετο πελάτη',
            'amount' => 'Ποσό',
            'receiptNumber' => 'Αριθμός απόδειξης',
            'debtType' => 'Τύπος Υπολοίπου',
            'payOff' => 'Ημερομηνία Πληρωμής',
        ];
    }

    /**
     * Gets query for [[Customer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customers::className(), ['id' => 'customerId']);
    }

    /**
     *
     *@return Customers ID & name
    */
    public static function getCustomers()
    {
        foreach(Customers::find()->all() as $Customer)
        {
            $CustomersArray[$Customer->id] = $Customer->firstName.' '.$Customer->lastName.' (ΑΦΜ: '.$Customer->VAT.') Χρέος: '.$Customer->TotalDebt;
        }
        if(!isset($CustomersArray))
        {
            return ['' => ''];
        }
        else
        {
            return $CustomersArray;
        }
    }

    /**
     *
     *@return Debt Type name
    */
    public static function getDebtType()
    {
        
        return ['Τρέχουσα Χρήση' =>'Τρέχουσα Χρήση','Παρελθούσα Χρήση' => 'Παρελθούσα Χρήση'];
      
    }
    
}
