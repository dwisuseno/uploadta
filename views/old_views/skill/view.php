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
    if($providerEmployeehasskill->totalCount){
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
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Employeehasskill'.' '. $this->title),
            ],
            'columns' => $gridColumnEmployeehasskill
        ]);
    }
?>
    </div>
</div>