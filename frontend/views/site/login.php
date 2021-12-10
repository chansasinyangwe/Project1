<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use kartik\widgets\ActiveForm;
use yii\bootstrap4\Html;
?>
 <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>
       
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
        <div style="width: 400px" >
            <?=
        
        $form->field($model, 'username', [
            'addon' => ['prepend' => ['content' => ' <span class="fas fa-envelope"></span>']]
        ])->textInput(['class' => 'form-control ', 'autocorrect' => 'off', 'autocapitalize' => 'none',
            'autofocus' => false, 'placeholder' => 'Enter username',])->label(false);
        ?>

            <?=
        $form->field($model, 'password', [
            'addon' => ['prepend' => ['content' => ' <span class="fas fa-lock"></span>']]
        ])->passwordInput(['class' => 'form-control ', 'autocorrect' => 'off', 'autocapitalize' => 'none',
            'autofocus' => false, 'placeholder' => 'Enter password',])->label(false);
        ?>

            

            <div class="form-group">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
 </div>
