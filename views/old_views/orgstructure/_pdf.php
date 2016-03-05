<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Orgstructure */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orgstructure', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orgstructure-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Orgstructure'.' '. Html::encode($this->title) ?></h2>
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
            'heading' => Html::encode('Employee'.' '. $this->title),
        ],
        'columns' => $gridColumnEmployee
    ]);
?>
    </div>
</div>