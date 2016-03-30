<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdCustomer */

$this->title = 'Create Sd Customer';
$this->params['breadcrumbs'][] = ['label' => 'Sd Customer', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-customer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
