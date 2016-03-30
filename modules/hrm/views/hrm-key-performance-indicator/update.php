<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrmKeyPerformanceIndicator */

$this->title = 'Update Hrm Key Performance Indicator: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hrm Key Performance Indicator', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hrm-key-performance-indicator-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
