<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\EmployeeSubGroup */

$this->title = 'Create Employee Sub Group';
$this->params['breadcrumbs'][] = ['label' => 'Employee Sub Group', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-sub-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
