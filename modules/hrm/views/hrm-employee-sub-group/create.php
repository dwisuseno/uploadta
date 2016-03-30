<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrmEmployeeSubGroup */

$this->title = 'Create Hrm Employee Sub Group';
$this->params['breadcrumbs'][] = ['label' => 'Hrm Employee Sub Group', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hrm-employee-sub-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
