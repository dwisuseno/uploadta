<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrmWorkRecord */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hrm Work Record', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hrm-work-record-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Hrm Work Record'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'employee.person_id',
            'label' => 'Hrm Employee',
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