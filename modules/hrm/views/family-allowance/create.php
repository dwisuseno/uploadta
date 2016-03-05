<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\FamilyAllowance */

$this->title = 'Create Family Allowance';
$this->params['breadcrumbs'][] = ['label' => 'Family Allowance', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="family-allowance-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
