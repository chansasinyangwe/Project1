<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CourseEnrollment */

$this->title = 'Create Course Enrollment';
$this->params['breadcrumbs'][] = ['label' => 'Course Enrollments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-enrollment-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
