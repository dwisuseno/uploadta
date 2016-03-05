<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "personnelsubarea".
 *
 * @property integer $id
 * @property string $personnel_subarea_code
 * @property string $personnel_subarea_name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\models\Orgstructure[] $orgstructures
 */
class Personnelsubarea extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'personnelsubarea';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'personnel_subarea_code' => 'Personnel Subarea Code',
            'personnel_subarea_name' => 'Personnel Subarea Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgstructures()
    {
        return $this->hasMany(\app\models\Orgstructure::className(), ['personnelsubarea_id' => 'id']);
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
     * @return \app\models\PersonnelsubareaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\PersonnelsubareaQuery(get_called_class());
    }
}
