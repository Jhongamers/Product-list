<?php

namespace App\Router;
use Exception;
class RouterCore{

       public $handles,$uri,$url,$prefix;

       public function __construct()
       {
        $this->uri = $_SERVER['REQUEST_URI'] ?? '';
        $this->url = BASE;
       }

    public function get($routename, $callback)
    {     
        if($this->get_uri()==$routename){
            if(isset($_GET)){
        if(is_string($callback)){
            echo $this->string_handler($callback);
        }else{
            $callback($callback);
        }
      }
    }
             
    }

    public function post($routename, $callback)
    {     
        if($this->get_uri()==$routename){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(is_string($callback)){
            echo $this->string_handler($callback);
        }else{
            $callback($callback);
        }
      }else{
       echo "error this is method is post";
        
      }
    }
             
    }
    public function delete($routename, $callback)
    {     
        if($this->get_uri()==$routename){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(is_string($callback)){
            echo $this->string_handler($callback);
        }else{
            $callback($callback);
        }
      }else{
        echo "error this is method is post";
      }
    }
             
    }

    public function string_handler($string){
        if(strpos($string,"@"))
        {
           return $this->class_handler($string);
        }else{
            return $string;
        }


}

    public function class_handler($string)
    {    
      [$controller,$function] = explode("@",$string);
      $controllerInstace = new ("App\\Controller\\".$controller);
      return $controllerInstace->$function();
    }
    public function get_uri()
    {    
        $parseUrl = parse_url($this->url);
        $this->prefix = $parseUrl['path'] ?? '';
        $exp = strlen($this->prefix) ? explode($this->prefix,$this->uri) : [$this->uri]; 
        
        return end($exp);
        } 


   
}