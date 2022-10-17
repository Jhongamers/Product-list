<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="{{BASE}}/app/assets/css/styles.css">
    <script defer src="{{BASE}}/app/assets/js/scriptList.js"></script>
</head>

<body>
    <header>
        <h1>Product List</h1>
        
        <form action="{{BASE}}/delete" id="delete-form" method="post">
            <a href="{{BASE}}/addproduct" class="btn">ADD</a>
            <button for="delete-form" id="delete-product-btn" class="btn" type="submit"> MASS DELETE </button>
        </form>
    </header>
    <main>
        
    <div id="message" class="d-none">please select checkbox</div>
   {{content}}
    </main>
</body>

</html>