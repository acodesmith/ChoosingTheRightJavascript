<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class Resources extends Model
{
    const LOCATION = 'data';

    public static function getList()
    {
        return [
            'sessions'=>'http://ncdevcon.com/page.cfm/sessions',
            'schedulde'=>'http://ncdevcon.com/page.cfm/schedule-1'
        ];
    }

    public static function curlList()
    {
        include(Yii::getAlias('@vendor').'/Curl/Curl.php');
        $curl = new \Curl();

        foreach(Resources::getList() as $file=>$resource){

            $fp = fopen(Yii::getAlias('@app').'/'.Resources::LOCATION.'/'.$file.'.html', 'a');

            $contents = $curl->get($resource);
            fwrite($fp, $contents);
            fclose($fp);
        }

        return Resources::getList();
    }

    public static function get($page)
    {
        return file_get_contents(Yii::getAlias('@app').'/'.Resources::LOCATION.'/'.$page.'.html');
    }

    public static function parseSessions($html)
    {
        $sessions = [];
        $spos = strpos($html,'<tr>');
        $epos = strpos($html,'</tr>');
        $category='';

        for($i=0;$i<=substr_count($html,'<tr>');$i++){

            $content = substr($html,$spos, $epos-$spos);

            if(strpos($content,'colspan') !== false){
                $category = strip_tags($content);
                $sessions['categories'][]=$category;
            }else{
                $sessions['sessions'] = [
                    'category'=>$category,
                    'content'=>$content
                ];
            }

            $html = str_replace($content,'',$html);
            $spos = strpos($html,'<tr>');
            $epos = strpos($html,'</tr>');

        }

        return $sessions;
    }
}