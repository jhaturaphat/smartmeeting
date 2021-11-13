<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\Department;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\department\models\DepartmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'ฝ่าย/แผนก';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title">
            <i class="fa fa-group"></i><?= Html::encode($this->title) ?>
        </h3>
    </div>
    <div class="box-body">
        <p>
            <?= Html::a('เพิ่มแผนก', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?= 
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                //'id',
                'department',                
                ['class' => 'yii\grid\ActionColumn'],
            ]
        ])
        ?>

    </div>
</div>