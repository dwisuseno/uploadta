<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Structure */

$this->title = 'Update Structure: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Structure', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="structure-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
