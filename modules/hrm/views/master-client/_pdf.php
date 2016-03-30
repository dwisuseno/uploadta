<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\MasterClient */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Master Client', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-client-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Master Client'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'client_code',
        'client_name',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnMasterCompany = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'client.id',
            'label' => 'Master Client',
        ],
        'company_code',
        'company_name',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerMasterCompany,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Master Company'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnMasterCompany
    ]);
?>
    </div>
</div>