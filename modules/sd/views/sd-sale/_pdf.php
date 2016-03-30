<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdSale */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sd Sale', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-sale-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Sd Sale'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'shipto_sale',
        'billto_sale',
        'net_sale',
        'ponumber_sale',
        'podate_sale',
        'weight_sale',
        'validfrom_sale',
        'validto_sale',
        'pricedate_sale',
        'delivdate_sale',
        'reject_sale:ntext',
        'priceexp_sale',
        'inquirystatus_sale',
        'quotationstatus_sale',
        'sostatus_sale',
        'delivstatus_sale',
        'inquirycode_sale',
        'quotationcode_sale',
        'socode_sale',
        'delivcode_sale',
        'freightcost_sale',
        'billblock_sale',
        'reasonblock_sale:ntext',
        'billstatus_sale',
        'freightpayto_sale',
        [
                'attribute' => 'sdShip.id',
                'label' => 'Sd Ship'
        ],
        [
                'attribute' => 'sdSalestype.id',
                'label' => 'Sd Salestype'
        ],
        [
                'attribute' => 'sdShipcondition.id',
                'label' => 'Sd Shipcondition'
        ],
        [
                'attribute' => 'sdTaxdetail.id',
                'label' => 'Sd Taxdetail'
        ],
        [
                'attribute' => 'sdCustomer.id',
                'label' => 'Sd Customer'
        ],
        [
                'attribute' => 'arPayterm.id',
                'label' => 'Ar Payterm'
        ],
        [
                'attribute' => 'currency.id',
                'label' => 'Currency'
        ],
        [
                'attribute' => 'sdSalesarea.id',
                'label' => 'Sd Salesarea'
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
    $gridColumnArTransaction = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'transactionNumber',
        'transactionName',
        'date',
        'dueDate',
        'note',
        'amount',
        'fine',
        'additionalCost',
        'total',
        'status',
        'rejectReason',
        'last_updated_at',
        'last_updated_by',
        [
                'attribute' => 'sdSale.id',
                'label' => 'Sd Sale'
        ],
        [
                'attribute' => 'arTransactionType.id',
                'label' => 'Ar Transaction Type'
        ],
        [
                'attribute' => 'arTransactionStatus.id',
                'label' => 'Ar Transaction Status'
        ],
        [
                'attribute' => 'arDunning.id',
                'label' => 'Ar Dunning'
        ],
        [
                'attribute' => 'arDocument.id',
                'label' => 'Ar Document'
        ],
        [
                'attribute' => 'company.id',
                'label' => 'Company'
        ],
        [
                'attribute' => 'arPayterm.id',
                'label' => 'Ar Payterm'
        ],
        [
                'attribute' => 'currency.id',
                'label' => 'Currency'
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerArTransaction,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-ar-transaction']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Ar Transaction'.' '. $this->title),
        ],
        'columns' => $gridColumnArTransaction
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnSdForecast = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'code_forecast',
        'year_forecast',
        'demand_forecast',
        'month_forecast',
        'predict_forecast',
        'error_forecast',
        [
                'attribute' => 'sdSale.id',
                'label' => 'Sd Sale'
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerSdForecast,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-sd-forecast']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Sd Forecast'.' '. $this->title),
        ],
        'columns' => $gridColumnSdForecast
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
