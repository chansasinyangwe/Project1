<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CourseEnrollment */

$this->title = 'Update Course Enrollment: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Course Enrollments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="course-enrollment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
