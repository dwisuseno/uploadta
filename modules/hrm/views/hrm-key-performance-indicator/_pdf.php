<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrmKeyPerformanceIndicator */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hrm Key Performance Indicator', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hrm-key-performance-indicator-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Hrm Key Performance Indicator'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'keyResultArea.key_result_area',
            'label' => 'Hrm Key Result Area',
        ],
        'kpi_detail:ntext',
        'weight',
        'target',
        'realisasi',
        'skor',
        'final_skor',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>