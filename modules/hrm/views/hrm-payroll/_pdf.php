<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrmPayroll */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hrm Payroll', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hrm-payroll-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Hrm Payroll'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'payroll_code',
        [
            'attribute' => 'employee.person_id',
            'label' => 'Hrm Employee',
        ],
        'salary_amount',
        'date',
        'payroll_status',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>