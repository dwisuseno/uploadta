<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\GlBank */

$this->title = 'Create Gl Bank';
$this->params['breadcrumbs'][] = ['label' => 'Gl Bank', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gl-bank-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
