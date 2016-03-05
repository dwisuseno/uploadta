<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Sasaranstrategis */

$this->title = $model->employee_id;
$this->params['breadcrumbs'][] = ['label' => 'Sasaranstrategis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sasaranstrategis-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Sasaranstrategis'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'hrdata.personnelnumber',
            'label' => 'Hrdata',
        ],
        [
            'attribute' => 'kra.key_result_area',
            'label' => 'Kra',
        ],
        [
            'attribute' => 'employee.employee_id',
            'label' => 'Employee',
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
    $gridColumnKpi = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'sasaranstrategis.employee_id',
            'label' => 'Sasaranstrategis',
        ],
        [
            'attribute' => 'kpitype.id',
            'label' => 'Kpitype',
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