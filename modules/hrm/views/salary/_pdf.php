<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\Salary */

$this->title = $model->salary;
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
        'wage',
        'loss',
        'salary',
        [
            'attribute' => 'employee.employee_id',
            'label' => 'Employee',
        ],
        [
            'attribute' => 'familyallowance.load_name',
            'label' => 'Family Allowance',
        ],
        [
            'attribute' => 'workexp.working_exp',
            'label' => 'Work Exp',
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>