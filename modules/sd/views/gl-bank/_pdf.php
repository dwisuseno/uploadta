<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\GlBank */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Gl Bank', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gl-bank-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Gl Bank'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'name_bank',
        'city_bank',
        [
                'attribute' => 'country.id',
                'label' => 'Country'
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
    $gridColumnSdCustomeraccount = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'city_bank',
        'country_bank',
        'key_bank',
        'account_bank',
        'holder_customeraccount',
        [
                'attribute' => 'glBank.id',
                'label' => 'Gl Bank'
        ],
        [
                'attribute' => 'sdCustomer.id',
                'label' => 'Sd Customer'
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerSdCustomeraccount,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-sd-customeraccount']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Sd Customeraccount'.' '. $this->title),
        ],
        'columns' => $gridColumnSdCustomeraccount
    ]);
?>
    </div>
</div>
