<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrmTraining */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hrm Training', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hrm-training-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Hrm Training'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'training_code',
        'training_name',
        'training_place',
        'time',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnHrmDetailTraining = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'hrmTraining.id',
            'label' => 'Hrm Training',
        ],
        [
            'attribute' => 'hrmEmployee.id',
            'label' => 'Hrm Employee',
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerHrmDetailTraining,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Hrm Detail Training'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnHrmDetailTraining
    ]);
?>
    </div>
</div>