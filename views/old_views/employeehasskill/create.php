<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Employeehasskill */

$this->title = 'Create Employeehasskill';
$this->params['breadcrumbs'][] = ['label' => 'Employeehasskill', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employeehasskill-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
