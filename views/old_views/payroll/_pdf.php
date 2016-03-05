<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Payroll */

$this->title = $model->employee_id;
$this->params['breadcrumbs'][] = ['label' => 'Payroll', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payroll-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Payroll'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'payroll_code',
        [
            'attribute' => 'employee.employee_id',
            'label' => 'Employee',
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>