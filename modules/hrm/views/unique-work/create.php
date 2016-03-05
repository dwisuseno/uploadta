<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\UniqueWork */

$this->title = 'Create Unique Work';
$this->params['breadcrumbs'][] = ['label' => 'Unique Work', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unique-work-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
