<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\Employeehasskill */

$this->title = 'Update Employeehasskill: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Employeehasskill', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="employeehasskill-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
