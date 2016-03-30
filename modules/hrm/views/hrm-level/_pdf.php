<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrmLevel */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hrm Level', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hrm-level-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Hrm Level'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'level_code',
        'level_name',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnHrmEmployeehaslevel = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'employee.id',
            'label' => 'Hrm Employee',
        ],
        [
            'attribute' => 'level.id',
            'label' => 'Hrm Level',
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerHrmEmployeehaslevel,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Hrm Employeehaslevel'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnHrmEmployeehaslevel
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnHrmSkill = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'level.id',
            'label' => 'Hrm Level',
        ],
        'skill_code',
        'detail_skill:ntext',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerHrmSkill,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Hrm Skill'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnHrmSkill
    ]);
?>
    </div>
</div>