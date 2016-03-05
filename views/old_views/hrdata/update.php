<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Hrdata */

$this->title = 'Update Hrdata: ' . ' ' . $model->employee_id;
$this->params['breadcrumbs'][] = ['label' => 'Hrdata', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->employee_id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hrdata-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
