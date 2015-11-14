<?php

namespace backend\modules\hr_mod\models;

use Yii;

/**
 * This is the model class for table "hr_employee".
 *
 * @property integer $id
 * @property string $employee_data
 * @property string $date_reg
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hr_employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['employee_data'], 'string'],
            [['date_reg'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employee_data' => 'Employee Data',
            'date_reg' => 'Date Reg',
        ];
    }
}
