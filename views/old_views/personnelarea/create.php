<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Personnelarea */

$this->title = 'Create Personnelarea';
$this->params['breadcrumbs'][] = ['label' => 'Personnelarea', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personnelarea-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
