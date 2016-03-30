<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdForecast */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sd Forecast', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-forecast-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Sd Forecast'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'code_forecast',
        'year_forecast',
        'demand_forecast',
        'month_forecast',
        'predict_forecast',
        'error_forecast',
        [
                'attribute' => 'sdSale.id',
                'label' => 'Sd Sale'
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
