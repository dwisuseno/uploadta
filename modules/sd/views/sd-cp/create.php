<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdCp */

$this->title = 'Create Sd Cp';
$this->params['breadcrumbs'][] = ['label' => 'Sd Cp', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-cp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
