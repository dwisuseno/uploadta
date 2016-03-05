<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Kpi */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kpi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kpi-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Kpi'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'sasaranstrategis.id',
            'label' => 'Sasaranstrategis',
        ],
        [
            'attribute' => 'kpitype.id',
            'label' => 'Kpitype',
        ],
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