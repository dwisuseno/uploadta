<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdPrice */

$this->title = 'Create Sd Price';
$this->params['breadcrumbs'][] = ['label' => 'Sd Price', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-price-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
