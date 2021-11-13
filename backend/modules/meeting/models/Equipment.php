<?php

namespace backend\modules\meeting\models;

use Yii;

/**
 * This is the model class for table "equipment".
 *
 * @property integer $id
 * @property string $equipment
 * @property string $description
 * @property string $photo
 *
 * @property Uses[] $uses
 * @property Meeting[] $meetings
 */
class Equipment extends \yii\db\ActiveRecord
{
    public $equipment_img;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'equipment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['equipment', 'description', 'photo'], 'required'],
            [['id'], 'integer'],
            [['description'], 'string'],
            [['equipment', 'photo'], 'string', 'max' => 45],
            [['equipment_img'], 'file', 'skipOnEmpty' => TRUE, 'on' => 'update', 'extensions'=>'jpg, gif, png']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'equipment' => 'อุปกรณ์',
            'description' => 'รายละเอียด',
            'photo' => 'รูป',
            'equipment_img' => 'รูปอุประกรณ์'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUses()
    {
        return $this->hasMany(Uses::className(), ['equipment_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMeetings()
    {
        return $this->hasMany(Meeting::className(), ['id' => 'meeting_id'])->viaTable('uses', ['equipment_id' => 'id']);
    }
}
