<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\IwmItemmaster */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Iwm Itemmaster', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="iwm-itemmaster-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Iwm Itemmaster'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'code_itemmaster',
        'desc_itemmaster',
        'weight_itemmaster',
        'price_itemmaster',
        [
                'attribute' => 'uom.id',
                'label' => 'Uom'
        ],
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
    $gridColumnSdSalesitem = [
        ['class' => 'yii\grid\SerialColumn'],
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
        [
                'attribute' => 'sdSale.id',
                'label' => 'Sd Sale'
        ],
        [
                'attribute' => 'iwmItemmaster.id',
                'label' => 'Iwm Itemmaster'
        ],
        [
                'attribute' => 'currency.id',
                'label' => 'Currency'
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerSdSalesitem,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-sd-salesitem']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Sd Salesitem'.' '. $this->title),
        ],
        'columns' => $gridColumnSdSalesitem
    ]);
?>
    </div>
</div>
