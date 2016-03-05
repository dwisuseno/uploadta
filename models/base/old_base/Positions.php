<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "positions".
 *
 * @property integer $id
 * @property string $positions_code
 * @property string $positions_id
 * @property integer $vacancy
 * @property integer $jobs_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\Employee[] $employees
 * @property \app\models\Personnelstructure[] $personnelstructures
 * @property \app\models\Jobs $jobs
 */
class Positions extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'positions';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'positions_code' => 'Positions Code',
            'positions_id' => 'Positions ID',
            'vacancy' => 'Vacancy',
            'jobs_id' => 'Jobs ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(\app\models\Employee::className(), ['positions_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonnelstructures()
    {
        return $this->hasMany(\app\models\Personnelstructure::className(), ['positions_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobs()
    {
        return $this->hasOne(\app\models\Jobs::className(), ['id' => 'jobs_id']);
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
     * @return \app\models\PositionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\PositionsQuery(get_called_class());
    }
}
