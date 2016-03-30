<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "hrm_jobreq_candidate".
 *
 * @property integer $id
 * @property integer $candidate_id
 * @property integer $job_requisition_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\HrmCandidate $candidate
 * @property \app\modules\hrm\models\HrmJobRequisition $jobRequisition
 */
class HrmJobreqCandidate extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hrm_jobreq_candidate';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'candidate_id' => 'Candidate ID',
            'job_requisition_id' => 'Job Requisition ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCandidate()
    {
        return $this->hasOne(\app\modules\hrm\models\HrmCandidate::className(), ['id' => 'candidate_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobRequisition()
    {
        return $this->hasOne(\app\modules\hrm\models\HrmJobRequisition::className(), ['id' => 'job_requisition_id']);
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
     * @return \app\modules\hrm\models\HrmJobreqCandidateQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\HrmJobreqCandidateQuery(get_called_class());
    }
}
