<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\modules\meeting\models\Room;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\meeting\models\MeetingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'การจองห้องประชุม';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-info box-solid">
    <div class="box-header">
        <h3 class="box-title"> <i class="fa fa-calendar-check-o"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('จองห้องประชุม', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title',
            //'description:ntext',
            'date_start',
            'date_end',
            // 'created_at',
            // 'updated_at',
             //'room_id',
            [
                'attribute' => 'room_id',
                'value' => function($model){
                    return $model->room->name;
                },
                'filter' => Html::activeDropDownList($searchModel, 'room_id', ArrayHelper::map(Room::find()->all(),'id', 'name'),['class'=>'form-control'])
            ],
             //'user_id',
            [
                 'attribute' => 'user_id',
                 'value' => function($model){
                     return $model->user->firstname.' '.$model->user->lastname;
                 }
            ],
             //'status',
            [
                'attribute' => 'status',
                'format'=>'html',
                'value' => function ($model){
                    return Yii::$app->meeting->getMeetingStatus($model->status);
                }
                ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>
</div>
