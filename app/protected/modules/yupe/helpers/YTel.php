<?php

/**
 * Хелпер, содержащий самые необходимые функции для работы с текстом
 * Большинство функций взяты из фреймворка Codeigniter (text_helper)
 *
 * @package  yupe.modules.yupe.helpers
 * @subpackage helpers
 * @version 0.0.1
 * @author  Opeykin A. <aopeykin@yandex.ru>
 * @link https://yupe.ru
 *
 */

namespace yupe\helpers;

use CHtmlPurifier;

/**
 * Class YText
 * @package yupe\helpers
 */
class YTel
{

    /**
     * @param $str
     * @param string $separator
     * @return mixed|string
     */
    public static function cleanPh($str)
    {

        $clstr = (string)str_replace(['-', ' '], '', $str);

        $ph = (string)str_replace(['+', '-', '(', ')', ' '], '', $clstr);
        $ph = '+7' . $ph[1] . $ph[2] . $ph[3] . $ph[4] .  $ph[5] .
            $ph[6] . $ph[7] .  $ph[8] . $ph[9] . $ph[10];

        return $ph;
    }

}