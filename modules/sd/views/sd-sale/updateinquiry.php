<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdSale */

$this->title = 'Update Sd Inquiry: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sd Inquiry', 'url' => ['inquiry']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['inquiry', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sd-sale-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_forminquiry', [
        'model' => $model,
    ]) ?>

</div>
