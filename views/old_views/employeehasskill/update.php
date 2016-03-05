<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Employeehasskill */

$this->title = 'Update Employeehasskill: ' . ' ' . $model->employee_id;
$this->params['breadcrumbs'][] = ['label' => 'Employeehasskill', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->employee_id, 'url' => ['view', 'employee_id' => $model->employee_id, 'skill_id' => $model->skill_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="employeehasskill-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
