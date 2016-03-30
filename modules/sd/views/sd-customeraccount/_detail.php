<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdCustomeraccount */

?>
<div class="sd-customeraccount-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->id) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'city_bank',
        'country_bank',
        'key_bank',
        'account_bank',
        'holder_customeraccount',
        [
            'attribute' => 'glBank.id',
            'label' => 'Gl Bank',
        ],
        [
            'attribute' => 'sdCustomer.id',
            'label' => 'Sd Customer',
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>