<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "master_client".
 *
 * @property integer $id
 * @property string $client_code
 * @property string $client_name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\hrm\models\MasterCompany[] $masterCompanies
 */
class MasterClient extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'master_client';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_code' => 'Client Code',
            'client_name' => 'Client Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMasterCompanies()
    {
        return $this->hasMany(\app\modules\hrm\models\MasterCompany::className(), ['client_id' => 'id']);
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
     * @return \app\modules\hrm\models\MasterClientQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\MasterClientQuery(get_called_class());
    }
}
