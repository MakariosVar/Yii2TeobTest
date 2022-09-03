<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property int $id
 * @property string $firstName
 * @property string $lastName
 * @property int $VAT
 * @property string $taxAuthority
 * @property string $address
 * @property string $phone
 * @property string $policeID
 * @property string $protocol
 * @property float|null $TotalDebt
 *
 * @property Debt[] $debts
 * @property Estates[] $estates
 * @property Payments[] $payments
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstName', 'lastName', 'VAT', 'taxAuthority', 'address', 'phone', 'policeID', 'protocol'], 'required'],
            [['VAT'], 'integer'],
            [['protocol'], 'string'],
            [['TotalDebt'], 'number'],
            [['firstName', 'lastName', 'taxAuthority', 'address', 'phone', 'policeID'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstName' => 'Όνομα',
            'lastName' => 'Επίθετο',
            'VAT' => 'ΑΦΜ',
            'taxAuthority' => 'ΔΟΥ',
            'address' => 'Διεύθυνση',
            'phone' => 'Τηλέφωνο',
            'policeID' => 'Α.Τ.',
            'protocol' => 'Αριθμος πρωτοκόλλου',
            'TotalDebt' => 'Συνολικό χρέος(€)',
        ];
    }

    /**
     * Gets query for [[Debts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDebts()
    {
        return $this->hasMany(Debt::className(), ['customerId' => 'id']);
    }

    /**
     * Gets query for [[Estates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstates()
    {
        return $this->hasMany(Estates::className(), ['customerId' => 'id']);
    }

    /**
     * Gets query for [[Payments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payments::className(), ['customerId' => 'id']);
    }

     /**
     *
     *@return Customers ID & name
    */
    public static function getCustomers()
    {
        return Customers::find()->all();
        
    }

}
