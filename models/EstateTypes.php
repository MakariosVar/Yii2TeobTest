<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estateTypes".
 *
 * @property int $id
 * @property string $name
 * @property string|null $notes
 * @property string $status
 * @property string $chargeType
 *
 * @property ChargeTypes $chargeType0
 * @property Estates[] $estates
 */
class EstateTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estateTypes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'status', 'chargeType'], 'required'],
            [['notes', 'status'], 'string'],
            [['name', 'chargeType'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['chargeType'], 'exist', 'skipOnError' => true, 'targetClass' => ChargeTypes::className(), 'targetAttribute' => ['chargeType' => 'name']],
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
            'notes' => 'Σημειώσεις',
            'status' => 'Κατάσταση',
            'chargeType' => 'Τύπος Χρέωσης',
        ];
    }

    /**
     * Gets query for [[ChargeType0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChargeType0()
    {
        return $this->hasOne(ChargeTypes::className(), ['name' => 'chargeType']);
    }

    /**
     * Gets query for [[Estates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstates()
    {
        return $this->hasMany(Estates::className(), ['estateType' => 'name']);
    }

    /**
     * 
     *This Function return Charge Type Names
    */


    public static function getChargeTypeNames()
    {
        foreach(ChargeTypes::find()->all() as $ChargeTypeEntry)
        {
            
            $NamesArray[$ChargeTypeEntry->name] = $ChargeTypeEntry->name;
        }
        if(!isset($NamesArray))
        {
            return ['' => ''];
        }
        else
        {
            return $NamesArray;
        }

    }

    /**
     * 
     *@return Values for Estate Type status
    */

    static function selectStatus()
    {
        return ['Active' =>'Active','Inactive' => 'Inactive'];
    }
}
