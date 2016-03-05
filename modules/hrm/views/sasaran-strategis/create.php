<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\SasaranStrategis */

$this->title = 'Create Sasaran Strategis';
$this->params['breadcrumbs'][] = ['label' => 'Sasaran Strategis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sasaran-strategis-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
