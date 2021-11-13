<?php
use miloschuman\highcharts\Highcharts;
use yii\grid\GridView;
use yii\helpers\Html;

$this->title = "สรุปการจองห้องประชุมแบ่งตามห้อง";
?>
<div class="box box-info box-solid">
    <div class="box-header">
        <h3 class="box-title"> <i class="fa fa-bar-chart"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">
<?= Highcharts::widget([
   'options' => [
       'chart' => [
            'type' => 'column' // bar
        ],
       'title' => ['text' => 'สรุปการจองห้องประชุมแบ่งตามห้อง'],
       //'subtitle' => [
       //    'text' => 'Click the columns to view versions. Source: <a href="http://netmarketshare.com">netmarketshare.com</a>.'
       //],
       'plotOptions' => [
            'series' => [
                //'pointWidth' => 50,
                //'borderWidth' => 0,
                'dataLabels' => [
                    'enabled' => true,
                    'format' => '{point.y} ครั้ง' //'{point.y:.1f}%' out put 0.00%
                ]
            ]
        ],
       'xAxis' => [
           'categories' => ['จำนวน(ครั้ง)']
       ],
       'yAxis' => [
           'title' => ['text' => 'จำนวน(ครั้ง)']
       ],
       'series' => $graph,
   ]
]); ?>
    </div>
</div>
    
    <div class="box box-info box-solid">
    <div class="box-header">
        <h3 class="box-title"> <i class="fa fa-bar-chart"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">
        
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'attribute' => 'name',
            'label' => 'ห้องประชุม'
        ],
        [
            'attribute' => 'mid',
            'label' => 'จำนวน(ครั้ง)'
        ]
    ]
]) ?>
    </div>
   </div>