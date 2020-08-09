<?php
/**
 * Created by PhpStorm.
 * User: Hungokata
 * Date: 2/18/18
 * Time: 7:22 PM
 */

namespace App\Core123\Helper;


class HtmlClearUpHelper
{
    private $inputHtml;
    private $validElement = [
        "b", "br", "center", "del", "div", "em", "h2", "h3", "h4","h5", "i", "ins", "li", "hr", "ol",
        "p", "pre", "s", "span", "strong", "strike", "sub", "sup", "table", "tbody", "td", "th", "tr", "u", "ul"
    ];
    private $attrInValidElement = ['style', 'class','id', 'align'];

    public function clearContent($html, $config = [])
    {
        $this->inputHtml = $html;
        $this->stripTagsHtml();
        $this->clearDomDocument();
        $this->inputHtml = $this->hidePhone($config);
        $this->inputHtml = $this->hideEmail($config);
        return $this->inputHtml;
    }

    private function hidePhone($config)
    {
        $phone  = $config['phone'] ?? null;
        if (!$phone) return $this->inputHtml;
        $phoneArr = explode('|', $config['phone']);
        return str_replace($phoneArr, '***********', $this->inputHtml);
    }

    private function hideEmail($config)
    {

        $email  = $config['email'] ?? null;
        if (!$email) return $this->inputHtml;
        $searchArr = explode('|', $email);
        return str_replace($searchArr, '***********', $this->inputHtml);
    }

    private function stripTagsHtml()
    {
        $tag_allow = "";
        foreach ($this->validElement as $key => $value)
        {
            $tag_allow .= "<" . $value . ">";
        }

        $this->inputHtml = strip_tags($this->inputHtml, $tag_allow);
    }

    private function clearDomDocument()
    {
        $this->DOMDoc = new \DOMDocument("1.0", "UTF-8");
        $this->inputHtml = 	'<html>' .
            '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">' .
            '<body>' .
            $this->inputHtml .
            '</body>' .
            '</html>';

        //Load input HTML vào DOM Document, dùng @ để tránh lỗi
        @$this->DOMDoc->loadHTML($this->inputHtml);

        // Loại bỏ các thuộc tính không cho phép
        $this->clearDomDocumentAttribute();
        $this->inputHtml = $this->DOMDoc->saveHTML();

        // Clear các tag html không cần thiết
        $this->clearBreakTagDomDocument();

        //Tìm đến đầu body và /body để cắt chuỗi
        $start_pos 	= strpos($this->inputHtml,"<body>");
        $end_pos 	= strpos($this->inputHtml,"</body>");

        // Không tìm thấy vị trí thẻ body thì trả về chuỗi rỗng
        if($start_pos === false)
            $this->inputHtml	= "";
        else
        {
            preg_match("/<body[^>]*>(.*?)<\/body>/is", $this->inputHtml, $matches);
            if (isset($matches[1]))
            {
                $this->inputHtml = $matches[1];
            }
        }
    }

    private function clearBreakTagDomDocument()
    {
        $this->inputHtml = preg_replace('/(?:\s*<br[^>]*>\s*){2,}/im', '<br>', $this->inputHtml);
    }

    private function clearDomDocumentAttribute()
    {
        //Loop node
        foreach ($this->DOMDoc->getElementsByTagName("*") as $mynode)
        {
            $nodeName   = $mynode->nodeName;
            $attributes = $mynode->attributes;
            $attrClass  = $mynode->getAttribute('class');

            if (($nodeName == 'i' || $nodeName == 'ul') && $attrClass == 'list-benefits') return false;

            if ($mynode->hasAttributes())
            {
                $mynode->removeAttribute('style');
                foreach ($attributes as $attribute_name => $attribute_value)
                {
                    if (array_search($attribute_name, $this->attrInValidElement) !== false)
                    {
                        preg_match_all('/([\s]*col-[a-z-0-9A-Z]{2}-[0-9]{1,2})/', $attribute_value->value, $match);
                        $mynode->removeAttribute($attribute_name);
                    }
                }
            }
        }
    }
}