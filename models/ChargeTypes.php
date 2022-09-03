<?php

namespace app\models;


use Yii;

/**
 * This is the model class for table "chargeTypes".
 *
 * @property int $id
 * @property string $name
 * @property string $status
 * @property float $amount
 * @property string|null $notes
 *
 * @property EstateTypes[] $estateTypes
 */
class ChargeTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chargeTypes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'status', 'amount'], 'required'],
            [['amount'], 'number'],
            [['notes'], 'string'],
            [['name', 'status'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Όνομα',
            'status' => 'Κατάσταση',
            'amount' => 'Ποσό',
            'notes' => 'Σημειώσεις',
        ];
    }

    /**
     * Gets query for [[EstateTypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstateTypes()
    {
        return $this->hasMany(EstateTypes::className(), ['chargeType' => 'name']);
    }

    /**
     * 
     *@return Values for ChargeType status
    */
    static function selectStatus()
    {
        return ['Active' =>'Active','Inactive' => 'Inactive'];
    }

}
