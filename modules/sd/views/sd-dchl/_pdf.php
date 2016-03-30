<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdDchl */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sd Dchl', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-dchl-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Sd Dchl'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'code_dchl',
        'name_dchl',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnSdSalesarea = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'code_salesarea',
        'status_salesarea',
        [
                'attribute' => 'sdSalesorg.id',
                'label' => 'Sd Salesorg'
        ],
        [
                'attribute' => 'sdDivision.id',
                'label' => 'Sd Division'
        ],
        [
                'attribute' => 'sdDchl.id',
                'label' => 'Sd Dchl'
        ],
        [
                'attribute' => 'company.id',
                'label' => 'Company'
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerSdSalesarea,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-sd-salesarea']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Sd Salesarea'.' '. $this->title),
        ],
        'columns' => $gridColumnSdSalesarea
    ]);
?>
    </div>
</div>
