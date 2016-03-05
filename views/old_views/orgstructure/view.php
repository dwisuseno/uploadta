<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Orgstructure */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Org Structure', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orgstructure-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Org Structure'.' '. Html::encode($this->title) ?></h2>
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
            'attribute' => 'client.id',
            'label' => 'Client',
        ],
        [
            'attribute' => 'company.company_name',
            'label' => 'Company',
        ],
        [
            'attribute' => 'personnelarea.id',
            'label' => 'Personnelarea',
        ],
        [
            'attribute' => 'personnelsubarea.personnel_subarea_name',
            'label' => 'Personnelsubarea',
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
    if($providerEmployee->totalCount){
        $gridColumnEmployee = [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'hidden' => true],
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
            [
            'attribute' => 'orgstructure.id',
            'label' => 'Orgstructure',
        ],
        ];
        echo Gridview::widget([
            'dataProvider' => $providerEmployee,
            'pjax' => true,
            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
            'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Employee'.' '. $this->title),
            ],
            'columns' => $gridColumnEmployee
        ]);
    }
?>
    </div>
</div>