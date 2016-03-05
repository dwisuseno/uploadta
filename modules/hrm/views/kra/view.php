<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\Kra */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kra', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kra-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Kra'.' '. Html::encode($this->title) ?></h2>
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
        'key_result_area',
        [
            'attribute' => 'tasks.task_detail',
            'label' => 'Tasks',
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
    if($providerSasaranStrategis->totalCount){
        $gridColumnSasaranStrategis = [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'hidden' => true],
            'sasaranstrategis_code',
            [
            'attribute' => 'hrData.id',
            'label' => 'Hr Data',
        ],
            [
            'attribute' => 'kra.id',
            'label' => 'Kra',
        ],
            [
            'attribute' => 'employee.id',
            'label' => 'Employee',
        ],
        ];
        echo Gridview::widget([
            'dataProvider' => $providerSasaranStrategis,
            'pjax' => true,
            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
            'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Sasaran Strategis'.' '. $this->title),
            ],
            'columns' => $gridColumnSasaranStrategis
        ]);
    }
?>
    </div>
</div>