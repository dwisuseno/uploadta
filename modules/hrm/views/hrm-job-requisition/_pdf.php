<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrmJobRequisition */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hrm Job Requisition', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hrm-job-requisition-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Hrm Job Requisition'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'hrmPosition.positions_code',
            'label' => 'Hrm Position',
        ],
        'job_requisition_code',
        'job_requisition_name',
        'requirement:ntext',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnHrmJobreqCandidate = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'candidate.id',
            'label' => 'Hrm Candidate',
        ],
        [
            'attribute' => 'jobRequisition.id',
            'label' => 'Hrm Job Requisition',
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerHrmJobreqCandidate,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Hrm Jobreq Candidate'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnHrmJobreqCandidate
    ]);
?>
    </div>
</div>