<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Person */

$this->title = $person->firstname.' '.$person->lastname;
$this->params['breadcrumbs'][] = ['label' => 'บุคลากร', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"> <i class="fa fa-users"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">

        <p>
            <?= Html::a('แก้ไข', ['update', 'id' => $person->user_id], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a('ลบ', ['delete', 'id' => $person->user_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </p>
        <div class="text-center">
            <?=Html::img('uploads/person/'.$person->photo, ['class'=> 'img-responsive', 'width' => 100]); ?>
        </div>
        <?=
        DetailView::widget([
            'model' => $person,
            'attributes' => [
                'user.username',
                'user.email',                
                'firstname',
                'lastname',                
                'address:ntext',
                'tel',
                //'photo',
                'department.department',
            ],
        ])
        ?>

    </div>
</div>
