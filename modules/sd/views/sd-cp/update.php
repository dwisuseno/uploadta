<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdCp */

$this->title = 'Update Sd Cp: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sd Cp', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sd-cp-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
