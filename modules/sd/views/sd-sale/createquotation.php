<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdSale */

$this->title = 'Create Sd Quotation';
$this->params['breadcrumbs'][] = ['label' => 'Sd Quotation', 'url' => ['quotation']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-sale-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formquotation', [
        'model' => $model,
    ]) ?>

</div>
