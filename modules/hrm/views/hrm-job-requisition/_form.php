<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrmJobRequisition */
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

<div class="hrm-job-requisition-form">

    <?php $form = ActiveForm::begin(); ?>
    
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
                            <?= $form->field($model, 'job_requisition_code')->textInput(['maxlength' => true, 'placeholder' => 'Job Requisition Code']) ?>
                         </div>
                         <div class="col-md-3">
                            <?= $form->field($model, 'job_requisition_name')->textInput(['maxlength' => true, 'placeholder' => 'Job Requisition Name']) ?>
                        </div>
                        <div class="col-md-3">
                            <?= $form->field($model, 'hrm_position_id')->widget(\kartik\widgets\Select2::classname(), [
                                'data' => \yii\helpers\ArrayHelper::map(\app\modules\hrm\models\HrmPosition::find()->orderBy('id')->where(['vacancy'=>'Open'])->asArray()->all(), 'id', 'positions_code'),
                                'options' => ['placeholder' => 'Choose Hrm position'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                           <?= $form->field($model, 'requirement')->textarea(['rows' => 6]) ?>
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
