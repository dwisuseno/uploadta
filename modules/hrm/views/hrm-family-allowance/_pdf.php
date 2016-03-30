<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrmFamilyAllowance */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hrm Family Allowance', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hrm-family-allowance-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Hrm Family Allowance'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'load_name',
        'load',
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