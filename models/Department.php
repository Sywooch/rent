<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property integer $DepartmentId
 * @property integer $DepartmentIndex
 * @property string $DepartmentTitle
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DepartmentIndex', 'DepartmentTitle'], 'required'],
            [['DepartmentIndex'], 'integer'],
            [['DepartmentTitle'], 'string', 'max' => 255],
            [['DepartmentIndex'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'DepartmentId' => 'Department ID',
            'DepartmentIndex' => 'Department Index',
            'DepartmentTitle' => 'Department Title',
        ];
    }
}
