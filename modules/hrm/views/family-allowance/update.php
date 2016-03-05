<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\FamilyAllowance */

$this->title = 'Update Family Allowance: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Family Allowance', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="family-allowance-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
