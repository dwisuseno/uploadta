<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdCp */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sd Cp', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-cp-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Sd Cp'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'code_cp',
        'title_cp',
        'firstname_cp',
        'middlename_cp',
        'lastname_cp',
        'email_cp:email',
        'telp_cp',
        'telpext_cp',
        'mobile_cp',
        'department_cp',
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
</div>
