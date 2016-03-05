<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\AnalysisOfWork */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Analysis Of Work', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="analysis-of-work-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Analysis Of Work'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'employee.id',
            'label' => 'Employee',
        ],
        [
            'attribute' => 'subSkill.sub_skill_code',
            'label' => 'Sub Skill',
        ],
        'count',
        'late_time',
        'on_time',
        'wage',
        'on_time_bonus',
        'total_work_time',
        'total_late_time',
        'total_on_time',
        'total_wage',
        'total_loss',
        'total_on_time_bonus',
        'variance',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>