<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\SubSkill */

$this->title = 'Create Sub Skill';
$this->params['breadcrumbs'][] = ['label' => 'Sub Skill', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sub-skill-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
