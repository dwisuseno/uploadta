<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdSale */

$this->title = 'Create Sd Inquiry';
$this->params['breadcrumbs'][] = ['label' => 'Sd Inquiry', 'url' => ['inquiry']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-sale-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_forminquiry', [
        'model' => $model,
    ]) ?>

</div>
