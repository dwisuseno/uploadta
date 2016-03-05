<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "personnel_area".
 *
 * @property integer $id
 * @property integer $company_id
 * @property string $personnelarea_code
 * @property string $personnelarea_name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\Company $company
 * @property \app\modules\hrm\models\PersonnelSubArea[] $personnelSubAreas
 */
class PersonnelArea extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'personnel_area';
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
        return $this->hasOne(\app\modules\hrm\models\Company::className(), ['id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonnelSubAreas()
    {
        return $this->hasMany(\app\modules\hrm\models\PersonnelSubArea::className(), ['personnel_area_id' => 'id']);
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
     * @return \app\modules\hrm\models\PersonnelAreaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\PersonnelAreaQuery(get_called_class());
    }
}
