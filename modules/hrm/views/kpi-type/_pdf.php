<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\KpiType */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kpi Type', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kpi-type-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Kpi Type'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'kpi_code',
        'kpi_type_name',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnKpi = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'kpiType.id',
            'label' => 'Kpi Type',
        ],
        'weight',
        'target',
        'realisasi',
        'skor',
        'final_skor',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerKpi,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Kpi'.' '. $this->title),
        ],
        'columns' => $gridColumnKpi
    ]);
?>
    </div>
</div>