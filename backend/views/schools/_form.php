<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Schools */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="schools-form">

    <div class="card">
        <div class="card-header border-0">
            <div class="d-flex justify-content-between">


            </div>
        </div>
        <div class="card-body">


                 <?php $form = ActiveForm::begin(); ?>
                 <div class="col-lg-4">
                 <?= $form->field($model, 'name')->textinput(['rows' => 6]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>


                
                 </div>
        </div>
    </div>
</div>
