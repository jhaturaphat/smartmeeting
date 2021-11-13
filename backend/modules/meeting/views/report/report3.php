<?php

use yii\grid\GridView;
?>
<h4>รายงานการจองห้องประชุมแบ่งตามเดือน</h4>

<?=
GridView::widget([
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
])
?>