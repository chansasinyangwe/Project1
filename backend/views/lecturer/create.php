<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Lecturer */

$this->title = 'Create Lecturer';
$this->params['breadcrumbs'][] = ['label' => 'Lecturers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lecturer-create">

  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
