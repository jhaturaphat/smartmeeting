<?php
namespace backend\modules\meeting\components;

use yii\base\Component;

class Meeting extends Component{
    public function getMeetingStatus($status = NULL) {
        if($status == 0){
            $r = '<span class="label label-warning">รออนุมัติ</span>';
        }else if ($status == 1) {
            $r = '<span class="label label-success">อนุมัติ</span>';
        }else if($status == 2){
            $r = '<span class="label label-danger">ยกเลิก</span>';
        }
        return $r;
    }
}