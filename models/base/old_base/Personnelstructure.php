<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "personnelstructure".
 *
 * @property integer $id
 * @property integer $positions_id
 * @property integer $employeegroup_id
 * @property integer $employeesubgroup_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\Positions $positions
 * @property \app\models\Employeegroup $employeegroup
 * @property \app\models\Employeesubgroup $employeesubgroup
 */
class Personnelstructure extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'personnelstructure';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'positions_id' => 'Positions ID',
            'employeegroup_id' => 'Employeegroup ID',
            'employeesubgroup_id' => 'Employeesubgroup ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPositions()
    {
        return $this->hasOne(\app\models\Positions::className(), ['id' => 'positions_id']);
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
     * @return \app\models\PersonnelstructureQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\PersonnelstructureQuery(get_called_class());
    }
}
