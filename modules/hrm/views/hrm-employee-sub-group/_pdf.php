<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrmEmployeeSubGroup */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hrm Employee Sub Group', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hrm-employee-sub-group-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Hrm Employee Sub Group'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'employeeGroup.id',
            'label' => 'Hrm Employee Group',
        ],
        'employeesubgroup_code',
        'employeesubgroup_name',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>