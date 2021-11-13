<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;


class RbacController extends Controller
{
    public function actionHello() {
        echo 'Hello Somkid.';
    }
    
    public function actionCreatePermission() {
        $auth = Yii::$app->authManager;
        // ส่วนของ บุคล
        $person_default_index = $auth->createPermission('personal/default/index');
        $person_default_index->description = 'หน้าหลักโมดูลบุคคล';
        $auth->add($person_default_index);
        
        $person_person_index = $auth->createPermission('personal/person/index');
        $person_person_index->description = 'รายการบุคคล';
        $auth->add($person_person_index);
        
        $person_person_create = $auth->createPermission('personal/person/create');
        $person_person_create->description = 'เพิ่มบุคล';
        $auth->add($person_person_create);
        
        $person_person_update = $auth->createPermission('personal/person/update');
        $person_person_update->description = 'แก้ไขบุคล';
        $auth->add($person_person_update);
        
        $person_person_delete = $auth->createPermission('personal/person/delete');
        $person_person_delete->description = 'ลบบุคล';
        $auth->add($person_person_delete);
        
        $person_person_view = $auth->createPermission('personal/person/view');
        $person_person_view->description = 'ดูบุคล';
        $auth->add($person_person_view);
        
        
        //ส่วนของ การจองห้อง
        //$meeting_default_index = $auth->createPermission('meeting/default/index');
        //$meeting_default_index->description = "รายการปฏิทินกการจองห้องประชุม";
        //$auth->add($meeting_default_index);
        
        $meeting_equipment_index = $auth->createPermission('meeting/equipment/index');
        $meeting_equipment_index->description = 'รายการอุปกรณ์';
        $auth->add($meeting_equipment_index);
        
        $meeting_equipment_create = $auth->createPermission('meeting/equipment/create');
        $meeting_equipment_create->description = 'เพิ่มอุปกรณ์';
        $auth->add($meeting_equipment_create);
        
        $meeting_equipment_update = $auth->createPermission('meeting/equipment/update');
        $meeting_equipment_update->description = 'แก้ไขอุปกรณ์';
        $auth->add($meeting_equipment_update);
        
        $meeting_equipment_delete = $auth->createPermission('meeting/equipment/delete');
        $meeting_equipment_delete->description = 'ลบอุปกรณ์';
        $auth->add($meeting_equipment_delete);
        
         $meeting_equipment_view = $auth->createPermission('meeting/equipment/view');
        $meeting_equipment_view->description = 'ดูอุปกรณ์';
        $auth->add($meeting_equipment_view);
        
        //ส่วนของการจองห้องประชุม
        $meeting_meeting_index = $auth->createPermission('meeting/meeting/index');
        $meeting_meeting_index->description = 'รายการการจองห้องประชุม';
        $auth->add($meeting_meeting_index);
        
        $meeting_meeting_create = $auth->createPermission('meeting/meeting/create');
        $meeting_meeting_create->description = 'การจองห้องประชุม';
        $auth->add($meeting_meeting_create);
        
        $meeting_meeting_update = $auth->createPermission('meeting/meeting/update');
        $meeting_meeting_update->description = 'แก้ไขการจองห้องประชุม';
        $auth->add($meeting_meeting_update);
        
        $meeting_meeting_delete = $auth->createPermission('meeting/meeting/delete');
        $meeting_meeting_delete->description = 'ลบการจองห้องประชุม';
        $auth->add($meeting_meeting_delete);
        
        $meeting_meeting_view = $auth->createPermission('meeting/meeting/view');
        $meeting_meeting_view->description = 'ดูการจองห้องประชุม';
        $auth->add($meeting_meeting_view);
        
        //ส่วนห้อง
        $meeting_room_index = $auth->createPermission('meeting/room/index');
        $meeting_room_index->description = 'รายการห้องประชุม';
        $auth->add($meeting_room_index);
        
        $meeting_room_create = $auth->createPermission('meeting/room/create');
        $meeting_room_create->description = 'เพิ่มห้องระชุม';
        $auth->add($meeting_room_create);
        
        $meeting_room_update = $auth->createPermission('meeting/room/update');
        $meeting_room_update->description = 'แก้ไขห้องประชุม';
        $auth->add($meeting_room_update);
        
        $meeting_room_delete = $auth->createPermission('meeting/room/delete');
        $meeting_room_delete->description = 'ลบห้องประชุม';
        $auth->add($meeting_room_delete);
        
        $meeting_room_view = $auth->createPermission('meeting/room/view');
        $meeting_room_view->description = 'ดูห้องประชุม';
        $auth->add($meeting_room_view);
        
        //ส่วนของรายงาน
        $meeting_report_report1 = $auth->createPermission('meeting/report/report1');
        $meeting_report_report1->description = 'สรุปการจองห้องประชุมแบ่งตามห้อง';
        $auth->add($meeting_report_report1);
        
        $meeting_report_report2 = $auth->createPermission('meeting/report/report2');
        $meeting_report_report2->description = 'รายงานสรุปการจองห้องประชุมแบ่งตามเดือน';
        $auth->add($meeting_report_report2);
        
        $meeting_report_report3 = $auth->createPermission('meeting/report/report3');
        $meeting_report_report3->description = 'รายงานการจองห้องประชุมแบ่งตามเดือน';
        $auth->add($meeting_report_report3);
        
        echo 'Create permission Complete.';
    }
    
