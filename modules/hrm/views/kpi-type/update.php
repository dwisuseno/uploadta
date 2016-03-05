<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\KpiType */

$this->title = 'Update Kpi Type: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kpi Type', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kpi-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
