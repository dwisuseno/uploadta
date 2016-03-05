<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\Company */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Company', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Company'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'client.client_name',
            'label' => 'Client',
        ],
        'company_code',
        'company_name',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnPersonnelArea = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'company.id',
            'label' => 'Company',
        ],
        'personnelarea_code',
        'personnelarea_name',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPersonnelArea,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Personnel Area'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnPersonnelArea
    ]);
?>
    </div>
</div>