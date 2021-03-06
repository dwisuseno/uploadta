<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdShip */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sd Ship', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-ship-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Sd Ship'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'code_ship',
        'desc_ship',
        'cost_ship',
        'worktime_ship:datetime', 
        'loadtime_ship:datetime', 
        'pciktime_ship:datetime', 
        'startday_ship', 
        'endday_ship', 
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
    $gridColumnSdCustomer = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'code_customer',
        'title_customer',
        'name_customer',
        'street_customer',
        'postal_customer',
        'city_customer',
        'pay_customer',
        'probability_customer',
        'delivprior_customer',
        'pb_customer',
        'telp_customer',
        'telpext_customer',
        'mobile_customer',
        'email_customer:email',
        'comment_customer:ntext',
        [
                'attribute' => 'sdSalesarea.id',
                'label' => 'Sd Salesarea'
        ],
        [
                'attribute' => 'arPayterm.id',
                'label' => 'Ar Payterm'
        ],
        [
                'attribute' => 'sdCp.id',
                'label' => 'Sd Cp'
        ],
        [
                'attribute' => 'sdShip.id',
                'label' => 'Sd Ship'
        ],
        [
                'attribute' => 'currency.id',
                'label' => 'Currency'
        ],
        [
                'attribute' => 'arDunning.id',
                'label' => 'Ar Dunning'
        ],
        [
                'attribute' => 'country.id',
                'label' => 'Country'
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerSdCustomer,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-sd-customer']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Sd Customer'.' '. $this->title),
        ],
        'columns' => $gridColumnSdCustomer
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnSdSale = [
        ['class' => 'yii\grid\SerialColumn'],
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
        [
                'attribute' => 'sdSalesarea.id',
                'label' => 'Sd Salesarea'
        ],
        [
                'attribute' => 'arPayterm.id',
                'label' => 'Ar Payterm'
        ],
        [
                'attribute' => 'sdShipcondition.id',
                'label' => 'Sd Shipcondition'
        ],
        [
                'attribute' => 'sdShip.id',
                'label' => 'Sd Ship'
        ],
        [
                'attribute' => 'sdCustomer.id',
                'label' => 'Sd Customer'
        ],
        'billstatus_sale',
        'freightpayto_sale',
        [
                'attribute' => 'currency.id',
                'label' => 'Currency'
        ],
        [
                'attribute' => 'sdSalestype.id',
                'label' => 'Sd Salestype'
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerSdSale,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-sd-sale']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Sd Sale'.' '. $this->title),
        ],
        'columns' => $gridColumnSdSale
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnSdShipdetail = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
                'attribute' => 'sdShip.id',
                'label' => 'Sd Ship'
        ],
        [
                'attribute' => 'sdShipinventory.id',
                'label' => 'Sd Shipinventory'
        ],
        'cost_shipdetail',
        [
                'attribute' => 'currency.id',
                'label' => 'Currency'
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerSdShipdetail,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-sd-shipdetail']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Sd Shipdetail'.' '. $this->title),
        ],
        'columns' => $gridColumnSdShipdetail
    ]);
?>
    </div>
</div>
