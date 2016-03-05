<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Personnelsubarea */

$this->title = 'Create Personnelsubarea';
$this->params['breadcrumbs'][] = ['label' => 'Personnelsubarea', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personnelsubarea-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
