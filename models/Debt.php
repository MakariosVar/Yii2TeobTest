<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "debt".
 *
 * @property int $id
 * @property int $customerId
 * @property float $amount
 * @property string $debtType
 *
 * @property Customers $customer
 */
class Debt extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'debt';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customerId', 'amount', 'debtType'], 'required'],
            [['customerId'], 'integer'],
            [['amount'], 'number'],
            [['debtType'], 'string', 'max' => 255],
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
            'customerId' => 'Customer ID',
            'amount' => 'Amount',
            'debtType' => 'Debt Type',
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
}
