<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property integer $CityId
 * @property integer $CityIndex
 * @property string $CityTitle
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CityIndex', 'CityTitle'], 'required'],
            [['CityIndex'], 'integer'],
            [['CityTitle'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CityId' => 'City ID',
            'CityIndex' => 'City Index',
            'CityTitle' => 'City Title',
        ];
    }
}
