<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Employeehashrdata */

$this->title = 'Update Employeehashrdata: ' . ' ' . $model->employee_id;
$this->params['breadcrumbs'][] = ['label' => 'Employeehashrdata', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->employee_id, 'url' => ['view', 'employee_id' => $model->employee_id, 'hrdata_id' => $model->hrdata_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="employeehashrdata-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
