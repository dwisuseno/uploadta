<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\PersonnelArea */

$this->title = 'Update Personnel Area: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Personnel Area', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'company_id' => $model->company_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="personnel-area-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
