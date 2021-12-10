<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Courses */
/* @var $form yii\widgets\ActiveForm */



?>


<div class="courses-form">
    <div class="card">
        <div class="card-header border-0">
            <div class="d-flex justify-content-between">

            </div>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>
            <div class="col-lg-4">
                <?= $form->field($model, 'name')->textInput(['rows' => 6]) ?>

                <?= $form->field($model, 'code')->textInput() ?>

               
                   <?php
               $Lectureritems = ArrayHelper::map(\backend\models\Users::find()->where(['role_id'=> 2])->all(), 
                       'id', 'first_name');
              
                echo $form->field($model, 'lecturer_id')
                        ->dropDownList(
                                $Lectureritems, // Flat array ('id'=>'label')
                                ['prompt' => 'select lecturer']    // options
                );
                ?>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>

                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>

    </div>
   

</div>
