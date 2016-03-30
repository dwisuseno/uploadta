<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrmEmployeeGroup */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hrm Employee Group', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hrm-employee-group-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Hrm Employee Group'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'positions.positions_code',
            'label' => 'Hrm Position',
        ],
        'employeegroup_code',
        'employeegroup_name',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnHrmEmployeeSubGroup = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'employeeGroup.id',
            'label' => 'Hrm Employee Group',
        ],
        'employeesubgroup_code',
        'employeesubgroup_name',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerHrmEmployeeSubGroup,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Hrm Employee Sub Group'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnHrmEmployeeSubGroup
    ]);
?>
    </div>
</div>