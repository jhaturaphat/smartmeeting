<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\meeting\models\Meeting */

$this->title = 'แก้ไข: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'การจองห้องประชุม', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="box box-info box-solid">
    <div class="box-header">
        <h3 class="box-title"> <i class="fa fa-calendar-check-o"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">

    <?= $this->render('_form', [
        'model' => $model,
        'equipments' => $equipments,
    ]) ?>
    </div>
</div>
