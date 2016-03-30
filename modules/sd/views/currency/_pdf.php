<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\master\models\Currency */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Currency', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="currency-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Currency'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'codeCurrency',
        'nameCurrency',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnArPayment = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'paymentNumber',
        'paymentName',
        'date',
        'dueDate',
        'dueDateCount',
        'amount',
        'paid',
        'residu',
        'status',
        'note',
        'last_updated_at',
        'last_update_by',
        [
                'attribute' => 'arPayterm.id',
                'label' => 'Ar Payterm'
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
                'attribute' => 'currency.id',
                'label' => 'Currency'
        ],
        [
                'attribute' => 'arTransaction.id',
                'label' => 'Ar Transaction'
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerArPayment,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-ar-payment']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Ar Payment'.' '. $this->title),
        ],
        'columns' => $gridColumnArPayment
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
    $gridColumnIwmItemDetail = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
                'attribute' => 'purPoHeader.id',
                'label' => 'Po'
        ],
        [
                'attribute' => 'purPoLine.id',
                'label' => 'Po Line'
        ],
        [
                'attribute' => 'iwmItemMaster.id',
                'label' => 'Item'
        ],
        'item_name',
        'cost',
        'price',
        [
                'attribute' => 'currency.id',
                'label' => 'Currency'
        ],
        'qty_in_inventory',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIwmItemDetail,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-iwm-item-detail']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Iwm Item Detail'.' '. $this->title),
        ],
        'columns' => $gridColumnIwmItemDetail
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnPurPoHeader = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'po_number',
        [
                'attribute' => 'purRequisitionHeader.id',
                'label' => 'Req Header'
        ],
        [
                'attribute' => 'purQuotationHeader.id',
                'label' => 'Quo Header'
        ],
        'status',
        [
                'attribute' => 'supplier.id',
                'label' => 'Supplier Name'
        ],
        'creator',
        'agreement_start_date',
        'need_by_date',
        [
                'attribute' => 'iwmInventory.id',
                'label' => 'Shipto'
        ],
        'total_amount',
        [
                'attribute' => 'currency.id',
                'label' => 'Currency'
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPurPoHeader,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-pur-po-header']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Pur Po Header'.' '. $this->title),
        ],
        'columns' => $gridColumnPurPoHeader
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnPurQuotationHeader = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
                'attribute' => 'purRfqHeader.id',
                'label' => 'Rfq Header'
        ],
        'quo_number',
        'header_status',
        'valid_date',
        'price_date',
        [
                'attribute' => 'currency.id',
                'label' => 'Currency'
        ],
        [
                'attribute' => 'supplier.id',
                'label' => 'Supplier'
        ],
        'duration_of_delivery',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPurQuotationHeader,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-pur-quotation-header']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Pur Quotation Header'.' '. $this->title),
        ],
        'columns' => $gridColumnPurQuotationHeader
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnPurRfqHeader = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'rfq_number',
        [
                'attribute' => 'purRequisitionHeader.id',
                'label' => 'Req Header'
        ],
        'creator',
        'status',
        'due_date',
        [
                'attribute' => 'currency.id',
                'label' => 'Currency'
        ],
        [
                'attribute' => 'supplier.id',
                'label' => 'Supplier Name'
        ],
        [
                'attribute' => 'iwmInventory.id',
                'label' => 'Shipto'
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPurRfqHeader,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-pur-rfq-header']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Pur Rfq Header'.' '. $this->title),
        ],
        'columns' => $gridColumnPurRfqHeader
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
                'attribute' => 'sdShip.id',
                'label' => 'Sd Ship'
        ],
        [
                'attribute' => 'sdCp.id',
                'label' => 'Sd Cp'
        ],
        [
                'attribute' => 'sdSalesarea.id',
                'label' => 'Sd Salesarea'
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
    $gridColumnSdPrice = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'code_price',
        'name_price',
        'amount_price',
        [
                'attribute' => 'currency.id',
                'label' => 'Currency'
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerSdPrice,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-sd-price']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Sd Price'.' '. $this->title),
        ],
        'columns' => $gridColumnSdPrice
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
    
    <div class="row">
<?php
    $gridColumnSdShip = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'code_ship',
        'desc_ship',
        'cost_ship',
        [
                'attribute' => 'currency.id',
                'label' => 'Currency'
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerSdShip,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-sd-ship']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Sd Ship'.' '. $this->title),
        ],
        'columns' => $gridColumnSdShip
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnSdShipdetail = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'cost_shipdetail',
        [
                'attribute' => 'sdShip.id',
                'label' => 'Sd Ship'
        ],
        [
                'attribute' => 'sdShipinventory.id',
                'label' => 'Sd Shipinventory'
        ],
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
    
    <div class="row">
<?php
    $gridColumnSdTaxdetail = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'name_taxdetail',
        'value_taxdetail',
        'country_taxdetail',
        [
                'attribute' => 'tax.id',
                'label' => 'Tax'
        ],
        [
                'attribute' => 'currency.id',
                'label' => 'Currency'
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerSdTaxdetail,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-sd-taxdetail']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Sd Taxdetail'.' '. $this->title),
        ],
        'columns' => $gridColumnSdTaxdetail
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnTax = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'code_tax',
        'name_tax',
        'value_tax',
        [
                'attribute' => 'currency.id',
                'label' => 'Currency'
        ],
        [
                'attribute' => 'country.id',
                'label' => 'Country'
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerTax,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-tax']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Tax'.' '. $this->title),
        ],
        'columns' => $gridColumnTax
    ]);
?>
    </div>
</div>
