<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Kpi */

$this->title = 'Create Kpi';
$this->params['breadcrumbs'][] = ['label' => 'Kpi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kpi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
