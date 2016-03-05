<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\Jobs */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Jobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jobs-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Jobs'.' '. Html::encode($this->title) ?></h2>
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
    $gridColumnPositions = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'jobs.id',
            'label' => 'Jobs',
        ],
        'positions_code',
        'vacancy',
        [
            'attribute' => 'employee.id',
            'label' => 'Employee',
        ],
        'positions_as',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPositions,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Positions'.' '. $this->title),
        ],
        'columns' => $gridColumnPositions
    ]);
?>
    </div>
</div>