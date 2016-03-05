<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Employeesubgroup */

$this->title = 'Update Employeesubgroup: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Employeesubgroup', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="employeesubgroup-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
