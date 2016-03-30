<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\IwmItemmaster */

$this->title = 'Create Iwm Itemmaster';
$this->params['breadcrumbs'][] = ['label' => 'Iwm Itemmaster', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="iwm-itemmaster-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
