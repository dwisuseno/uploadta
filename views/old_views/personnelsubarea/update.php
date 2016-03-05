<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Personnelsubarea */

$this->title = 'Update Personnelsubarea: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Personnelsubarea', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="personnelsubarea-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
