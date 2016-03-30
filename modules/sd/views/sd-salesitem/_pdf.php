<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdSalesitem */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sd Salesitem', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-salesitem-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Sd Salesitem'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'quantity_salesitem',
        'uom_salesitem',
        'desc_salesitem',
        'price_salesitem',
        'priceori_salesitem',
        'linetotal_salesitem',
        'delivqty_salesitem',
        'confirmqty_salesitem',
        'pickqty',
        'batch',
        'weight_salesitem',
        'currency_id',
        [
                'attribute' => 'currency.id',
                'label' => 'Currency Id1'
        ],
        [
                'attribute' => 'iwmItemMaster.id',
                'label' => 'Iwm Item Master'
        ],
        [
                'attribute' => 'sdSale.id',
                'label' => 'Sd Sale'
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
                'attribute' => 'sdPrice.id',
                'label' => 'Sd Price'
        ],
        [
                'attribute' => 'tax.id',
                'label' => 'Tax'
        ],
        [
                'attribute' => 'currency.id',
                'label' => 'Currency'
        ],
        [
                'attribute' => 'sdSalesitem.id',
                'label' => 'Sd Salesitem'
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
    
    <div class="row">
<?php
    $gridColumnSdSchedule = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'confirmqty_schedule',
        'confirmdate_schedule',
        'pickqty_schedule',
        'pickdate_schedule',
        'delivqty_schedule',
        'delivdate_schedule',
        [
                'attribute' => 'sdSalesitem.id',
                'label' => 'Sd Salesitem'
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerSdSchedule,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-sd-schedule']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Sd Schedule'.' '. $this->title),
        ],
        'columns' => $gridColumnSdSchedule
    ]);
?>
    </div>
</div>
