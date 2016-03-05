<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "personnelarea".
 *
 * @property integer $id
 * @property string $personnelarea_code
 * @property string $personnelarea_name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\Orgstructure[] $orgstructures
 */
class Personnelarea extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'personnelarea';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'personnelarea_code' => 'Personnelarea Code',
            'personnelarea_name' => 'Personnelarea Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgstructures()
    {
        return $this->hasMany(\app\models\Orgstructure::className(), ['personnelarea_id' => 'id']);
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
     * @return \app\models\PersonnelareaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\PersonnelareaQuery(get_called_class());
    }
}
