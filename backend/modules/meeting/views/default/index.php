<?php
use yii\helpers\Url;

$this->title = 'ปฏิทินการจองห้องประชุม';
?>
<div style='width: 100%; margin: 0 auto;'>
    <div style='width: 100%;'>
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
    </div>
</div>