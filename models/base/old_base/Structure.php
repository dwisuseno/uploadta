<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "structure".
 *
 * @property integer $id
 * @property integer $client_id
 * @property integer $employeegroup_id
 * @property integer $employeesubgroup_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\Employee[] $employees
 * @property \app\models\Client $client
 * @property \app\models\Employeegroup $employeegroup
 * @property \app\models\Employeesubgroup $employeesubgroup
 */
class Structure extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'structure';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_id' => 'Client ID',
            'employeegroup_id' => 'Employeegroup ID',
            'employeesubgroup_id' => 'Employeesubgroup ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(\app\models\Employee::className(), ['structure_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(\app\models\Client::className(), ['id' => 'client_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeegroup()
    {
        return $this->hasOne(\app\models\Employeegroup::className(), ['id' => 'employeegroup_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeesubgroup()
    {
        return $this->hasOne(\app\models\Employeesubgroup::className(), ['id' => 'employeesubgroup_id']);
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
     * @return \app\models\StructureQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\StructureQuery(get_called_class());
    }
}
