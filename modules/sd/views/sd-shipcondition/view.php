<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdShipcondition */

$this->title = $model->code_shipcondition;
$this->params['breadcrumbs'][] = ['label' => 'Sd Shipcondition', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-shipcondition-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Sd Shipcondition'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
                        
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

<?php 
    $gridColumn = [
        'code_shipcondition',
        'desc_shipcondition',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>

<?php
if($providerSdShiprule->totalCount){
    $gridColumnSdShiprule = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'rule_shiprule',
        'value_shiprule',
        [
            'attribute' => 'uom.uom_name',
            'label' => 'Uom'
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerSdShiprule,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-sd-shiprule']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Sd Shiprule'.' '. $this->title),
        ],
        'columns' => $gridColumnSdShiprule
    ]);
}
?>
</div>