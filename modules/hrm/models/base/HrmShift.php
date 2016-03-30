<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "hrm_shift".
 *
 * @property integer $id
 * @property string $shift_code
 * @property string $shift_name
 * @property string $from
 * @property string $to
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\HrmHasshift[] $hrmHasshifts
 */
class HrmShift extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hrm_shift';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'shift_code' => 'Shift Code',
            'shift_name' => 'Shift Name',
            'from' => 'From',
            'to' => 'To',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrmHasshifts()
    {
        return $this->hasMany(\app\modules\hrm\models\HrmHasshift::className(), ['shift_id' => 'id']);
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
     * @return \app\modules\hrm\models\HrmShiftQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\HrmShiftQuery(get_called_class());
    }
}
