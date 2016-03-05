<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\WorkExp */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Work Exp', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-exp-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Work Exp'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'working_exp',
        'bonus',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
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
            'label' => 'Family Allowance',
        ],
        [
            'attribute' => 'workexp.id',
            'label' => 'Work Exp',
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
</div>