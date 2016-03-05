<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Hrdata */

$this->title = 'Create Hrdata';
$this->params['breadcrumbs'][] = ['label' => 'Hrdata', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hrdata-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
