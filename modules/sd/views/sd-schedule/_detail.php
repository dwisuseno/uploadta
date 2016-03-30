<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdSchedule */

?>
<div class="sd-schedule-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->id) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'confirmqty_schedule',
        'confirmdate_schedule',
        'pickqty_schedule',
        'pickdate_schedule',
        'delivqty_schedule',
        'delivdate_schedule',
        [
            'attribute' => 'sdSalesitem.id',
            'label' => 'Sd Salesitem',
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>