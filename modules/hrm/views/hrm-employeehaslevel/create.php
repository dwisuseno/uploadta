<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrmEmployeehaslevel */

$this->title = 'Create Hrm Employeehaslevel';
$this->params['breadcrumbs'][] = ['label' => 'Hrm Employeehaslevel', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hrm-employeehaslevel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
