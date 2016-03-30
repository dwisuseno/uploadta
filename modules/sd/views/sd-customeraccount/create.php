<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdCustomeraccount */

$this->title = 'Create Sd Customeraccount';
$this->params['breadcrumbs'][] = ['label' => 'Sd Customeraccount', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-customeraccount-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
