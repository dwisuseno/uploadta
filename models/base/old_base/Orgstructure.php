<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "orgstructure".
 *
 * @property integer $id
 * @property integer $client_id
 * @property integer $company_id
 * @property integer $personnelarea_id
 * @property integer $personnelsubarea_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\Employee[] $employees
 * @property \app\models\Client $client
 * @property \app\models\Company $company
 * @property \app\models\Personnelarea $personnelarea
 * @property \app\models\Personnelsubarea $personnelsubarea
 */
class Orgstructure extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orgstructure';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_id' => 'Client ID',
            'company_id' => 'Company ID',
            'personnelarea_id' => 'Personnelarea ID',
            'personnelsubarea_id' => 'Personnelsubarea ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(\app\models\Employee::className(), ['orgstructure_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(\app\models\Client::className(), ['id' => 'client_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(\app\models\Company::className(), ['id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonnelarea()
    {
        return $this->hasOne(\app\models\Personnelarea::className(), ['id' => 'personnelarea_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonnelsubarea()
    {
        return $this->hasOne(\app\models\Personnelsubarea::className(), ['id' => 'personnelsubarea_id']);
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
     * @return \app\models\OrgstructureQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\OrgstructureQuery(get_called_class());
    }
}
