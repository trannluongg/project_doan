<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 02/08/2020
 * Time: 10:27
 */

namespace App\Models;


class Cart
{
    public $items;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCard)
    {
        if ($oldCard)
        {
            $this->items = $oldCard->items;
            $this->totalQty = $oldCard->totalQty;
            $this->totalPrice = $oldCard->totalPrice;
        }
    }

    public function add($item, $id, $qty, $flag = 0)
    {
        $price = $item->pro_price * ((100-$item->pro_sale) / 100);

        $storedItem = ['qty' => 0, 'price' => $price, 'item' => $item];

        if ($this->items)
        {
            if (array_key_exists($id, $this->items))
            {
                $storedItem = $this->items[$id];
            }
        }
        if ($flag == 0)
        {
            if ($storedItem['qty'] + $qty > 10) return false;

            $storedItem['qty'] += $qty;

            $storedItem['price'] = $price * $storedItem['qty'];
            $this->items[$id] = $storedItem;

            $this->totalQty += $qty;
            $this->totalPrice += $price * $qty;
        }
        else
        {
            $old_qty = $storedItem['qty'];
            $storedItem['qty'] = $qty;

            $storedItem['price'] = $price * $storedItem['qty'];
            $this->items[$id] = $storedItem;

            $this->totalQty -= $old_qty;
            $this->totalQty += $qty;
            $this->totalPrice -= $price * $old_qty;
            $this->totalPrice += $price * $qty;
        }


        return true;
    }

    public function reduceByOne($id)
    {
        $price = $this->items[$id]['item']['pro_price'] * ((100-$this->items[$id]['item']['pro_sale']) / 100);
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $price;
        $this->totalQty--;
        $this->totalPrice -= $price;

        if ($this->items[$id]['qty'] <= 0) {
            unset($this->items[$id]);
        }
    }

    public function removeItem($id)
    {
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }
}
