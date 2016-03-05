<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "company".
 *
 * @property integer $id
 * @property string $company_code
 * @property string $company_name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\Orgstructure[] $orgstructures
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
            'company_code' => 'Company Code',
            'company_name' => 'Company Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgstructures()
    {
        return $this->hasMany(\app\models\Orgstructure::className(), ['company_id' => 'id']);
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
     * @return \app\models\CompanyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\CompanyQuery(get_called_class());
    }
}
