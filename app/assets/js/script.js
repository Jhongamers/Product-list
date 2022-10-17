const typeProd = document.querySelector('#productType');
const message = document.querySelector('#message');
const product_form = document.querySelector('#product_form');
const attribute = document.querySelector('#attribute');
const height = document.querySelector('#height');
const width = document.querySelector('#width');
const length = document.querySelector('#length');


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
        attribute.value =  'Size: '+document.querySelector('#size').value;
}
const Furniture = () => {

    attribute.value = 'Dimension: ' + height.value + 'x' + width.value + 'x' + length.value;


}
const Book = () => { 
        attribute.value = 'Weight: '+document.querySelector('#weight').value;    
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
    product_form.addEventListener('submit', (e) => {
        if (typeProd.value === 'Type') {
            e.preventDefault();
            message.classList.remove('d-none');
            setTimeout(() => {
                message.classList.add('d-none');
            }, 3000);
            console.log(attribute.value);
        } else {
          
           
            choose();
            console.log(attribute.value);

        }
    });
}

submit();
onChange();