<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\meeting\models\RoomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ห้องประชุม';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-warning box-solid">
    <div class="box-header">
        <h3 class="box-title"> <i class="fa fa-home"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่มห้องประชุม', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'photo',
                'format' => 'html',
                'value' => function($model){
                    return Html::img('uploads/room/'.$model->photo, ['class' => 'thumbnail', 'width' => 120 ]);
                }
            ],
            'name',
            //'description:ntext',
            //'photo',
            //'color',
             [
                'attribute' => 'color',
                 'format' => 'html',
                 'value' => function($model){
                     return '<span style="background-color:'.$model->color.'">'.$model->color.'</style>';
                 }
             ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    </div>
</div>
