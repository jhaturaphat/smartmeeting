<?php

namespace backend\modules\meeting\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use backend\modules\meeting\models\Meeting;
use yii\helpers\Url;

class DefaultController extends Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionJsoncalendar($start = NULL, $end = NULL, $_ = NULL) {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $meeting = Meeting::find()->all();

        $events = [];

        foreach ($meeting as $time) {
            $Event = new \yii2fullcalendar\models\Event();
            $Event->id = $time->id;
            $Event->title = $time->title . '(' . $time->room->name . ')';
            $Event->start = $time->date_start;
            $Event->end = $time->date_end;
            $Event->color = $time->room->color;
            $Event->url = Url::to(['/meeting/meeting/view', 'id' => $time->id]);

            $events[] = $Event;
        }
        return $events;
    }    
}
