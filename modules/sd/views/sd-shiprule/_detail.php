<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdShiprule */

?>
<div class="sd-shiprule-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->id) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'rule_shiprule',
        'value_shiprule',
        [
            'attribute' => 'sdShipcondition.id',
            'label' => 'Sd Shipcondition',
        ],
        [
            'attribute' => 'uom.id',
            'label' => 'Uom',
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>