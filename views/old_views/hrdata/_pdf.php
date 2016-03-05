<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Hrdata */

$this->title = $model->employee_id;
$this->params['breadcrumbs'][] = ['label' => 'Hrdata', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hrdata-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Hrdata'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'employee.employee_id',
            'label' => 'Employee',
        ],
        'personnelnumber',
        'date_of_birth',
        'language',
        'nationality',
        'marital_status',
        'children',
        [
            'attribute' => 'bankaccount.bankaccount_name',
            'label' => 'Bankaccount',
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
            'attribute' => 'employee.employee_id',
            'label' => 'Employee',
        ],
        [
            'attribute' => 'hrdata.employee_id',
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
</div>