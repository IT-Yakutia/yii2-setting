<?php

namespace ityakutia\setting\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Setting extends ActiveRecord
{
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    public static function tableName()
    {
        return 'setting';
    }

    public function rules()
    {
        return [
            [['title', 'value'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['title', 'value'], 'string', 'max' => 255],
            [['title'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'title' => 'Title',
            'value' => 'Value',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function valueOf($key)
    {
        $setting = self::find()->where(['key' => $key])->one();
        return $setting !== null ? $setting->value : null;
    }
}
