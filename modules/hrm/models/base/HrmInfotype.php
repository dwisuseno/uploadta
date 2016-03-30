<?php

namespace app\modules\hrm\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "hrm_infotype".
 *
 * @property integer $id
 * @property string $infotype
 * @property string $infotype_name
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class HrmInfotype extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hrm_infotype';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'infotype' => 'Infotype',
            'infotype_name' => 'Infotype Name',
            'status' => 'Status',
        ];
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
     * @return \app\modules\hrm\models\HrmInfotypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\hrm\models\HrmInfotypeQuery(get_called_class());
    }
}
