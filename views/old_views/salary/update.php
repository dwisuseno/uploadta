<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Salary */

$this->title = 'Update Salary: ' . ' ' . $model->employee_id;
$this->params['breadcrumbs'][] = ['label' => 'Salary', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->employee_id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="salary-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
