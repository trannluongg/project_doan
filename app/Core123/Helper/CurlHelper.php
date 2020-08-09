<?php
/**
 * Created by PhpStorm.
 * User: Hungokata
 * Date: 8/28/18
 * Time: 9:52 AM
 */

namespace App\Core123\Helper;
class CurlHelper
{
    /**
     * Nhận toàn bộ thông tin html bằng một $url truyền vào
     * @param string $url : Đường dẫn url cần lấy
     * @param string $cookie :Có lưu cookie hay không
     * @return html
     */
    public static function getHtmlByUrl($url = '', $cookie = '')
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36');
        if ($cookie) {
            curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        }
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_ENCODING, "gzip");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        $data = curl_exec($ch);
        if (curl_error($ch)) {
            echo 'error:' . curl_error($ch);
        }
        curl_close($ch);
        return $data;
    }

    /**
     * Created by : BillJanny
     * Date: 19:28 - 13/01/17
     * Nhận thông tin dữ liệu từ một url truyền vào
     * @param string $url : any path $url
     * @param boolaen $showHeader : có header không
     * @return array
     */
    public static function getDataByUrl($url, $showHeader = false)
    {
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_ENCODING, "gzip");
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        $data = curl_exec($ch);
        if ($showHeader) {
            $header = curl_getinfo($ch);
            echo_array($header);
        }
        curl_close($ch);

        return $data;
    }


    /**
     * Giả lập google bot
     * @param $url
     * @return mixed
     */
    public static function googleBot($url)
    {
        $header = array();
        $header[] = 'Accept: text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5';
        $header[] = 'Cache-Control: max-age=0';
        $header[] = 'Content-Type: text/html; charset=utf-8';
        $header[] = 'Transfer-Encoding: chunked';
        $header[] = 'Connection: keep-alive';
        $header[] = 'Keep-Alive: 300';
        $header[] = 'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7';
        $header[] = 'Accept-Language: en-us,en;q=0.5';
        $header[] = 'Pragma:';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)');
        curl_setopt($curl, CURLOPT_REFERER, 'http://www.google.com');
        curl_setopt($curl, CURLOPT_ENCODING, 'gzip, deflate');
        curl_setopt($curl, CURLOPT_AUTOREFERER, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        $body = curl_exec($curl);
        curl_close($curl);
        return $body;
    }

    public static function postData($url, $data = [])
    {
//        $data_string = json_encode($data);
        $ch 		 = curl_init();                    // initiate curl
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST, true);  // tell curl you want to post something
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // define what you want to post
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: multipart/form-data')
        );
        $output = curl_exec ($ch); // execute
        curl_close ($ch); // close curl handle
        return $output;
    }
}