<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrmPosition */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hrm Position', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hrm-position-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Hrm Position'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'jobs.jobs_code',
            'label' => 'Hrm Job',
        ],
        'positions_code',
        'vacancy',
        [
            'attribute' => 'employee.personnel_number',
            'label' => 'Hrm Employee',
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
    $gridColumnHrmEmployeeGroup = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'positions.id',
            'label' => 'Hrm Position',
        ],
        'employeegroup_code',
        'employeegroup_name',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerHrmEmployeeGroup,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Hrm Employee Group'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnHrmEmployeeGroup
    ]);
?>
    </div>
</div>