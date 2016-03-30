<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\MasterPersonnelArea */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Master Personnel Area', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-personnel-area-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Master Personnel Area'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'company.company_name',
            'label' => 'Master Company',
        ],
        'personnelarea_code',
        'personnelarea_name',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnMasterPersonnelSubArea = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'personnelArea.id',
            'label' => 'Master Personnel Area',
        ],
        'personnel_subarea_code',
        'personnel_subarea_name',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerMasterPersonnelSubArea,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Master Personnel Sub Area'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnMasterPersonnelSubArea
    ]);
?>
    </div>
</div>