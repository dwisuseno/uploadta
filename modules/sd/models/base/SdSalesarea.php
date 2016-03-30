<?php

namespace app\modules\sd\models\base;

use Yii;

/**
 * This is the base model class for table "sd_salesarea".
 *
 * @property integer $id
 * @property string $code_salesarea
 * @property string $status_salesarea
 * @property integer $sd_salesorg_id
 * @property integer $sd_division_id
 * @property integer $sd_dchl_id
 * @property integer $company_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\sd\models\SdCustomer[] $sdCustomers
 * @property \app\modules\sd\models\SdSale[] $sdSales
 * @property \app\modules\sd\models\Company $company
 * @property \app\modules\sd\models\SdDchl $sdDchl
 * @property \app\modules\sd\models\SdDivision $sdDivision
 * @property \app\modules\sd\models\SdSalesorg $sdSalesorg
 */
class SdSalesarea extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sd_salesarea';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code_salesarea' => 'Code Salesarea',
            'status_salesarea' => 'Status Salesarea',
            'sd_salesorg_id' => 'Sd Salesorg ID',
            'sd_division_id' => 'Sd Division ID',
            'sd_dchl_id' => 'Sd Dchl ID',
            'company_id' => 'Company ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdCustomers()
    {
        return $this->hasMany(\app\modules\sd\models\SdCustomer::className(), ['sd_salesarea_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdSales()
    {
        return $this->hasMany(\app\modules\sd\models\SdSale::className(), ['sd_salesarea_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(\app\modules\master\models\Company::className(), ['id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdDchl()
    {
        return $this->hasOne(\app\modules\sd\models\SdDchl::className(), ['id' => 'sd_dchl_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdDivision()
    {
        return $this->hasOne(\app\modules\sd\models\SdDivision::className(), ['id' => 'sd_division_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdSalesorg()
    {
        return $this->hasOne(\app\modules\sd\models\SdSalesorg::className(), ['id' => 'sd_salesorg_id']);
    }

    /**
     * @inheritdoc
     * @return \app\modules\sd\models\SdSalesareaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\sd\models\SdSalesareaQuery(get_called_class());
    }
}
