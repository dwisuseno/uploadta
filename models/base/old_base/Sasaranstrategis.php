<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "sasaranstrategis".
 *
 * @property integer $id
 * @property integer $hrdata_id
 * @property integer $employee_id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $kra_id
 *
 * @property \app\models\Kpi[] $kpis
 * @property \app\models\Hrdata $hrdata
 * @property \app\models\Employee $employee
 * @property \app\models\Kra $kra
 */
class Sasaranstrategis extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sasaranstrategis';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hrdata_id' => 'Hrdata ID',
            'employee_id' => 'Employee ID',
            'kra_id' => 'Kra ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKpis()
    {
        return $this->hasMany(\app\models\Kpi::className(), ['sasaranstrategis_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrdata()
    {
        return $this->hasOne(\app\models\Hrdata::className(), ['id' => 'hrdata_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(\app\models\Employee::className(), ['id' => 'employee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKra()
    {
        return $this->hasOne(\app\models\Kra::className(), ['id' => 'kra_id']);
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
     * @return \app\models\SasaranstrategisQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\SasaranstrategisQuery(get_called_class());
    }
}
