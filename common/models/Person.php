<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property integer $user_id
 * @property integer $department_id
 * @property string $firstname
 * @property string $lastname
 * @property string $photo
 * @property string $address
 * @property string $tel
 *
 * @property Meeting[] $meetings
 * @property Department $department
 * @property User $user
 */
class Person extends \yii\db\ActiveRecord {

    public $person_img;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'person';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['user_id', 'department_id', 'firstname', 'lastname'], 'required'],
            [['user_id', 'department_id'], 'integer'],
            [['address'], 'string'],
            [['firstname', 'lastname', 'photo'], 'string', 'max' => 100],
            [['tel'], 'string', 'max' => 45],
            [['person_img'], 'file', 'skipOnEmpty' => TRUE, 'on' => 'update', 'extensions' => 'jpg, png, gif']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'user_id' => 'User ID',
            'department_id' => 'ฝ่าย',
            'firstname' => 'ชื่อ',
            'lastname' => 'นามสกุล',
            'photo' => 'รูปภาพ',
            'address' => 'ที่อยู่',
            'tel' => 'เบอร์โทร',
            'person_img' => 'รูปภาพ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMeetings() {
        return $this->hasMany(Meeting::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment() {
        return $this->hasOne(Department::className(), ['id' => 'department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

}
