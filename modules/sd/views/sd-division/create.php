<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdDivision */

$this->title = 'Create Sd Division';
$this->params['breadcrumbs'][] = ['label' => 'Sd Division', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-division-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
