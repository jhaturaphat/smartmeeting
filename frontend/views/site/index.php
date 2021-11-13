<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'ระบบจองห้องประชุมออนไลน์';

//Yii::$app->db->open(); 
?>

<?= yii2fullcalendar\yii2fullcalendar::widget([
       'header' => [
           'left' => 'prev,next today',
           'center' => 'title',
           'right' => 'month, agendaWeek, adgendaDay'
       ],
    'clientOptions' => [
      'lang' => 'th',
        'lazyFetching' => true,
        'timeFormat' => 'H:mm',
        'forceEventDuration' => true,
        'ignoreTimezone' => true
    ],
      'ajaxEvents' => Url::to(['/meeting/default/jsoncalendar'])
    ]);
?>