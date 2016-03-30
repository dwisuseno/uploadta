<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdShipcondition */

$this->title = 'Create Sd Shipcondition';
$this->params['breadcrumbs'][] = ['label' => 'Sd Shipcondition', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-shipcondition-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
