<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdPrice */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sd Price', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-price-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Sd Price'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'code_price',
        'name_price',
        'amount_price',
        [
                'attribute' => 'currency.id',
                'label' => 'Currency'
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnSdPricedetail = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'name_pricedetail',
        'amount_pricedetail',
        'value_pricedetail',
        'line_pricedetail',
        [
                'attribute' => 'tax.id',
                'label' => 'Tax'
        ],
        [
                'attribute' => 'sdPrice.id',
                'label' => 'Sd Price'
        ],
        [
                'attribute' => 'sdSalesitem.id',
                'label' => 'Sd Salesitem'
        ],
        [
                'attribute' => 'currency.id',
                'label' => 'Currency'
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerSdPricedetail,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-sd-pricedetail']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Sd Pricedetail'.' '. $this->title),
        ],
        'columns' => $gridColumnSdPricedetail
    ]);
?>
    </div>
</div>
