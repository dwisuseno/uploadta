<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Employeehashrdata */

$this->title = $model->employee_id;
$this->params['breadcrumbs'][] = ['label' => 'Employeehashrdata', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employeehashrdata-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Employeehashrdata'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        [
            'attribute' => 'employee.id',
            'label' => 'Employee',
        ],
        [
            'attribute' => 'hrdata.id',
            'label' => 'Hrdata',
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>