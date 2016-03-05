<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\Employee */

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
        [
            'attribute' => 'personnelSubArea.personnel_subarea_name',
            'label' => 'Personnel Sub Area',
        ],
        'person_id',
        'title',
        'first_name',
        'middle_name',
        'last_name',
        'address:ntext',
        'photo',
        'nickname',
        'email',
        'phone_number',
        'start_work',
        'last_education',
        'gender',
        'to_work',
        'status',
        'personnel_number',
        'date_of_birth',
        'language',
        'nationality',
        'marital_status',
        [
            'attribute' => 'bankAccount.bankaccount_name',
            'label' => 'Bank Account',
        ],
        'bank_account_own',
        'bank_account_number',
        'type',
        'password',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnEmployeehasskill = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
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
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Employeehasskill'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnEmployeehasskill
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
        'salary_amount',
        'date',
        'payroll_status',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPayroll,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Payroll'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnPayroll
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
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Positions'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnPositions
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
            'attribute' => 'familyallowance.id',
            'label' => 'Family Allowance',
        ],
        [
            'attribute' => 'workexp.id',
            'label' => 'Work Exp',
        ],
        [
            'attribute' => 'employee.id',
            'label' => 'Employee',
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerSalary,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Salary'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnSalary
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnSasaranStrategis = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'sasaranstrategis_code',
        [
            'attribute' => 'employee.id',
            'label' => 'Employee',
        ],
        [
            'attribute' => 'kra.key_result_area',
            'label' => 'Key Result Area',
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerSasaranStrategis,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Sasaran Strategis'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnSasaranStrategis
    ]);
?>
    </div>
</div>