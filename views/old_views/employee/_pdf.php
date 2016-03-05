<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Employee */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Employee', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Employee'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'employee_id',
        'title',
        'first_name',
        'middle_name',
        'last_name',
        'address',
        'photo',
        [
            'attribute' => 'positions.positions_code',
            'label' => 'Positions',
        ],
        'nickname',
        'start_work',
        [
            'attribute' => 'orgstructure.id',
            'label' => 'Orgstructure',
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
    $gridColumnEmployeehashrdata = [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'employee.id',
            'label' => 'Employee',
        ],
        [
            'attribute' => 'hrdata.id',
            'label' => 'Hrdata',
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerEmployeehashrdata,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Employeehashrdata'.' '. $this->title),
        ],
        'columns' => $gridColumnEmployeehashrdata
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnEmployeehasskill = [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'employee.id',
            'label' => 'Employee',
        ],
        [
            'attribute' => 'skill.id',
            'label' => 'Skill',
        ],
        'how_many',
        'how_long',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerEmployeehasskill,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Employeehasskill'.' '. $this->title),
        ],
        'columns' => $gridColumnEmployeehasskill
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnHrdata = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'personnelnumber',
        'date_of_birth',
        'language',
        'nationality',
        'marital_status',
        'children',
        [
            'attribute' => 'bankaccount.id',
            'label' => 'Bankaccount',
        ],
        [
            'attribute' => 'employee.id',
            'label' => 'Employee',
        ],
        'valid_from',
        'valid_to',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerHrdata,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Hrdata'.' '. $this->title),
        ],
        'columns' => $gridColumnHrdata
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnPayroll = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'payroll_code',
        [
            'attribute' => 'employee.id',
            'label' => 'Employee',
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPayroll,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Payroll'.' '. $this->title),
        ],
        'columns' => $gridColumnPayroll
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnSalary = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'wage',
        'loss',
        'salary',
        [
            'attribute' => 'employee.id',
            'label' => 'Employee',
        ],
        [
            'attribute' => 'familyallowance.id',
            'label' => 'Familyallowance',
        ],
        [
            'attribute' => 'workexp.id',
            'label' => 'Workexp',
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerSalary,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Salary'.' '. $this->title),
        ],
        'columns' => $gridColumnSalary
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnSasaranstrategis = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'hrdata.id',
            'label' => 'Hrdata',
        ],
        [
            'attribute' => 'employee.id',
            'label' => 'Employee',
        ],
        [
            'attribute' => 'kra.id',
            'label' => 'Kra',
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerSasaranstrategis,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Sasaranstrategis'.' '. $this->title),
        ],
        'columns' => $gridColumnSasaranstrategis
    ]);
?>
    </div>
</div>