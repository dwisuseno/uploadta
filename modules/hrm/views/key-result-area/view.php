<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\KeyResultArea */

$this->title = $model->key_result_area;
$this->params['breadcrumbs'][] = ['label' => 'Key Result Area', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="key-result-area-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Key Result Area'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            <?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . 'PDF', 
                ['pdf', 'id' => $model['id']], 
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => 'Will open the generated PDF file in a new window'
                ]
            )?>                        
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'sasaranStrategis.sasaranstrategis_code',
            'label' => 'Sasaran Strategis',
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
    $gridColumnKpi = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'keyResultArea.key_result_area',
            'label' => 'Key Result Area',
        ],
        'kpi_detail:ntext',
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
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Kpi'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnKpi
    ]);
?>
    </div>
</div>