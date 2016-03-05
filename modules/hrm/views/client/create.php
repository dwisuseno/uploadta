<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\Client */

$this->title = 'Create Client';
$this->params['breadcrumbs'][] = ['label' => 'Client', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
