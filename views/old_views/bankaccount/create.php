<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bankaccount */

$this->title = 'Create Bankaccount';
$this->params['breadcrumbs'][] = ['label' => 'Bankaccount', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bankaccount-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
