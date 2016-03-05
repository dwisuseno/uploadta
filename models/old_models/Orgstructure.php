<?php

namespace app\models;

use Yii;
use \app\models\base\Orgstructure as BaseOrgstructure;

/**
 * This is the model class for table "orgstructure".
 */
class Orgstructure extends BaseOrgstructure
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'client_id', 'company_id', 'personnelarea_id', 'personnelsubarea_id'], 'required'],
            [['id', 'client_id', 'company_id', 'personnelarea_id', 'personnelsubarea_id'], 'integer'],
            [['created_at', 'updated_at'], 'string', 'max' => 45],
            [['id'], 'unique']
        ];
    }
	
}
