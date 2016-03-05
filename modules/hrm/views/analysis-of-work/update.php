<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\AnalysisOfWork */

$this->title = 'Update Analysis Of Work: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Analysis Of Work', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="analysis-of-work-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
