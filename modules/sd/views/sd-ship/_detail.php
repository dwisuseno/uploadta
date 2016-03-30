<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdShip */

?>
<div class="sd-ship-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->id) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'code_ship',
        'desc_ship',
        'cost_ship',
        'worktime_ship', 
        'loadtime_ship', 
        'pciktime_ship', 
        'startday_ship', 
        'endday_ship',
        [
            'attribute' => 'currency.id',
            'label' => 'Currency',
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>