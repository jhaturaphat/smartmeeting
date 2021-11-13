<?php

namespace backend\modules\personal\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;

class DefaultController extends Controller
{
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => TRUE,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action){
                            $module = Yii::$app->controller->module->id;
                            $controller = Yii::$app->controller->id;
                            $action = Yii::$app->controller->action->id;
                            
                            $route = "$module/$controller/$action";
                            
                            if(Yii::$app->user->can($route)){
                                return TRUE;
                            }
                        }
                    ]
                ]
            ]
        ];
    }
    public function actionIndex()
    {
        return $this->render('index');
    }
    
   
}
