<?php

namespace backend\modules\personal\controllers;

use Yii;
use common\models\Person;
use backend\modules\personal\models\PersonSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\User;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * PersonController implements the CRUD actions for Person model.
 */
class PersonController extends Controller {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
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

    /**
     * Lists all Person models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new PersonSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Person model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'person' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Person model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $user = new User();
        $person = new Person();

        if ($person->load(Yii::$app->request->post()) && $user->load(Yii::$app->request->post())) {
            $user->password_hash = Yii::$app->security->generatePasswordHash($user->password_hash);
            $user->auth_key = Yii::$app->security->generateRandomString();

            $person->person_img = UploadedFile::getInstance($person, 'person_img');
            if ($person->person_img->size != 0) {

                $user->save();
                $person->photo = $user->id . '.' . $person->person_img->extension;
                $person->person_img->saveAs('uploads/person/' . $user->id . '.' . $person->person_img->extension);
                $person->user_id = $user->id;

                $person->save();
            } else {
                Yii::$app->session->setFlash('error', 'เกิดข้อผิดพลาด');
            }
            return $this->redirect(['view', 'id' => $person->user_id]);
        } else {
            return $this->render('create', [
                        'person' => $person,
                        'user' => $user,
            ]);
        }
    }

    /**
     * Updates an existing Person model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $person = $this->findModel($id);
        $user = $person->user; //$user = User::findOne($model->user_id);

        $oldPass = $user->password_hash;

        if ($person->load(Yii::$app->request->post()) && $user->load(Yii::$app->request->post())) {
            if ($oldPass != $user->password_hash) { //กรณี เปลี่ยนรหัสผ่าน
                $user->password_hash = Yii::$app->security->generatePasswordHash($user->password_hash);
            }
            //ตรวสอบว่ามีการอัพโหลดไฟล์ไหม
            $person->person_img = UploadedFile::getInstance($person, 'person_img');
            if (isset($person->person_img->size) && $person->person_img->size != 0) {
                $person->person_img->saveAs('uploads/person/'.$id.'.'.$person->person_img->extension);
                $person->photo = $id.'.'.$person->person_img->extension;
            }
            //Save Model ซะ
            if ($user->save()) {                
                $person->save();
            }

            return $this->redirect(['view', 'id' => $person->user_id]);
        } else {
            return $this->render('update', [
                        'person' => $person,
                        'user' => $user,
            ]);
        }
    }

    /**
     * Deletes an existing Person model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Person model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Person the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Person::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
}
