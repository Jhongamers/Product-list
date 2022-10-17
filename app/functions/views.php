<?php

namespace App\functions;

class views{

        private static $params = [];

        public static function init($params = [])
        {
            self::$params = $params;
        }
            
    public static function renderView($view, $params = [])
    {
        
        $file = __DIR__.'/../View/'.$view.'.php';
        
       $content = file_exists($file) ? file_get_contents($file) : '';
     
       $params = array_merge(self::$params,$params);
       $keys = array_keys($params);

       foreach($params as $keys => $value){
           $content = preg_replace('/\{{'. $keys.'}}/',$value,$content) ;
     } 
      return $content;  
    
    }
}