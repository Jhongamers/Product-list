<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add product</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="{{BASE}}/app/assets/css/styles.css">
    <script defer src="{{BASE}}/app/assets/js/script.js"></script>
</head>

<body>
    <header>

        <h1>Product List</h1>
       <div class="menu">
           <button id="save" form="product_form" class="btn">Save</button>
           <a href="{{BASE}}" class="btn">Cancel</a>
       </div> 
    
    </header>

        <div id="message" class="d-none"> please select some option in the option select</div>
    <main>
    <form id="product_form" action="{{BASE}}/store" method="post">
    <div class="form-group">
        <label>SKU: </label>
        <input type="text" name="sku" id="sku" required>
    </div>
    <div class="form-group">
        <label>Name: </label>
        <input type="text" name="name" id="name" required>
    </div>
    <div class="form-group">
        <label>Price: </label>
        <input type="text" name="price" id="price" required>
    </div>
    <div class="form-group">
        <label>Type Switcher: </label>
        <select name="productType" id="productType">
        <option value="Type">Type Switcher</option>
        <option value="DVD">DVD</option>
        <option value="Furniture">Furniture</option>
        <option value="Book">Book</option>
       
    </select>
    </div>
<input type="hidden" id="attribute" name="attribute" value="">
    <div id="descDVD" class="d-none">
    
    <div class="form-group">
        <label>Size: </label>
        <input type="number" name="size" id="size">
    </div>

    </div>


    
    <div id="descFurniture" class="d-none">
    
    <div class="form-group">
        <label>Height (CM): </label>
        <input type="number" name="height" id="height">
    </div>
    <div class="form-group">
        <label>Width (CM): </label>
        <input type="number" name="width" id="width">
    </div>
    <div class="form-group">
        <label>Length (CM): </label>
        <input type="number" name="length" id="length">
    </div>


    </div>


    
    <div id="descBook" class="d-none">
    
    <div class="form-group">
        <label>Weight: </label>
        <input type="number" name="weight" id="weight">
    </div>

    </div>

</form>
    </main>
</body>

</html>


</body>
</html>