<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\meeting\models\Equipment */

$this->title = $model->equipment;
$this->params['breadcrumbs'][] = ['label' => 'อุปกรณ์', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-danger box-solid">
    <div class="box-header">
        <h3 class="box-title"> <i class="fa fa-cogs"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">

    <p>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?=Html::img('uploads/equipment/'.$model->photo, ['class' => 'thumbnail', 'width' => 150]) ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'equipment',
            'description:ntext',
            //'photo',
        ],
    ]) ?>
    </div>
</div>
