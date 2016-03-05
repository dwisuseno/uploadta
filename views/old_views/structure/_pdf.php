<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Structure */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Structure', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="structure-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Structure'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'client.client_name',
            'label' => 'Client',
        ],
        [
            'attribute' => 'employeegroup.employeegroup_name',
            'label' => 'Employeegroup',
        ],
        [
            'attribute' => 'employeesubgroup.employeesubgroup_name',
            'label' => 'Employeesubgroup',
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnEmployee = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'structure.id',
            'label' => 'Structure',
        ],
        'employee_id',
        'title',
        'first_name',
        'middle_name',
        'last_name',
        'address',
        'photo',
        [
            'attribute' => 'positions.id',
            'label' => 'Positions',
        ],
        'nickname',
        'start_work',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerEmployee,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Employee'.' '. $this->title),
        ],
        'columns' => $gridColumnEmployee
    ]);
?>
    </div>
</div>