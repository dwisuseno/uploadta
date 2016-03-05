<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Workexp */

$this->title = 'Create Workexp';
$this->params['breadcrumbs'][] = ['label' => 'Workexp', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workexp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
