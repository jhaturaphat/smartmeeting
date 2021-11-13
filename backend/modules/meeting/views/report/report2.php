<?php
use miloschuman\highcharts\Highcharts;
use yii\grid\GridView;
?>

<?=  Highcharts::widget([
    'options' => [
        'title' => ['text' => 'รายงานสรุปการจองห้องประชุมแบ่งตามเดือน'],
        'xAxis' => [
            'categories' => [
                'ม.ค.',
                'ก.พ.',
                'ม๊.ค.',
                'เม.ย.',
                'พ.ค.',
                'มิ.ย.',
                'ก.ค.',
                'ส.ค.',
                'ก.ย.',
                'ต.ค.',
                'พ.ย.',
                'ธ.ค.',
            ]
        ],
        'yAxis' => ['title' => ['text' => 'จำนวน(ครั้ง)']],
        'series' => $graph,
    ]
]) ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'attribute' => 'name',
            'label' => 'ห้องประชุม'
        ],
        [
            'attribute' => 'm1',
            'label' => 'ม.ค.'
        ],
        [
            'attribute' => 'm2',
            'label' => 'ก.พ.'
        ],
        [
            'attribute' => 'm3',
            'label' => 'มี.ค.'
        ],
        [
            'attribute' => 'm4',
            'label' => 'เม.ย.'
        ],
        [
            'attribute' => 'm5',
            'label' => 'พ.ค.'
        ],
        [
            'attribute' => 'm6',
            'label' => 'มิ.ย.'
        ],
        [
            'attribute' => 'm7',
            'label' => 'ก.ค.'
        ],
        [
            'attribute' => 'm8',
            'label' => 'ส.ค.'
        ],
        [
            'attribute' => 'm9',
            'label' => 'ก.ย.'
        ],
        [
            'attribute' => 'm10',
            'label' => 'ต.ค.'
        ],
        [
            'attribute' => 'm11',
            'label' => 'พ.ย.'
        ],
        [
            'attribute' => 'm12',
            'label' => 'ธ.ค.'
        ],
    ]
])?>
