<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">
    <div class="card">
        <div class="card-header border-0">
            <div class="d-flex justify-content-between">


            </div>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>
            <div class="col-lg-6">
                <?= $form->field($model, 'first_name')->textinput(['rows' => 6]) ?>

                <?= $form->field($model, 'last_name')->textinput(['rows' => 6]) ?>


                <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                <?php
              //  $Rolesitems = ArrayHelper::map(\backend\models\Roles::find()->all(), 'id', 'name');
                $Rolesitems = [
                    1 => "Admin",
                    2 => "Lecturer"
                ];
                echo $form->field($model, 'role_id')
                        ->dropDownList(
                                $Rolesitems, // Flat array ('id'=>'label')
                                ['prompt' => 'select role']    // options
                );
                ?>
                <div>
                    <div class="form-group">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>