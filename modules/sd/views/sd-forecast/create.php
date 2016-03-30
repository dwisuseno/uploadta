<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdForecast */

$this->title = 'Create Sd Forecast';
$this->params['breadcrumbs'][] = ['label' => 'Sd Forecast', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-forecast-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
