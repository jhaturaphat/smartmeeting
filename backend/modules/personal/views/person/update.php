<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Person */

$this->title = 'แก้ไข: ' . ' ' . $person->firstname.' '.$person->lastname;
$this->params['breadcrumbs'][] = ['label' => 'บุคลากร', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $person->firstname.' '.$person->lastname, 'url' => ['view', 'id' => $person->user_id]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"> <i class="fa fa-users"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'person' => $person,
        'user' => $user,
    ]) ?>

    </div>
</div>
