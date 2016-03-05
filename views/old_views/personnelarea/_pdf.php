<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Personnelarea */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Personnelarea', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personnelarea-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Personnelarea'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
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
    $gridColumnOrgstructure = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'client.id',
            'label' => 'Client',
        ],
        [
            'attribute' => 'company.id',
            'label' => 'Company',
        ],
        [
            'attribute' => 'personnelarea.id',
            'label' => 'Personnelarea',
        ],
        [
            'attribute' => 'personnelsubarea.id',
            'label' => 'Personnelsubarea',
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerOrgstructure,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Orgstructure'.' '. $this->title),
        ],
        'columns' => $gridColumnOrgstructure
    ]);
?>
    </div>
</div>