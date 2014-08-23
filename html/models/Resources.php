<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\VarDumper;

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
            'schedulde'=>'http://ncdevcon.com/page.cfm/schedule-1',
            'home'=>'http://ncdevcon.com/'
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

    public static function parseBody($html)
    {
        return substr($html,strpos($html,'<body>'));
    }

    public static function parseSessions($html)
    {
        error_reporting(E_ALL);
        ini_set('display_errors',1);
        $sessions = [];
        $html = self::parseBody($html);
        $spos = strpos($html,'<tr>');
        $epos = strpos($html,'</tr>');
        $category='';

        for($i=0;$i<=substr_count($html,'<tr>');$i++){

            $content = substr($html,$spos, $epos-$spos);

            if(strpos($content,'<th>') === false){
                if(strpos($content,'colspan="2"') !== false){
                    //echo 'Category'."<br />";
                    $category = preg_replace("/[\n\r]/","", strip_tags($content) );
                    $category = trim(preg_replace('/\t+/', '', $category));
                    $sessions['categories'][]=$category;
                }else{
                    $start_title = strpos($content,'<h3>')+4;
                    $start_description = strpos($content,'<p>')+3;
                    $start_author = strpos($content,'</td>')+9;
                    $start_author_name = strpos($content,'<h3>',$start_author)+4;
                    $start_author_description = strpos($content,'<p>',$start_author_name)+3;

                    $author_description = substr($content,$start_author_description, strpos($content,'</p>', $start_author_description)-$start_author_description);
                    $a_img_s = strpos($author_description,'<img');
                    $a_img_e = strpos($author_description,'" />')+4;
                    $a_img = substr($author_description,$a_img_s,$a_img_e-$a_img_s);
                    $author_description = str_replace($a_img,'',$author_description);
                    $a_img = str_replace('" />','',substr($a_img,strpos($a_img,'src="')+5));

                    $sessions['sessions'][] = [
                        'category'=>$category,
                        'description'=>substr($content,$start_description, strpos($content,'</p>')-$start_description),
                        'title'=>substr($content,$start_title, strpos($content,'</h3>')-$start_title),
                        'author'=>[
                            'name'=>substr($content,$start_author_name, strpos($content,'</h3>', $start_author_name)-$start_author_name),
                            'description'=>$author_description,
                            'image'=>$a_img
                        ],
                    ];
                }
            }

            $spos = strpos($html,'<tr>', $spos+4);
            $epos = strpos($html,'</tr>', $spos+4);

        }

        $sessions['categories'] = array_unique($sessions['categories']);

        return $sessions;
    }
}