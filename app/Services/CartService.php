<?php

namespace App\Services;

class CartService
{

    public static function addToCart($carts = [], $product)
    {
        for ($i = 0; $i < count($carts); $i++) {
            if ($carts[$i]->masach == $product->masach) {
                $carts[$i]->soluong++;
                return $carts;
            }
        }
        $carts[] = $product;
        return $carts;
    }


    public static function deleteProduct($carts = [], $masach) {
        for ($i=0; $i < count($carts); $i++) {
            if ($carts[$i]->masach == $masach) {
                unset($carts[$i]);
                return $carts;
            }
        }
    }


    public static function updateQuality($carts = [], $masach, $soluong) {
        for ($i=0; $i < count($carts); $i++) {
            if ($carts[$i]->masach == $masach) {
                $carts[$i]->soluong = $soluong;
                return $carts;
            }
        }
    }
}
