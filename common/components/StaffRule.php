<?php
namespace common\components;

use Yii;
use yii\rbac\Rule;

class StaffRule extends Rule{
    
    public $name = 'isStaff';
    public function execute($user, $item, $params) {
        if(isset($params['model'])){
            $model = $params['model'];
        }else{
            $id = Yii::$app->request->get('id');
            $model = Yii::$app->controller->findUserModel($id);
        }
        return $model->user_id === $user;
    }

}