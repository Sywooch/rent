<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subway".
 *
 * @property integer $SubwayId
 * @property integer $SubwayIndex
 * @property string $SubwayTitle
 */
class Subway extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subway';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SubwayIndex', 'SubwayTitle'], 'required'],
            [['SubwayIndex'], 'integer'],
            [['SubwayTitle'], 'string', 'max' => 255],
            [['SubwayIndex'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SubwayId' => 'Subway ID',
            'SubwayIndex' => 'Subway Index',
            'SubwayTitle' => 'Subway Title',
        ];
    }
}
