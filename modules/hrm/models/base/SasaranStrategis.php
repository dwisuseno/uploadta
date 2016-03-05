<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "sasaran_strategis".
 *
 * @property integer $id
 * @property integer $employee_id
 * @property string $sasaranstrategis_code
 * @property string $sasaran_strategis_detail
 * @property string $period
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\KeyResultArea[] $keyResultAreas
 * @property \app\modules\hrm\models\Employee $employee
 */
class SasaranStrategis extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sasaran_strategis';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employee_id' => 'Employee ID',
            'sasaranstrategis_code' => 'Sasaranstrategis Code',
            'sasaran_strategis_detail' => 'Sasaran Strategis Detail',
            'period' => 'Period',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeyResultAreas()
    {
        return $this->hasMany(\app\modules\hrm\models\KeyResultArea::className(), ['sasaran_strategis_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(\app\modules\hrm\models\Employee::className(), ['id' => 'employee_id']);
    }

/**
     * @inheritdoc
     * @return type mixed
     */ 
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return \app\modules\hrm\models\SasaranStrategisQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\SasaranStrategisQuery(get_called_class());
    }
}
