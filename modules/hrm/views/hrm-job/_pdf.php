<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrmJob */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hrm Job', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hrm-job-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Hrm Job'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'jobs_code',
        'jobs_detail:ntext',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnHrmPosition = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'jobs.id',
            'label' => 'Hrm Job',
        ],
        'positions_code',
        'vacancy',
        [
            'attribute' => 'employee.id',
            'label' => 'Hrm Employee',
        ],
        'positions_as',
        'basic_salary',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerHrmPosition,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Hrm Position'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnHrmPosition
    ]);
?>
    </div>
</div>