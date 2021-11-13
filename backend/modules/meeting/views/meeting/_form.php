<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\meeting\models\Room;
use yii\helpers\ArrayHelper;
use dosamigos\datetimepicker\DateTimePicker;
use backend\modules\meeting\models\Uses;

/* @var $this yii\web\View */
/* @var $model backend\modules\meeting\models\Meeting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="meeting-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date_start')->widget(DateTimePicker::className(), [
    'language' => 'th',    
    'template' => '{input}',
    'pickButtonIcon' => 'glyphicon glyphicon-time',
    'inline' => false,
    'clientOptions' => [        
        'autoclose' => true,        
        'format' => 'yyyy-mm-dd HH:ii:00', // if inline = false
        'todayBtn' => true,
        'startDate' => date("Y-m-d H:i:s"),
        'todayHighlight' => TRUE,
        'minuteStep' => 5,
    ]
]) ?>

    <?= $form->field($model, 'date_end')->widget(DateTimePicker::className(), [
    'language' => 'th',    
    'template' => '{input}',
    'pickButtonIcon' => 'glyphicon glyphicon-time',
    'inline' => false,
    'clientOptions' => [        
        'autoclose' => true,        
        'format' => 'yyyy-mm-dd HH:ii:00', // if inline = false
        'todayBtn' => true,
        'startDate' => date("Y-m-d H:i:s"),
        'todayHighlight' => TRUE,
        'minuteStep' => 5,
    ]
]) ?>

    <?= $form->field($model, 'room_id')->dropDownList(ArrayHelper::map(Room::find()->all(), 'id', 'name'),
        ['prompt'=>'- เลือกห้องประชุม -']) 
    ?>

    <h4>รายการอุปกรณ์ที่ต้องการใช้</h4>
    <?php 
    foreach ($equipments as $e) {        
        if(!$model->isNewRecord){ ///ถ้าเป็นการแก้ไข
        $u = Uses::findOne(['equipment_id' => $e->id, 'meeting_id' => $model->id]);  
            if(!empty($u['equipment_id'])){
                $selected = 'checked="checked"';
            }else{
                $selected = '';
            }
        }  else {
            $selected = '';
        }
        ?>
    <label class="checkbox-inline">
        <input name="Equip[]" type="checkbox" value="<?= $e->id?>" id="inlineCheckbox<?= $e->id?>" <?= $selected ?>> <?= $e->equipment?>
    </label>
    <?php } ?>
    <div class="text-right">
        <?= Html::submitButton($model->isNewRecord ? 'จองห้องประชุม' : 'แก้ไขการจอง', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
