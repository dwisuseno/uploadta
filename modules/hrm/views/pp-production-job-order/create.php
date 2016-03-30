<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\PpProductionJobOrder */

$this->title = 'Create Pp Production Job Order';
$this->params['breadcrumbs'][] = ['label' => 'Pp Production Job Order', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pp-production-job-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
