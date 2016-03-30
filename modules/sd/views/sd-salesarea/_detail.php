<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdSalesarea */

?>
<div class="sd-salesarea-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->id) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'code_salesarea',
        'status_salesarea',
        [
            'attribute' => 'sdSalesorg.id',
            'label' => 'Sd Salesorg',
        ],
        [
            'attribute' => 'sdDivision.id',
            'label' => 'Sd Division',
        ],
        [
            'attribute' => 'sdDchl.id',
            'label' => 'Sd Dchl',
        ],
        [
            'attribute' => 'company.id',
            'label' => 'Company',
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>