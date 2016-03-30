<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrmCandidate */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hrm Candidate', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hrm-candidate-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Hrm Candidate'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'candidate_code',
        'person_id',
        'cv',
        'status',
        'name',
        'phone_number',
        'email:email',
        'photo',
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