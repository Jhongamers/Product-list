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
                $register['success'] = false;
                $register['message'] = "this is already sku please type another";
              echo json_encode($register);
              return;
            }else{
            $retorno = $model->create($sku,$name,$price,$productType,$attribute);
            $register['success'] = true;
            echo json_encode($register);
            return;
        }
            
        }

        public function destroy()
        {     $model = new Product();
             $sku = $_POST['sku'];
             $model->delete($sku);
            header("location:".BASE);
        }
    
}