<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Lecturer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lecturer-form">
    <div class="card">
        <div class="card-header border-0">
            <div class="d-flex justify-content-between">

            </div>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>
            <div class="col-lg-4">
                <?= $form->field($model, 'fisrt_name')->textInput(['rows' => 6]) ?>

                <?= $form->field($model, 'last_name')->textInput(['rows' => 6]) ?>

                <?= $form->field($model, 'qualifications')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'department_id')->textInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>

                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>

    </div>
    

</div>
