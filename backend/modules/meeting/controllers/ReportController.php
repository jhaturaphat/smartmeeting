<?php

namespace backend\modules\meeting\controllers;

use Yii;
use yii\data\ArrayDataProvider;
use kartik\mpdf\Pdf;
use yii\filters\AccessControl;
class ReportController extends \yii\web\Controller
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

    public function actionReport1()
    {
        $sql ="SELECT COUNT(m.id) AS mid, r.name
               FROM meeting m
               LEFT JOIN room r ON r.id = m.room_id
               GROUP BY m.room_id";
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        
        $graph = [];
        foreach ($data as $d){
            $graph[] = [
                //'type' => 'column', //type => column,bar ใส่ที่หน้า view ก็ได้ ตรง javascript
                'name' => $d['name'], //name
                'data' => [intval($d['mid'])]
            ];
        }
        
        
        //สร้างตาราง
        $dataProvider = new ArrayDataProvider([
            'allModels' => $data,
            'sort' => [
                'attributes' => ['mid', 'name'], //ทำให้สามารถเรียงลำดับได้
            ]
        ]);
        
        return $this->render('report1',[
            'graph' => $graph,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionReport2()
    {
        $y = date("Y", time());
        $sql = "SELECT r.name, 
                COUNT(IF(MONTH(m.date_start)=1,m.id,NULL)) AS m1,
                COUNT(IF(MONTH(m.date_start)=2,m.id,NULL)) AS m2,
                COUNT(IF(MONTH(m.date_start)=3,m.id,NULL)) AS m3,
                COUNT(IF(MONTH(m.date_start)=4,m.id,NULL)) AS m4,
                COUNT(IF(MONTH(m.date_start)=5,m.id,NULL)) AS m5,
                COUNT(IF(MONTH(m.date_start)=6,m.id,NULL)) AS m6,
                COUNT(IF(MONTH(m.date_start)=7,m.id,NULL)) AS m7,
                COUNT(IF(MONTH(m.date_start)=8,m.id,NULL)) AS m8,
                COUNT(IF(MONTH(m.date_start)=9,m.id,NULL)) AS m9,
                COUNT(IF(MONTH(m.date_start)=10,m.id,NULL)) AS m10,
                COUNT(IF(MONTH(m.date_start)=11,m.id,NULL)) AS m11,
                COUNT(IF(MONTH(m.date_start)=12,m.id,NULL)) AS m12
                FROM meeting m
                LEFT JOIN room r ON r.id = m.room_id
                WHERE YEAR(m.date_start) = '".$y."'
                GROUP BY r.id
                ";
       
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        
        $graph = [];
        
        foreach ($data as $d){
            $graph[] = [
                'name' => $d['name'],
                'data' => [
                    intval($d['m1']),
                    intval($d['m2']),
                    intval($d['m3']),
                    intval($d['m4']),
                    intval($d['m5']),
                    intval($d['m6']),
                    intval($d['m7']),
                    intval($d['m8']),
                    intval($d['m9']),
                    intval($d['m10']),
                    intval($d['m11']),
                    intval($d['m12']),
                    ]
            ];
        }
        
         $dataProvider = new ArrayDataProvider([
            'allModels' => $data,
             'sort' => [
                 'attributes' => ['name', 'm1','m2','m3','m4','m5','m6','m7','m8','m9','m10','m11','m12',]
             ]
        ]);
        
        return $this->render('report2',[
            'graph' => $graph,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionReport3()
    {
        $y = date("Y", time());
        $sql = "SELECT r.name, 
                COUNT(IF(MONTH(m.date_start)=1,m.id,NULL)) AS m1,
                COUNT(IF(MONTH(m.date_start)=2,m.id,NULL)) AS m2,
                COUNT(IF(MONTH(m.date_start)=3,m.id,NULL)) AS m3,
                COUNT(IF(MONTH(m.date_start)=4,m.id,NULL)) AS m4,
                COUNT(IF(MONTH(m.date_start)=5,m.id,NULL)) AS m5,
                COUNT(IF(MONTH(m.date_start)=6,m.id,NULL)) AS m6,
                COUNT(IF(MONTH(m.date_start)=7,m.id,NULL)) AS m7,
                COUNT(IF(MONTH(m.date_start)=8,m.id,NULL)) AS m8,
                COUNT(IF(MONTH(m.date_start)=9,m.id,NULL)) AS m9,
                COUNT(IF(MONTH(m.date_start)=10,m.id,NULL)) AS m10,
                COUNT(IF(MONTH(m.date_start)=11,m.id,NULL)) AS m11,
                COUNT(IF(MONTH(m.date_start)=12,m.id,NULL)) AS m12
                FROM meeting m
                LEFT JOIN room r ON r.id = m.room_id
                WHERE YEAR(m.date_start) = '".$y."'
                GROUP BY r.id
                ";
       
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        
         $dataProvider = new ArrayDataProvider([
            'allModels' => $data,            
        ]);
        
        // get your HTML raw content without any layouts or scripts
    $content = $this->renderPartial('report3',['dataProvider' => $dataProvider]);

    // setup kartik\mpdf\Pdf component
    $pdf = new Pdf([
        // set to use core fonts only
        'mode' => Pdf::MODE_UTF8, 
        // A4 paper format
        'format' => Pdf::FORMAT_A4, 
        // portrait orientation
        'orientation' => Pdf::ORIENT_PORTRAIT, 
        // stream to browser inline
        'destination' => Pdf::DEST_BROWSER, 
        // your html content input
        'content' => $content,  
        // format content from your own css file if needed or use the
        // enhanced bootstrap css built by Krajee for mPDF formatting 
        'cssFile' => '@backend/web/css/kv-mpdf-bootstrap.css',
        // any css to be embedded if required
        'cssInline' => '.kv-heading-1{font-size:18px}', 
         // set mPDF properties on the fly
        'options' => ['title' => 'Krajee Report Title'],
         // call mPDF methods on the fly
        'methods' => [ 
            'SetHeader'=>['รายงานการจองห้องประชุมแบ่งตามเดือน'], 
            'SetFooter'=>['{PAGENO}'],
        ]
    ]);

    // return the pdf output as per the destination setting
    return $pdf->render(); 
    }

    public function actionReport4()
    {
        return $this->render('report4');
    }

}
