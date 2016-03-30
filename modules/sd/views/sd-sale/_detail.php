<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdSale */

?>
<div class="sd-sale-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->id) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'shipto_sale',
        'billto_sale',
        'net_sale',
        'distance_sale',
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
            'label' => 'Sd Ship',
        ],
        [
            'attribute' => 'sdSalestype.id',
            'label' => 'Sd Salestype',
        ],
        [
            'attribute' => 'sdShipcondition.id',
            'label' => 'Sd Shipcondition',
        ],
        [
            'attribute' => 'sdTaxdetail.id',
            'label' => 'Sd Taxdetail',
        ],
        [
            'attribute' => 'sdCustomer.id',
            'label' => 'Sd Customer',
        ],
        [
            'attribute' => 'arPayterm.id',
            'label' => 'Ar Payterm',
        ],
        [
            'attribute' => 'currency.id',
            'label' => 'Currency',
        ],
        [
            'attribute' => 'sdSalesarea.id',
            'label' => 'Sd Salesarea',
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>