    //สร้าง กฎ
    public function actionCreateRole() {
        
        $auth = Yii::$app->authManager;
        
        $person_default_index = $auth->createPermission('personal/default/index');
         $person_person_view = $auth->createPermission('personal/person/view');
        $person_person_index = $auth->createPermission('personal/person/index');                
        $person_person_create = $auth->createPermission('personal/person/create');                
        $person_person_update = $auth->createPermission('personal/person/update');                
        $person_person_delete = $auth->createPermission('personal/person/delete');
        
        
        //ส่วนของ การจองห้อง
        //$meeting_default_index = $auth->createPermission('meeting/default/index');
        $meeting_equipment_view = $auth->createPermission('meeting/equipment/view');    
        $meeting_equipment_index = $auth->createPermission('meeting/equipment/index');               
        $meeting_equipment_create = $auth->createPermission('meeting/equipment/create');               
        $meeting_equipment_update = $auth->createPermission('meeting/equipment/update');                
        $meeting_equipment_delete = $auth->createPermission('meeting/equipment/delete');
                
        //ส่วนของการจองห้องประชุม
         $meeting_meeting_view = $auth->createPermission('meeting/meeting/view');
        $meeting_meeting_index = $auth->createPermission('meeting/meeting/index');                
        $meeting_meeting_create = $auth->createPermission('meeting/meeting/create');               
        $meeting_meeting_update = $auth->createPermission('meeting/meeting/update');                
        $meeting_meeting_delete = $auth->createPermission('meeting/meeting/delete');
                
        //ส่วนห้อง
        $meeting_room_view = $auth->createPermission('meeting/room/view');   
        $meeting_room_index = $auth->createPermission('meeting/room/index');   
        $meeting_room_create = $auth->createPermission('meeting/room/create');                
        $meeting_room_update = $auth->createPermission('meeting/room/update');                
        $meeting_room_delete = $auth->createPermission('meeting/room/delete');
               
        //ส่วนของรายงาน
        $meeting_report_report1 = $auth->createPermission('meeting/report/report1');                
        $meeting_report_report2 = $auth->createPermission('meeting/report/report2');               
        $meeting_report_report3 = $auth->createPermission('meeting/report/report3');
        
        $user = $auth->createRole('user');
        $auth->add($user);
        $auth->addChild($user, $person_default_index);
        $auth->addChild($user, $person_person_index);
        $auth->addChild($user, $person_person_view);
        $auth->addChild($user, $meeting_equipment_view);
        $auth->addChild($user, $meeting_equipment_index);
        $auth->addChild($user, $meeting_meeting_index);
        $auth->addChild($user, $meeting_meeting_view);
        $auth->addChild($user, $meeting_room_index);
        $auth->addChild($user, $meeting_room_view);
        $auth->addChild($user, $meeting_report_report1);
        $auth->addChild($user, $meeting_report_report2);
        $auth->addChild($user, $meeting_report_report3);
        
        $staff = $auth->createRole('staff');
        $auth->add($staff);     
        $auth->addChild($staff, $meeting_meeting_create);
        $auth->addChild($staff, $user);
        
        $admin = $auth->createRole('admin');
         $auth->add($admin); 
         $auth->addChild($admin, $person_person_create);
         $auth->addChild($admin, $person_person_update);
         $auth->addChild($admin, $person_person_delete);
         $auth->addChild($admin, $meeting_equipment_create);
         $auth->addChild($admin, $meeting_equipment_update);
         $auth->addChild($admin, $meeting_equipment_delete);
         $auth->addChild($admin, $meeting_meeting_update);
         $auth->addChild($admin, $meeting_meeting_delete);
         $auth->addChild($admin, $meeting_room_create);
         $auth->addChild($admin, $meeting_room_update);
         $auth->addChild($admin, $meeting_room_delete);
         $auth->addChild($admin, $staff);
         
         echo 'Create role Complete.';
        
    }
    
    //กำหนดสิทธิผู้ใช้งาน
    public function actionCreateAssignment() {
        $auth = Yii::$app->authManager;
        
        $user = $auth->createRole('user');
        $staff = $auth->createRole('staff');
        $admin = $auth->createRole('admin');
        
        $auth->assign($admin, 6);
        $auth->assign($staff, 5);
        $auth->assign($user, 2);
        
        echo 'create Assigned success!';   
    }
    
    
    // Update Post ของตัวเองได้เท่านั้น
    public function actionCreateRule() {        
        $auth = Yii::$app->authManager;
        
        $rule = new \common\components\StaffRule();
        
        $auth->add($rule);
        
        $updateOenPost = $auth->createPermission('updateOwnPost');
        $updateOenPost->description = 'ปรับปรุงโพสของตัวเอง';
        $updateOenPost->ruleName = $rule->name;
        
        $auth->add($updateOenPost);
        
        $meeting_meeting_update = $auth->createPermission('meeting/meeting/update');
         $auth->addChild($updateOenPost, $meeting_meeting_update);        
         
         $staff = $auth->createPermission('staff');
         $auth->addChild($staff, $updateOenPost);
       
         echo 'Create updateOenPost success!';
    }
    
}
