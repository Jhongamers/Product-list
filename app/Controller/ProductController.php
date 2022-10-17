<?php

namespace App\Controller;

use \App\functions\views;
use \App\Model\Product;


class ProductController extends Page{
  
    public function getListProduct()
    {
        $model = new Product;
        $results = $model->getAll();
        $product = '';
        foreach($results as $result)
        {
            $product .= views::renderView('content/list',[
            'sku' => $result->sku,
            'name' => $result->name,
            'price' => $result->price,
            'attribute' => $result->attribute
            ]);
        }
        return $product;
    }

    public function getPageProduct()
    {  
      
             $content = views::renderView('grid',[
                'products' => self::getListProduct()
            ]);
            return parent::getPage('git',$content);
            
       
    }
 
        public function getAdd()
        {
         return views::renderView('add-product');
        }
         
        public function store()
        { 
            $model = new Product();
            $sku = $_POST['sku'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $productType = $_POST['productType'];
            $attribute = $_POST['attribute'];
         
            if($model->getExist($sku)>0){
              echo "<h1 style='background-color:red; color:white; text-align:center; border:1px solid #000;'>sku exists please write other</h1>";
              header( "refresh:2;url=".BASE."/addproduct");
            }else{
            $retorno = $model->create($sku,$name,$price,$productType,$attribute);
            
            header("location:".BASE);
        }
            
        }

        public function destroy()
        {     $model = new Product();
             $sku = $_POST['sku'];
             $model->delete($sku);
            header("location:".BASE);
        }
    
}