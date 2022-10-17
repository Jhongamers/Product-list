<?php

namespace App\Controller;

use \App\functions\views;



class Page{
    
    public static function getPage($title,$content)
    {
        return views::renderView('product-list',[
            'title'  => $title,
            'content' => $content
        ]);
    }
    

    
}