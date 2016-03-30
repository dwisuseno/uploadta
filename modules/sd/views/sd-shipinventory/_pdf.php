<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdShipinventory */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sd Shipinventory', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-shipinventory-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Sd Shipinventory'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'code_shipinventory',
        'name_shipinventory',
        'cap_shipinventory',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
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
