<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Familyallowance */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Familyallowance', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="familyallowance-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Familyallowance'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'wife',
        'children',
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
        [
            'attribute' => 'employee.id',
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