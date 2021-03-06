<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "hrm_family_allowance".
 *
 * @property integer $id
 * @property string $load_name
 * @property double $load
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\HrmSalary[] $hrmSalaries
 */
class HrmFamilyAllowance extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hrm_family_allowance';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'load_name' => 'Load Name',
            'load' => 'Load',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrmSalaries()
    {
        return $this->hasMany(\app\modules\hrm\models\HrmSalary::className(), ['familyallowance_id' => 'id']);
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
     * @return \app\modules\hrm\models\HrmFamilyAllowanceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\HrmFamilyAllowanceQuery(get_called_class());
    }
}
