<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\Skill */

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
    $gridColumnSubSkill = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'skill.id',
            'label' => 'Skill',
        ],
        'sub_skill_code',
        'level',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerSubSkill,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Sub Skill'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnSubSkill
    ]);
?>
    </div>
</div>