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
    if($providerKpi->totalCount){
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
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Kpi'.' '. $this->title),
            ],
            'columns' => $gridColumnKpi
        ]);
    }
?>
    </div>
</div>