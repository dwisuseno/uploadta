<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrmKeyResultArea */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hrm Key Result Area', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hrm-key-result-area-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Hrm Key Result Area'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'sasaranStrategis.sasaranstrategis_code',
            'label' => 'Hrm Strategic Target',
        ],
        'key_result_area:ntext',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnHrmKeyPerformanceIndicator = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'keyResultArea.id',
            'label' => 'Hrm Key Result Area',
        ],
        'kpi_detail:ntext',
        'weight',
        'target',
        'realisasi',
        'skor',
        'final_skor',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerHrmKeyPerformanceIndicator,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Hrm Key Performance Indicator'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnHrmKeyPerformanceIndicator
    ]);
?>
    </div>
</div>