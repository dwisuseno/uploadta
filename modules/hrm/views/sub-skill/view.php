<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\SubSkill */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sub Skill', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sub-skill-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Sub Skill'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            <?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . 'PDF', 
                ['pdf', 'id' => $model['id']], 
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => 'Will open the generated PDF file in a new window'
                ]
            )?>                        
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'skill.skill_code',
            'label' => 'Skill',
        ],
        'sub_skill_code',
        'level',
        'equal_to',
        'equal_time',
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
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'employee.id',
            'label' => 'Employee',
        ],
        [
            'attribute' => 'subSkill.id',
            'label' => 'Sub Skill',
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
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Employeehasskill'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnEmployeehasskill
    ]);
?>
    </div>
</div>