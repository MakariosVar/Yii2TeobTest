<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "locations".
 *
 * @property int $id
 * @property string $name
 * @property string $status
 * @property string|null $notes
 *
 * @property Estates[] $estates
 */
class Locations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'locations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'status'], 'required'],
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
            'notes' => 'Σημειώσεις',
        ];
    }

    /**
     * Gets query for [[Estates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstates()
    {
        return $this->hasMany(Estates::className(), ['location' => 'name']);
    }

    /**
     * 
     *@return Values for Location status
    */
    static function selectStatus()
    {
        return ['Active' =>'Active','Inactive' => 'Inactive'];
    }
}
