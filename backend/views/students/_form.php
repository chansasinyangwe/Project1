<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Students */
/* @var $form yii\widgets\ActiveForm */

echo rand(1,9999);

?>
 

<div class="students-form">

    <div class="card">
        <div class="card-header border-0">
            <div class="d-flex justify-content-between">


            </div>
        </div>
        <div class="card-body">


            <?php $form = ActiveForm::begin(); ?>
            
            <div class="col-lg-4">
                <?= $form->field($model, 'first_name')->textInput(['rows' => 6]) ?>

                <?= $form->field($model, 'last_name')->textInput(['rows' => 6]) ?>

                <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
                

              
                <?php
               $Departmentitems = ArrayHelper::map(\backend\models\Department::find()->all(), 'id', 'name');
              
                echo $form->field($model, 'department_id')
                        ->dropDownList(
                                $Departmentitems, // Flat array ('id'=>'label')
                                ['prompt' => 'select department']    // options
                );
                ?>
               

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>



            </div>
        </div>
        </di



    </div>
