<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "master_personnel_sub_area".
 *
 * @property integer $id
 * @property integer $personnel_area_id
 * @property string $personnel_subarea_code
 * @property string $personnel_subarea_name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\HrmEmployee[] $hrmEmployees
 * @property \app\modules\hrm\models\MasterPersonnelArea $personnelArea
 */
class MasterPersonnelSubArea extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'master_personnel_sub_area';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'personnel_area_id' => 'Personnel Area ID',
            'personnel_subarea_code' => 'Personnel Subarea Code',
            'personnel_subarea_name' => 'Personnel Subarea Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrmEmployees()
    {
        return $this->hasMany(\app\modules\hrm\models\HrmEmployee::className(), ['personnel_sub_area_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonnelArea()
    {
        return $this->hasOne(\app\modules\hrm\models\MasterPersonnelArea::className(), ['id' => 'personnel_area_id']);
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
     * @return \app\modules\hrm\models\MasterPersonnelSubAreaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\MasterPersonnelSubAreaQuery(get_called_class());
    }
}
