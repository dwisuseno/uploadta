<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrmEmployeehaslevel */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hrm Employeehaslevel', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hrm-employeehaslevel-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Hrm Employeehaslevel'.' '. Html::encode($this->title) ?></h2>
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
        [
            'attribute' => 'level.level_code',
            'label' => 'Hrm Level',
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>