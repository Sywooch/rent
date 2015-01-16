<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "district".
 *
 * @property integer $DistrictId
 * @property integer $DistrictIndex
 * @property string $DistrictTitle
 */
class District extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'district';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DistrictIndex', 'DistrictTitle'], 'required'],
            [['DistrictIndex'], 'integer'],
            [['DistrictTitle'], 'string', 'max' => 255],
            [['DistrictIndex'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'DistrictId' => 'District ID',
            'DistrictIndex' => 'District Index',
            'DistrictTitle' => 'District Title',
        ];
    }
}
