<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "hrm_job_requisition".
 *
 * @property integer $id
 * @property integer $hrm_position_id
 * @property string $job_requisition_code
 * @property string $job_requisition_name
 * @property string $requirement
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\HrmPosition $hrmPosition
 * @property \app\modules\hrm\models\HrmJobreqCandidate[] $hrmJobreqCandidates
 */
class HrmJobRequisition extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hrm_job_requisition';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hrm_position_id' => 'Hrm Position ID',
            'job_requisition_code' => 'Job Requisition Code',
            'job_requisition_name' => 'Job Requisition Name',
            'requirement' => 'Requirement',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrmPosition()
    {
        return $this->hasOne(\app\modules\hrm\models\HrmPosition::className(), ['id' => 'hrm_position_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrmJobreqCandidates()
    {
        return $this->hasMany(\app\modules\hrm\models\HrmJobreqCandidate::className(), ['job_requisition_id' => 'id']);
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
     * @return \app\modules\hrm\models\HrmJobRequisitionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\HrmJobRequisitionQuery(get_called_class());
    }
}
