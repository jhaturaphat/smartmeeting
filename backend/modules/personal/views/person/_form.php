<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Department;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\Person */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="person-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($user, 'username')->textInput() ?>
    
    <?= $form->field($user, 'password_hash')->textInput() ?>
    
    <?= $form->field($user, 'email')->textInput() ?>

    <?= $form->field($person, 'firstname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($person, 'lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($person, 'person_img')->fileInput() ?>

    <?= $form->field($person, 'address')->textarea(['rows' => 6]) ?>

    <?= $form->field($person, 'tel')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($person, 'department_id')->dropDownList(ArrayHelper::map(Department::find()->all(), 'id', 'department')) ?>

    <div class="form-group">
        <?= Html::submitButton($person->isNewRecord ? 'Create' : 'Update', ['class' => $person->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
