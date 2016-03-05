<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Employeegroup */

$this->title = 'Create Employee Group';
$this->params['breadcrumbs'][] = ['label' => 'Employee Group', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employeegroup-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
