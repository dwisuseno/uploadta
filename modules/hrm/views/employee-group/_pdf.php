<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\EmployeeGroup */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Employee Group', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-group-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Employee Group'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'positions.positions_code',
            'label' => 'Positions',
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
    $gridColumnEmployeeSubGroup = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'employeeGroup.id',
            'label' => 'Employee Group',
        ],
        'employeesubgroup_code',
        'employeesubgroup_name',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerEmployeeSubGroup,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Employee Sub Group'.' '. $this->title),
        ],
        'columns' => $gridColumnEmployeeSubGroup
    ]);
?>
    </div>
</div>