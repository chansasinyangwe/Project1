<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\CourseEnrollment */
/* @var $form yii\widgets\ActiveForm */

                       
?>

<div class="course-enrollment-form">
    <div class="card">
        <div class="card-header border-0">
            <div class="d-flex justify-content-between">

            </div>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>
            <div class="col-lg-4">

                <?php
                // $CourseEnrollmenttitems = ArrayHelper::map(\backend\models\CourseEnrollment::find()->all(), 'id', 'first_name');
                $CourseEnrollmentitems = array_combine(range(date("Y"), 2000), range(date("Y"), 2000));
                
                
                echo $form->field($model, 'academic_year')
                        ->dropDownList(
                                $CourseEnrollmentitems, // Flat array ('id'=>'label')
                                ['prompt' => 'select academic year']    // options
                );
                ?>

                <?php
                // $Termitems = ArrayHelper::map(\backend\models\CourseEnrollment::find()->all(), 'id', 'name');
                $Termitems = [
                    'one' => "One",
                    'Two' => "Two",
                    'Three' => "Three"
                ];

                echo $form->field($model, 'term')
                        ->dropDownList(
                                $Termitems, // Flat array ('id'=>'label')
                                ['prompt' => 'select term']    // options
                );
                ?>

                <?php
                $Studentitems = ArrayHelper::map(\backend\models\Students::find()->all(), 'id', 'computer_number');
                echo $form->field($model, 'student_id')
                        ->dropDownList(
                                $Studentitems, // Flat array ('id'=>'label')
                                ['prompt' => 'select student']    // options
                );
                ?>

                <?php
                $Courseitems = ArrayHelper::map(\backend\models\Courses::find()->all(), 'id', 'name');
                echo $form->field($model, 'course_id')
                        ->dropDownList(
                                $Courseitems, // Flat array ('id'=>'label')
                                ['prompt' => 'select course']    // options
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
