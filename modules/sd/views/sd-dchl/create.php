<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdDchl */

$this->title = 'Create Sd Dchl';
$this->params['breadcrumbs'][] = ['label' => 'Sd Dchl', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-dchl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
