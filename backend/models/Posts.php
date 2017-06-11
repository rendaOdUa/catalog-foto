<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $imageUrl
 * @property string $avatarUrl
 * @property string $date
 */
class Posts extends \yii\db\ActiveRecord
{

    public $imageFiles;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['date'], 'safe'],
            [['name', 'description', 'imageUrl'], 'string', 'max' => 255],
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, gif, jpeg', 'maxFiles' => 0],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'imageUrl' => 'Image Url',
            'date' => 'Date',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $urlUp = Yii::getAlias('@root'). '/frontend/web/uploads/' . $this->id . "/" . $this->str2url($this->name);
            $this->imageUrl = '/uploads/' . $this->id . "/" . $this->str2url($this->name);
            $this->avatarUrl = '/uploads/' . $this->id . "/" . $this->str2url($this->name). "/" .$this->imageFiles[0]->baseName. '.' . $this->imageFiles[0]->extension;
            if(!is_dir($urlUp)){
                mkdir($urlUp, 0700, true);
            } else {
                $this->delFolder($urlUp);
                mkdir($urlUp, 0700, true);
            }
                foreach ($this->imageFiles as $file) {
                    $file->saveAs($urlUp . "/" . $this->str2url($file->baseName) . '.' . $file->extension);
                }
            return true;
        } else {
            return false;
        }
    }

    public function delFolder($dir)
    {
    $files = array_diff(scandir($dir), array('.','..'));
    foreach ($files as $file) {
    (is_dir("$dir/$file")) ? delFolder("$dir/$file") : unlink("$dir/$file");
    }
    return rmdir($dir);
    }

    public function rus2translit($string) {
    $converter = array(
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
        
        'А' => 'A',   'Б' => 'B',   'В' => 'V',
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',
        'С' => 'S',   'Т' => 'T',   'У' => 'U',
        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
        'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
    );
    return strtr($string, $converter);
    }
    public function str2url($str) {
    // переводим в транслит
    $str = $this->rus2translit($str);
    // в нижний регистр
    $str = strtolower($str);
    // заменям все ненужное нам на "-"
    $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
    // удаляем начальные и конечные '-'
    $str = trim($str, "-");
    return $str;
    }
}
