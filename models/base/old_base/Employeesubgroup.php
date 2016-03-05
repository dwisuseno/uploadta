<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "employeesubgroup".
 *
 * @property integer $id
 * @property string $employeesubgroup_code
 * @property string $employeesubgroup_name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\Personnelstructure[] $personnelstructures
 */
class Employeesubgroup extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employeesubgroup';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employeesubgroup_code' => 'Employeesubgroup Code',
            'employeesubgroup_name' => 'Employeesubgroup Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonnelstructures()
    {
        return $this->hasMany(\app\models\Personnelstructure::className(), ['employeesubgroup_id' => 'id']);
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
     * @return \app\models\EmployeesubgroupQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\EmployeesubgroupQuery(get_called_class());
    }
}
