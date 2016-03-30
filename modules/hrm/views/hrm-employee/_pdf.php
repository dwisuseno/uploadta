<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrmEmployee */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hrm Employee', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hrm-employee-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Hrm Employee'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [                      // the owner name of the model
            'attribute' => 'photo',
            'format' => 'image',
            'label' => 'Photo',
            'src' => $model->photo,
            'height' => '100px',
        ],
        [
            'attribute' => 'personnelSubArea.personnel_subarea_name',
            'label' => 'Master Personnel Sub Area',
        ],

        'person_id',
        'title',
        'first_name',
        'middle_name',
        'last_name',
        'address:ntext',
        'nickname',
        'email:email',
        'start_work',
        'to_work',
        'last_education',
        'gender',
        'phone_number',
        'status',
        'personnel_number',
        'date_of_birth',
        'language',
        'nationality',
        'marital_status',
        [
            'attribute' => 'bankAccount.bankaccount_name',
            'label' => 'Hrm Bank Account',
        ],
        'bank_account_own',
        'bank_account_number',
        'type',
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
    
    <div class="row">
<?php
    $gridColumnHrmEmployeehaslevel = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'employee.id',
            'label' => 'Hrm Employee',
        ],
        [
            'attribute' => 'level.id',
            'label' => 'Hrm Level',
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerHrmEmployeehaslevel,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Hrm Employeehaslevel'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnHrmEmployeehaslevel
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnHrmHasshift = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'employee.id',
            'label' => 'Hrm Employee',
        ],
        [
            'attribute' => 'shift.id',
            'label' => 'Hrm Shift',
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerHrmHasshift,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Hrm Hasshift'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnHrmHasshift
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnHrmPayroll = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'payroll_code',
        [
            'attribute' => 'employee.id',
            'label' => 'Hrm Employee',
        ],
        'salary_amount',
        'date',
        'payroll_status',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerHrmPayroll,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Hrm Payroll'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnHrmPayroll
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnHrmPosition = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'jobs_id',
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
    
    <div class="row">
<?php
    $gridColumnHrmSalary = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'employee.id',
            'label' => 'Hrm Employee',
        ],
        'wage',
        'loss',
        'salary',
        [
            'attribute' => 'familyallowance.id',
            'label' => 'Hrm Family Allowance',
        ],
        [
            'attribute' => 'workexp.id',
            'label' => 'Hrm Work Exp',
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerHrmSalary,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Hrm Salary'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnHrmSalary
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnHrmWorkRecord = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'employee.id',
            'label' => 'Hrm Employee',
        ],
        'start_real',
        'end_real',
        'duration_plan',
        'duration_real',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerHrmWorkRecord,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Hrm Work Record'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnHrmWorkRecord
    ]);
?>
    </div>
</div>