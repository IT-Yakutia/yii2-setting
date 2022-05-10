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
            [['title', 'value', 'key'], 'required'],
            [['status', 'created_at', 'updated_at', 'is_publish'], 'integer'],
            [['title', 'value'], 'string', 'max' => 255],
            [['key', 'title'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Ключ',
            'title' => 'Название',
            'value' => 'Значение',
            'status' => 'Status',
            'created_at' => 'Создан',
            'updated_at' => 'Изменен',
            'is_publish' => 'Опубликовать',
        ];
    }

    public static function valueOf($key, $template = '')
    {
        $setting = self::find()->where(['key' => $key])->one();
        if( $setting === null ){
            $setting = new self();
            $setting->key = $key;
            $setting->value = $key;
            $setting->title = $key;
            if(!$setting->save())
                return $setting->errors;
        }
        if(empty($template))
            return $setting->value;
        else{
            if($setting->is_publish)
                return self::mb_str_replace('[[value]]', $setting->value, $template);
        }
    }

    public static function mb_str_replace($search, $replace, $string)
    {
        $charset = mb_detect_encoding($string);

        $unicodeString = iconv($charset, "UTF-8", $string);
        
        return str_replace($search, $replace, $unicodeString);
    }
}
