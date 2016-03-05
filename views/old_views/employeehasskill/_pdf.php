<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Employeehasskill */

$this->title = $model->employee_id;
$this->params['breadcrumbs'][] = ['label' => 'Employeehasskill', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employeehasskill-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Employeehasskill'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        [
            'attribute' => 'employee.id',
            'label' => 'Employee',
        ],
        [
            'attribute' => 'skill.skill_name',
            'label' => 'Skill',
        ],
        'how_many',
        'how_long',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>