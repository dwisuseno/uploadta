<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\Positions */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Positions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="positions-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Positions'.' '. Html::encode($this->title) ?></h2>
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
            'attribute' => 'jobs.jobs_code',
            'label' => 'Jobs',
        ],
        'positions_code',
        'vacancy',
        [
            'attribute' => 'employee.personnel_number',
            'label' => 'Employee',
        ],
        'positions_as',
        'basic_salary',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnEmployeeGroup = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'positions.id',
            'label' => 'Positions',
        ],
        'employeegroup_code',
        'employeegroup_name',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerEmployeeGroup,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Employee Group'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnEmployeeGroup
    ]);
?>
    </div>
</div>