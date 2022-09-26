<?php

namespace Higherror\RelokiaTestProject;

class Get
{

    function __construct()
    {

    }

    function getData()
    {
        $flag = false;
        $num = 1;
        while($num != null)
        {
            $array = Http::get_data('tickets?page='.$num);
            if($array == null)
            {
                break;
            }
            else
            {
                $set = new Set($array);
                if($flag == false) {
                    $set->File();
                    $flag = true;
                }
                $set->setToFile();

            }
            $num++;
        }
    }
}