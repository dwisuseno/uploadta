<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdShiprule */

$this->title = 'Update Sd Shiprule: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sd Shiprule', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sd-shiprule-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
