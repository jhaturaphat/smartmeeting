<?php

namespace frontend\modules\meeting\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;
use backend\modules\meeting\models\Meeting;
use yii\data\ArrayDataProvider;

class DefaultController extends Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionJsoncalendar($start = NULL, $end = NULL, $_ = NULL) {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $meeting = \backend\modules\meeting\models\Meeting::find()->all();

        $events = [];

        foreach ($meeting as $time) {
            $Event = new \yii2fullcalendar\models\Event();
            $Event->id = $time->id;
            $Event->title = $time->title . '(' . $time->room->name . ')';
            $Event->start = $time->date_start;
            $Event->end = $time->date_end;
            $Event->color = $time->room->color;
            $Event->url = Url::to(['/meeting/default/view', 'id' => $time->id]);

            $events[] = $Event;
        }
        return $events;
    }

    public function actionView($id) {
        $model = Meeting::findOne($id);
        return $this->render('view', [
                    'model' => $model,
                    'dataProvider' => new ArrayDataProvider(['allModels' => $model->uses]),
        ]);
    }

}
