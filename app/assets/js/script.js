const typeProd = document.querySelector('#productType');
const attribute = document.querySelector('#attribute');
const height = document.querySelector('#height');
const width = document.querySelector('#width');
const length = document.querySelector('#length');
const price = document.querySelector('input[name=price]');
const base   = $('#baseurl').data("base");

let firstDesc = '';


const onChange = () => {


    typeProd.addEventListener('change', (e) => {


        const desc = document.querySelector('#desc' + '' + e.target.value);
        const descInput = document.querySelectorAll('#desc' + e.target.value + ' .form-group input');


        if (firstDesc === '') {
            desc.classList.remove('d-none');
            descInput.forEach((el) => {
                el.required = true;
            })
            firstDesc = e.target.value;
            return;
        }
        if (document.querySelector('#desc' + firstDesc).className.includes('')) {
            document.querySelector('#desc' + firstDesc).classList.add('d-none');

            document.querySelectorAll('#desc' + firstDesc + ' .form-group input').forEach((el) => {
                el.required = false;
                el.value = ''
                attribute.value = '';
            });
            descInput.forEach((el) => {
                el.required = true;
            });
            desc.classList.remove('d-none');
            firstDesc = e.target.value;
        }



    });


}

const DVD = () => {
        attribute.value =  'Size: '+document.querySelector('#size').value+' MB';
}
const Furniture = () => {

    attribute.value = 'Dimension: ' + height.value + 'x' + width.value + 'x' + length.value;


}
const Book = () => { 
        attribute.value = 'Weight: '+document.querySelector('#weight').value+" KG";    
}

const choose = () => {
    switch (firstDesc) {
        case "DVD":
            DVD();
            break;
        case "Furniture":
            Furniture();
            break;
        case "Book":
            Book();
            break;
    }
}


const submit = () => {
 
    $('#product_form').submit((e) => {
        e.preventDefault();
        choose();
        const sku = $('input[name=sku]').val();
        const name = $('input[name=name]').val();
        const price = $('input[name=price]').val().concat(' $');
        console.log(price);
        const productType = $('select[name=productType]').val();
        const attribute = $('input[name=attribute]').val();
            $.ajax({
                url: base+"/store",
                type:"post",
                data:{sku:sku,name:name,price:price,productType:productType,attribute:attribute},
                dataType:'json',
                success: (response) =>{
                    
                   if(response.success=== true){
                    window.location.href = base;
                   }else{
                    $("#message").removeClass('d-none').html(response.message);
                   }
                   console.log(response);
                }
               }); 
         
          
     
    });
}

submit();
onChange();