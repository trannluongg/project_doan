<?php
/**
 * Created by PhpStorm.
 * User: Hungokata
 * Date: 2/6/18
 * Time: 4:09 PM
 */

namespace App\Core123\Helper;

class StringHelper
{
    private static $instance = null;

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }


    public static function removeAccent($mystring)
    {
        $marTViet = array(
            // Chữ thường
            "à", "á", "ạ", "ả", "ã", "â", "ầ", "ấ", "ậ", "ẩ", "ẫ", "ă", "ằ", "ắ", "ặ", "ẳ", "ẵ",
            "è", "é", "ẹ", "ẻ", "ẽ", "ê", "ề", "ế", "ệ", "ể", "ễ",
            "ì", "í", "ị", "ỉ", "ĩ",
            "ò", "ó", "ọ", "ỏ", "õ", "ô", "ồ", "ố", "ộ", "ổ", "ỗ", "ơ", "ờ", "ớ", "ợ", "ở", "ỡ",
            "ù", "ú", "ụ", "ủ", "ũ", "ư", "ừ", "ứ", "ự", "ử", "ữ",
            "ỳ", "ý", "ỵ", "ỷ", "ỹ",
            "đ", "Đ", "'",
        );

        $marKoDau = array(
            /// Chữ thường
            "a", "a", "a", "a", "a", "â", "â", "â", "â", "â", "â", "ă", "ă", "ă", "ă", "ă", "ă",
            "e", "e", "e", "e", "e", "ê", "ê", "ê", "ê", "ê", "ê",
            "i", "i", "i", "i", "i",
            "o", "o", "o", "o", "o", "ô", "ô", "ô", "ô", "ô", "ô", "ơ", "ơ", "ơ", "ơ", "ơ", "ơ",
            "u", "u", "u", "u", "u", "ư", "ư", "ư", "ư", "ư", "ư",
            "y", "y", "y", "y", "y",
            "đ", "đ", "",
        );

        return str_replace($marTViet, $marKoDau, $mystring);
    }

    /**
     * B Search keyword bôi đậm
     * @param $key
     * @param $title
     * @return bool|string
     */
    public function searchKeyword($key, $title)
    {
        //Bẻ từ khóa để bôi đậm.
        $search_text       = mb_strtolower(remove_accent($key), "UTF-8");
        $title_lower       = mb_strtolower(remove_accent($title), 'UTF-8');
        $search_text_array = explode(" ", $search_text);
        $search_text_array = array_unique($search_text_array);

        //Boi dam title.
        $arrTitle      = explode(' ', $title);
        $arrTitleLower = explode(' ', $title_lower);
        $strRet        = '';

        for ($i = 0; $i < count($arrTitleLower); $i++) {
            if (in_array($arrTitleLower[$i], $search_text_array)) {
                $strRet .= '<b>' . $arrTitle[$i] . '</b>' . ' ';
            }
            else
                $strRet .= $arrTitle[$i] . ' ';
        }

        if ($strRet != '') $strRet = substr($strRet, 0, -1);

        //Chủ động unset trc khi trả về.
        unset($arrTitle);
        unset($arrTitleLower);
        unset($search_text_array);

        return $strRet;
    }

    public function random()
    {
        $rand_value = "";
        $rand_value .= rand(1000, 9999);
        $rand_value .= chr(rand(65, 90));
        $rand_value .= rand(1000, 9999);
        $rand_value .= chr(rand(97, 122));
        $rand_value .= rand(1000, 9999);
        $rand_value .= chr(rand(97, 122));
        $rand_value .= rand(1000, 9999);

        return $rand_value;
    }

    public static function convertStrToLower($str)
    {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/([\s]+)/', ' ', $str);

        return $str;
    }

    /*
	Remove HTML truoc khi add vao database
	*/
    public static function htmlSpecialbo($str)
    {
        $arrDenied  = array('<', '>', '"');
        $arrReplace = array('&lt;', '&gt;', '&quot;');
        $str        = str_replace($arrDenied, $arrReplace, $str);

        return $str;
    }

    /**
     * cut_string()
     *
     * @param mixed  $str
     * @param mixed  $length
     * @param string $char
     * @return
     */
    public function cut_string($str, $length, $char = " ...")
    {
        //Nếu chuỗi cần cắt nhỏ hơn $length thì return luôn
        $strlen = mb_strlen($str, "UTF-8");
        if ($strlen <= $length) return $str;

        //Cắt chiều dài chuỗi $str tới đoạn cần lấy
        $substr = mb_substr($str, 0, $length, "UTF-8");
        if (mb_substr($str, $length, 1, "UTF-8") == " ") return $substr . $char;

        //Xác định dấu " " cuối cùng trong chuỗi $substr vừa cắt
        $strPoint = mb_strrpos($substr, " ", "UTF-8");

        //Return string
        if ($strPoint < $length - 20) return $substr . $char;
        else return mb_substr($substr, 0, $strPoint, "UTF-8") . $char;
    }

    /**
     * Convert kí tự về dạng chuẩn
     * @param $string
     * @return mixed
     */
    public function replaceStringStandard($string)
    {
        $specialCharacters  = [
            'á', 'à', 'ả', 'ạ', 'ã',
            'ắ', 'ằ', 'ẳ', 'ặ', 'ẵ',
            'ấ', 'ầ', 'ẩ', 'ậ', 'ẫ',
            'é', 'è', 'ẻ', 'ẹ', 'ẽ',
            'ế', 'ề', 'ể', 'ệ', 'ễ',
            'í', 'ì', 'ỉ', 'ị', 'ĩ',
            'ó', 'ò', 'ỏ', 'ọ', 'õ',
            'ố', 'ồ', 'ổ', 'ộ', 'ỗ',
            'ớ', 'ờ', 'ở', 'ợ', 'ỡ',
            'ú', 'ù', 'ủ', 'ụ', 'ũ',
            'ứ', 'ừ', 'ử', 'ự', 'ữ',
            'ý', 'ỳ', 'ỷ', 'ỵ', 'ỹ',
        ];
        $standardCharacters = [
            'á', 'à', 'ả', 'ạ', 'ã',
            'ắ', 'ằ', 'ẳ', 'ặ', 'ẵ',
            'ấ', 'ầ', 'ẩ', 'ậ', 'ẫ',
            'é', 'è', 'ẻ', 'ẹ', 'ẽ',
            'ế', 'ề', 'ể', 'ệ', 'ễ',
            'í', 'ì', 'ỉ', 'ị', 'ĩ',
            'ó', 'ò', 'ỏ', 'ọ', 'õ',
            'ố', 'ồ', 'ổ', 'ộ', 'ỗ',
            'ớ', 'ờ', 'ở', 'ợ', 'ỡ',
            'ú', 'ù', 'ủ', 'ụ', 'ũ',
            'ứ', 'ừ', 'ử', 'ự', 'ữ',
            'ý', 'ỳ', 'ỷ', 'ỵ', 'ỹ',
        ];

        return str_replace($specialCharacters, $standardCharacters, $string);
    }

    public function buildTrigrams($keyword)
    {
        $t = "__" . $keyword . "__";
        $trigrams = "";
        for ($i = 0; $i < mb_strlen($t,"UTF-8") - 2; $i++)
        {
            $trigrams .= mb_substr($t, $i, 3, "UTF-8") . " ";
        }
        return $trigrams;
    }

    public function buildPhraseTrigrams($keyword)
    {
        $keyword = str_replace(' ','_',$keyword);
        $t = $keyword ;
        $trigrams = "";
        for ($i = 0; $i < mb_strlen($t,"UTF-8") - 2; $i++)
        {
            $trigrams .= mb_substr($t, $i, 3, "UTF-8") . " ";
        }
        return $trigrams;
    }

    public function buildTokenizeOnSpace($keyword)
    {
        $keywords = explode(" ", $keyword);
        $keywordsLength = count($keywords);
        $data = [];
        for ($i = 0; $i < $keywordsLength; $i ++)
        {
            $keywordArr = array_slice($keywords, $i, $keywordsLength);
            $keywordVi  = implode(" ", $keywordArr);
            $keywordEn  = str_slug_fix($keywordVi, " ");
            $data[]     = $keywordEn;
            $data[]     = $keywordVi;
        }
        return $data;
    }

    public function getEmail($stringEmail)
    {
        $email = explode('|', $stringEmail);
        if (preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email[0]))
        {
            return $email[0];
        }

        return false;
    }
}