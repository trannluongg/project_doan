<?php
/**
 * Created by PhpStorm.
 * User: Dinh Huong
 * Date: 22/08/18
 * Time: 2:03 PM
 */

namespace App\Core123\Helper;

class DataHelper
{
    /**
     * Sử dụng chuyển đổi các name request trùng với các field trong bảng
     * và conver dữ liệu từ mảng thành chuỗi.
     *
     * @param $prefix
     * @param $data
     * @return array
     */
    public function convertFieldWithData($prefix, $data)
    {
        $result = [];

        foreach ($data as $key => $item)
        {
            $result[$prefix . $key] = $item;
        }

        return $result;
    }

    public function convertAddPrefix($prefix, $columns)
    {
        $arrExcept = ['id', 'created_at', 'updated_at', 'approve_at'];
        $result = [];
        if (!is_array($columns))
        {
            $columns = explode(',', $columns);
        }
        foreach ($columns as $i => $item)
        {
            if (in_array($item, $arrExcept))
            {
                $result[$i] = $item;
                continue;
            }
            $result[$i] = $prefix . '_' . $item;
        }

        return $result;
    }

    /*
     * Chỉ lấy những trường có dữ liệu và add tiền tố
     * Yêu cầu tiền tố giống nhau
     */
    public function getInputHasData($prefix, $data)
    {
        $input = [];
        foreach ($data as $key => $item)
        {
            if (in_array($key, ['id', 'created_at', 'updated_at']))
            {
                $input[$key] = $item;
                continue;
            }
            $input[$prefix . '_' . $key] = $item;
        }

        return $input;
    }
}
