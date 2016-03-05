<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\UniqueWork */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Unique Work', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unique-work-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Unique Work'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'employee.person_id',
            'label' => 'Employee',
        ],
        'start_real',
        'end_real',
        'duration_plan',
        'duration_real',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>