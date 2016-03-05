<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Salary */

$this->title = $model->employee_id;
$this->params['breadcrumbs'][] = ['label' => 'Salary', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salary-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Salary'.' '. Html::encode($this->title) ?></h2>
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
        'wage',
        'loss',
        [
            'attribute' => 'familyallowance.id',
            'label' => 'Familyallowance',
        ],
        [
            'attribute' => 'workexp.id',
            'label' => 'Workexp',
        ],
        'salary',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>