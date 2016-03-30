<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdCustomeraccount */

$this->title = 'Update Sd Customeraccount: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sd Customeraccount', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sd-customeraccount-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
