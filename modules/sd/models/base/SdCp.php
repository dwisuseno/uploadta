<?php

namespace app\modules\sd\models\base;

use Yii;

/**
 * This is the base model class for table "sd_cp".
 *
 * @property integer $id
 * @property string $code_cp
 * @property string $title_cp
 * @property string $firstname_cp
 * @property string $middlename_cp
 * @property string $lastname_cp
 * @property string $email_cp
 * @property string $telp_cp
 * @property string $telpext_cp
 * @property string $mobile_cp
 * @property string $department_cp
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\sd\models\SdCustomer[] $sdCustomers
 */
class SdCp extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sd_cp';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code_cp' => 'Code Cp',
            'title_cp' => 'Title Cp',
            'firstname_cp' => 'Firstname Cp',
            'middlename_cp' => 'Middlename Cp',
            'lastname_cp' => 'Lastname Cp',
            'email_cp' => 'Email Cp',
            'telp_cp' => 'Telp Cp',
            'telpext_cp' => 'Telpext Cp',
            'mobile_cp' => 'Mobile Cp',
            'department_cp' => 'Department Cp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdCustomers()
    {
        return $this->hasMany(\app\modules\sd\models\SdCustomer::className(), ['sd_cp_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\modules\sd\models\SdCpQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\sd\models\SdCpQuery(get_called_class());
    }
}
