<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\master\models\Country */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Country', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Country'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'code_country',
        'name_country',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnGlBank = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'name_bank',
        'city_bank',
        [
                'attribute' => 'country.id',
                'label' => 'Country'
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerGlBank,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-gl-bank']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Gl Bank'.' '. $this->title),
        ],
        'columns' => $gridColumnGlBank
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
