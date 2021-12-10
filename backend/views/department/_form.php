<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Department */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="department-form">
    <div class="card">
        <div class="card-header border-0">
            <div class="d-flex justify-content-between">


            </div>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>
            <div class="col-lg-4">
                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'name')->textInput(['rows' => 6]) ?>

                 <?php
                $Schoolitems = ArrayHelper::map(\backend\models\Schools::find()->all(), 'id', 'name');
                echo $form->field($model, 'school_id')
                        ->dropDownList(
                                $Schoolitems, // Flat array ('id'=>'label')
                                ['prompt' => 'select school']    // options
                );
                ?>
                
                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>


                <div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
