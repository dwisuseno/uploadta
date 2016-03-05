<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\PersonnelSubArea */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Personnel Sub Area', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personnel-sub-area-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Personnel Sub Area'.' '. Html::encode($this->title) ?></h2>
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
            'attribute' => 'personnelArea.id',
            'label' => 'Personnel Area',
        ],
        'personnel_subarea_code',
        'personnel_subarea_name',
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
            'attribute' => 'personnelSubArea.id',
            'label' => 'Personnel Sub Area',
        ],
        'person_id',
        'title',
        'first_name',
        'middle_name',
        'last_name',
        'address:ntext',
        'photo',
        'nickname',
        'start_work',
        'last_education',
        'gender',
        'to_work',
        'status',
        'personnel_number',
        'date_of_birth',
        'language',
        'nationality',
        'marital_status',
        [
            'attribute' => 'bankAccount.id',
            'label' => 'Bank Account',
        ],
        'bank_account_own',
        'bank_account_number',
        'type',
        'password',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerEmployee,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Employee'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnEmployee
    ]);
?>
    </div>
</div>