<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrmWorkExp */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hrm Work Exp', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hrm-work-exp-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Hrm Work Exp'.' '. Html::encode($this->title) ?></h2>
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
</div>