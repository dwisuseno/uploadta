<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "employeegroup".
 *
 * @property integer $id
 * @property string $employeegroup_code
 * @property string $employeegroup_name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\Personnelstructure[] $personnelstructures
 */
class Employeegroup extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employeegroup';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employeegroup_code' => 'Employeegroup Code',
            'employeegroup_name' => 'Employeegroup Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonnelstructures()
    {
        return $this->hasMany(\app\models\Personnelstructure::className(), ['employeegroup_id' => 'id']);
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
     * @return \app\models\EmployeegroupQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\EmployeegroupQuery(get_called_class());
    }
}
