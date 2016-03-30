<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdShip */

$this->title = 'Create Sd Ship';
$this->params['breadcrumbs'][] = ['label' => 'Sd Ship', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-ship-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
