<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdDchl */

$this->title = 'Update Sd Dchl: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sd Dchl', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sd-dchl-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
