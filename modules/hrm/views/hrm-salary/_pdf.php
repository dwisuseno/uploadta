<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrmSalary */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hrm Salary', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hrm-salary-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Hrm Salary'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'employee.person_id',
            'label' => 'Hrm Employee',
        ],
        'wage',
        'loss',
        'salary',
        [
            'attribute' => 'familyallowance.load_name',
            'label' => 'Hrm Family Allowance',
        ],
        [
            'attribute' => 'workexp.working_exp',
            'label' => 'Hrm Work Exp',
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>