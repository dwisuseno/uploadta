<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "company".
 *
 * @property integer $id
 * @property integer $client_id
 * @property string $company_code
 * @property string $company_name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\Client $client
 * @property \app\modules\hrm\models\PersonnelArea[] $personnelAreas
 */
class Company extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_id' => 'Client ID',
            'company_code' => 'Company Code',
            'company_name' => 'Company Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(\app\modules\hrm\models\Client::className(), ['id' => 'client_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonnelAreas()
    {
        return $this->hasMany(\app\modules\hrm\models\PersonnelArea::className(), ['company_id' => 'id']);
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
     * @return \app\modules\hrm\models\CompanyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\CompanyQuery(get_called_class());
    }
}