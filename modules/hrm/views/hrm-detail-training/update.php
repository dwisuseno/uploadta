<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrmDetailTraining */

$this->title = 'Update Hrm Detail Training: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hrm Detail Training', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'hrm_training_id' => $model->hrm_training_id, 'hrm_employee_id' => $model->hrm_employee_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hrm-detail-training-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
