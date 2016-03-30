<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrmDetailTraining */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hrm Detail Training', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hrm-detail-training-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Hrm Detail Training'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'hrmTraining.training_code',
            'label' => 'Hrm Training',
        ],
        [
            'attribute' => 'hrmEmployee.person_id',
            'label' => 'Hrm Employee',
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>