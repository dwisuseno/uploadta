<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrmCandidate */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'HrmJobreqCandidate', 
        'relID' => 'hrm-jobreq-candidate', 
        'value' => \yii\helpers\Json::encode($model->hrmJobreqCandidates),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="hrm-candidate-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

   <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Header</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                  <div class="box-body">
                    <div class="row">
                        <div class="col-md-3">
                            <?php if ($model->photo): ?>
                                <div class="form-group">
                                    <?= Html::img($model->photo, ['height'=>'100px']) ?>
                                </div>
                            <?php endif; ?>
                             <?= $form->field($model, 'file') -> fileInput(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <?= $form->field($model, 'person_id')->textInput(['maxlength' => true, 'placeholder' => 'Person']) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <?php if ($model->cv): ?>
                                <div class="form-group">
                                    <?= Html::a($model->cv,$model->cv ) ?>
                                </div>
                            <?php endif; ?>
                             <?= $form->field($model, 'fcv') -> fileInput(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>
                        </div>
                        <div class="col-md-3">
                            <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true, 'placeholder' => 'Phone Number']) ?>
                        </div>
                        <div class="col-md-3">
                              <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email']) ?>
                        </div>
                        <div class="col-md-3">
                              <?= $form->field($model, 'candidate_code')->textInput(['maxlength' => true, 'placeholder' => 'Candidate Code']) ?>
                        </div>
                    </div>
                    </div><!-- /.box-body -->      
              </div><!-- /.box -->
        </div>
    </div>


    <div class="form-group" id="add-hrm-jobreq-candidate"></div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
