<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdSalesorg */

$this->title = 'Create Sd Salesorg';
$this->params['breadcrumbs'][] = ['label' => 'Sd Salesorg', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-salesorg-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
