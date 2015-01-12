<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "flat".
 *
 * @property integer $FlatId
 * @property string $FlatSection
 * @property string $FlatType
 * @property string $FlatAction
 * @property string $FlatFrontImage
 * @property string $FlatName
 * @property string $FlatAddress
 * @property string $FlatCity
 * @property integer $FlatRoomNumber
 * @property integer $FlatArea
 * @property integer $FlatPrice
 */
class Flat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'flat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FlatSection', 'FlatType', 'FlatAction', 'FlatFrontImage', 'FlatName', 'FlatAddress', 'FlatCity', 'FlatRoomNumber', 'FlatArea', 'FlatPrice'], 'required'],
            [['FlatRoomNumber', 'FlatArea', 'FlatPrice'], 'integer'],
            [['FlatSection', 'FlatType', 'FlatAction', 'FlatFrontImage', 'FlatName', 'FlatAddress', 'FlatCity'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'FlatId' => 'Flat ID',
            'FlatSection' => 'Flat Section',
            'FlatType' => 'Flat Type',
            'FlatAction' => 'Flat Action',
            'FlatFrontImage' => 'Flat Front Image',
            'FlatName' => 'Flat Name',
            'FlatAddress' => 'Flat Address',
            'FlatCity' => 'Flat City',
            'FlatRoomNumber' => 'Flat Room Number',
            'FlatArea' => 'Flat Area',
            'FlatPrice' => 'Flat Price',
        ];
    }
}
