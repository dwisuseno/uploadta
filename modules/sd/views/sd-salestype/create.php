<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdSalestype */

$this->title = 'Create Sd Salestype';
$this->params['breadcrumbs'][] = ['label' => 'Sd Salestype', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-salestype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
