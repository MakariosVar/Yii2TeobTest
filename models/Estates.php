<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estates".
 *
 * @property int $id
 * @property int $customerId
 * @property string $customerFirstName
 * @property string $customerLastName
 * @property string $estateType
 * @property float $size
 * @property string $location
 * @property string|null $notes
 *
 * @property Customers $customer
 * @property EstateTypes $estateType0
 * @property Locations $location0
 */
class Estates extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estates';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customerId', 'estateType', 'size', 'location'], 'required'],
            [['customerId'], 'integer'],
            [['size'], 'number'],
            [['notes'], 'string'],
            [['customerFirstName', 'customerLastName', 'estateType', 'location'], 'string', 'max' => 255],
            [['estateType'], 'exist', 'skipOnError' => true, 'targetClass' => EstateTypes::className(), 'targetAttribute' => ['estateType' => 'name']],
            [['location'], 'exist', 'skipOnError' => true, 'targetClass' => Locations::className(), 'targetAttribute' => ['location' => 'name']],
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
            'estateType' => 'Τύπος Κτήματος',
            'size' => 'Μέγεθος(σε στρέμματα)',
            'location' => 'Περιοχή',
            'notes' => 'Σημειώσεις',
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
     * Gets query for [[EstateType0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstateType0()
    {
        return $this->hasOne(EstateTypes::className(), ['name' => 'estateType']);
    }

    /**
     * Gets query for [[Location0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocation0()
    {
        return $this->hasOne(Locations::className(), ['name' => 'location']);
    }

     /**
     *
     *@return Locations names
    */
    public static function getLocations()
    {
        foreach(Locations::find()->all() as $location)
        {
            $LocationsArray[$location->name] = $location->name;
        }
        if(!isset($LocationsArray))
        {
            return ['' => ''];
        }
        else
        {
            return $LocationsArray;
        }
    }

    /**
     *
     *@return Customers ID & name
    */
    public static function getCustomers()
    {
        foreach(Customers::find()->all() as $Customer)
        {
            $CustomersArray[$Customer->id] = $Customer->firstName.' '.$Customer->lastName.' (ΑΦΜ: '.$Customer->VAT.')';
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
     *@return EstateTypes names
    */
    public static function getEstateTypes()
    {
        foreach(EstateTypes::find()->all() as $EstateType)
        {
            $EstateTypesArray[$EstateType->name] = $EstateType->name;
        }
        if(!isset($EstateTypesArray))
        {
            return ['' => ''];
        }
        else
        {
            return $EstateTypesArray;
        }
    }

}
