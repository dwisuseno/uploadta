<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "hrm_candidate".
 *
 * @property integer $id
 * @property string $candidate_code
 * @property string $person_id
 * @property string $cv
 * @property string $status
 * @property string $name
 * @property string $phone_number
 * @property string $email
 * @property string $photo
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\HrmJobreqCandidate[] $hrmJobreqCandidates
 */
class HrmCandidate extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    public $file;
    public $fcv;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hrm_candidate';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'candidate_code' => 'Candidate Code',
            'person_id' => 'Person ID',
            'cv' => 'Cv',
            'status' => 'Status',
            'name' => 'Name',
            'phone_number' => 'Phone Number',
            'email' => 'Email',
            'photo' => 'Photo',
            'file' => 'Foto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrmJobreqCandidates()
    {
        return $this->hasMany(\app\modules\hrm\models\HrmJobreqCandidate::className(), ['candidate_id' => 'id']);
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
     * @return \app\modules\hrm\models\HrmCandidateQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\HrmCandidateQuery(get_called_class());
    }
}
