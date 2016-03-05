<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Skill */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Skill', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="skill-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Skill'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'skill_code',
        'skill_name',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnEmployeehasskill = [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'employee.id',
            'label' => 'Employee',
        ],
        [
            'attribute' => 'skill.id',
            'label' => 'Skill',
        ],
        'how_many',
        'how_long',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerEmployeehasskill,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Employeehasskill'.' '. $this->title),
        ],
        'columns' => $gridColumnEmployeehasskill
    ]);
?>
    </div>
</div>