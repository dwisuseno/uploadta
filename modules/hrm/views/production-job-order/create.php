<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\ProductionJobOrder */

$this->title = 'Create Production Job Order';
$this->params['breadcrumbs'][] = ['label' => 'Production Job Order', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="production-job-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
