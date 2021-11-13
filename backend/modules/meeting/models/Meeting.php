<?php

namespace backend\modules\meeting\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use common\models\Person;
/**
 * This is the model class for table "meeting".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $date_start
 * @property string $date_end
 * @property string $created_at
 * @property string $updated_at
 * @property integer $room_id
 * @property integer $user_id
 * @property string $status
 *
 * @property Person $user
 * @property Room $room
 * @property Uses[] $uses
 * @property Equipment[] $equipment
 */
class Meeting extends \yii\db\ActiveRecord
{
    
    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'value' => new Expression('NOW()'),
            ]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'meeting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'date_start', 'date_end', 'room_id', 'user_id'], 'required'],
            [['id', 'room_id', 'user_id'], 'integer'],
            [['description', 'status'], 'string'],
            [['date_start', 'date_end', 'created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'เรื่อง',
            'description' => 'รายละเอียด',
            'date_start' => 'เริ่ม',
            'date_end' => 'สิ้นสุด',
            'created_at' => 'เพิ่มเมื่อ',
            'updated_at' => 'แก้ไขเมื่อ',
            'room_id' => 'ห้อง',
            'user_id' => 'ผู้จอง',
            'status' => 'สถานะ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Person::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(Room::className(), ['id' => 'room_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUses()
    {
        return $this->hasMany(Uses::className(), ['meeting_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipment()
    {
        return $this->hasMany(Equipment::className(), ['id' => 'equipment_id'])->viaTable('uses', ['meeting_id' => 'id']);
    }
}
