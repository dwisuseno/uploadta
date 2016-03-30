<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\PpProductionJobOrder */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pp Production Job Order', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pp-production-job-order-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Pp Production Job Order'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'operation_id',
        'machine_id',
        [
            'attribute' => 'employee.person_id',
            'label' => 'Hrm Employee',
        ],
        'start_planning',
        'end_planning',
        'start_real',
        'end_real',
        'planning_duration',
        'real_duration',
        'quantity_produced',
        'time_per_production',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>