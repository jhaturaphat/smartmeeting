<?php

namespace backend\modules\meeting\models;

use Yii;

/**
 * This is the model class for table "uses".
 *
 * @property integer $meeting_id
 * @property integer $equipment_id
 *
 * @property Equipment $equipment
 * @property Meeting $meeting
 */
class Uses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'uses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['meeting_id', 'equipment_id'], 'required'],
            [['meeting_id', 'equipment_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'meeting_id' => 'การจอง',
            'equipment_id' => 'อุปกรณ์',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipment()
    {
        return $this->hasOne(Equipment::className(), ['id' => 'equipment_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMeeting()
    {
        return $this->hasOne(Meeting::className(), ['id' => 'meeting_id']);
    }
}
