<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdShip */

$this->title = $model->code_ship;
$this->params['breadcrumbs'][] = ['label' => 'Sd Ship', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-ship-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Sd Ship'.' '. Html::encode($this->title) ?></h2>
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
        'code_ship',
        'desc_ship',
        [
            'attribute' => function($model) {
                return $model['worktime_ship'].' Hours';
            },
            'label' => 'Worktime Ship',
        ],
        [
            'attribute' => function($model) {
                return $model['loadtime_ship'].' Hours';
            },
            'label' => 'Loadtime Ship',
        ],
        [
            'attribute' => function($model) {
                return $model['pciktime_ship'].' Hours';
            },
            'label' => 'Pciktime Ship',
        ],
        [
            'attribute' => function($model) {
                return $model['startday_ship'].' to '.$model['endday_ship'];
            },
            'label' => 'Cost Ship',
        ],
        [
            'attribute' => function($model) {
                return $model['cost_ship'].' '.$model['currency']['codeCurrency'];
            },
            'label' => 'Cost Ship',
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    
<?php
if($providerSdShipdetail->totalCount){
    $gridColumnSdShipdetail = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'hidden' => true],
            [
                'attribute' => 'sdShipinventory.name_shipinventory',
                'label' => 'Sd Shipinventory'
        ],
            'cost_shipdetail',
            [
                'attribute' => 'currency.codeCurrency',
                'label' => 'Currency'
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerSdShipdetail,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-sd-shipdetail']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Sd Shipdetail'.' '. $this->title),
        ],
        'columns' => $gridColumnSdShipdetail
    ]);
}
?>
</div>