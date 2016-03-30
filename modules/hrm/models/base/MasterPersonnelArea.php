<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "master_personnel_area".
 *
 * @property integer $id
 * @property integer $company_id
 * @property string $personnelarea_code
 * @property string $personnelarea_name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\MasterCompany $company
 * @property \app\modules\hrm\models\MasterPersonnelSubArea[] $masterPersonnelSubAreas
 */
class MasterPersonnelArea extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'master_personnel_area';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_id' => 'Company ID',
            'personnelarea_code' => 'Personnelarea Code',
            'personnelarea_name' => 'Personnelarea Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(\app\modules\hrm\models\MasterCompany::className(), ['id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMasterPersonnelSubAreas()
    {
        return $this->hasMany(\app\modules\hrm\models\MasterPersonnelSubArea::className(), ['personnel_area_id' => 'id']);
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
     * @return \app\modules\hrm\models\MasterPersonnelAreaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\MasterPersonnelAreaQuery(get_called_class());
    }
}
