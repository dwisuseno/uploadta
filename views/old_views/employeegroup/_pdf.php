<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Employeegroup */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Employeegroup', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employeegroup-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Employeegroup'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'employeegroup_code',
        'employeegroup_name',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnPersonnelstructure = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'positions.id',
            'label' => 'Positions',
        ],
        [
            'attribute' => 'employeegroup.id',
            'label' => 'Employeegroup',
        ],
        [
            'attribute' => 'employeesubgroup.id',
            'label' => 'Employeesubgroup',
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPersonnelstructure,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Personnelstructure'.' '. $this->title),
        ],
        'columns' => $gridColumnPersonnelstructure
    ]);
?>
    </div>
</div>