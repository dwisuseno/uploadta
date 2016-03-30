<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrmShift */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hrm Shift', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hrm-shift-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Hrm Shift'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'shift_code',
        'shift_name',
        'from',
        'to',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnHrmHasshift = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'employee.id',
            'label' => 'Hrm Employee',
        ],
        [
            'attribute' => 'shift.id',
            'label' => 'Hrm Shift',
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerHrmHasshift,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Hrm Hasshift'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnHrmHasshift
    ]);
?>
    </div>
</div>