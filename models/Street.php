<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "street".
 *
 * @property integer $StreetId
 * @property integer $StreetIndex
 * @property string $StreetTitle
 */
class Street extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'street';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['StreetIndex', 'StreetTitle'], 'required'],
            [['StreetIndex'], 'integer'],
            [['StreetTitle'], 'string', 'max' => 255],
            [['StreetIndex'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'StreetId' => 'Street ID',
            'StreetIndex' => 'Street Index',
            'StreetTitle' => 'Street Title',
        ];
    }
}
