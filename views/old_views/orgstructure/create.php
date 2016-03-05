<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Orgstructure */

$this->title = 'Create Org Structure';
$this->params['breadcrumbs'][] = ['label' => 'Org Structure', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orgstructure-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
