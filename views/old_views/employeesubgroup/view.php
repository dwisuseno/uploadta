<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Employeesubgroup */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Employeesubgroup', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employeesubgroup-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Employeesubgroup'.' '. Html::encode($this->title) ?></h2>
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
        'employeesubgroup_code',
        'employeesubgroup_name',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    if($providerPersonnelstructure->totalCount){
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
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Personnelstructure'.' '. $this->title),
            ],
            'columns' => $gridColumnPersonnelstructure
        ]);
    }
?>
    </div>
</div>