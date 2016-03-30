<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrmStrategicTarget */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hrm Strategic Target', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hrm-strategic-target-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Hrm Strategic Target'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'employee.person_id',
            'label' => 'Hrm Employee',
        ],
        'strategic_target_code',
        'strategic_target_detail:ntext',
        'period',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnHrmKeyResultArea = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'sasaranStrategis.id',
            'label' => 'Hrm Strategic Target',
        ],
        'key_result_area:ntext',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerHrmKeyResultArea,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Hrm Key Result Area'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnHrmKeyResultArea
    ]);
?>
    </div>
</div>