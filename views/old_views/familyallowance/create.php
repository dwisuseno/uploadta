<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Familyallowance */

$this->title = 'Create Familyallowance';
$this->params['breadcrumbs'][] = ['label' => 'Familyallowance', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="familyallowance-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
