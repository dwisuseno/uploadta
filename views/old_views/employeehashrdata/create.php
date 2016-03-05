<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Employeehashrdata */

$this->title = 'Create Employeehashrdata';
$this->params['breadcrumbs'][] = ['label' => 'Employeehashrdata', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employeehashrdata-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
