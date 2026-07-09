document.addEventListener('DOMContentLoaded', () => {


    const purchaseAmount = document.querySelector('[name="purchase_amount"]');
    const purchasePrice = document.querySelector('[name="purchase_price"]');
    const unitAmount = document.querySelector('[name="unit_quantity"]');
    const salePrice = document.querySelector('[name="sale_price"]');


    const yieldInput = document.querySelector('[name="production_yield"]');
    const unitCostInput = document.querySelector('[name="unit_cost"]');
    const profitInput = document.querySelector('[name="profit"]');



    const previewYield = document.getElementById('previewYield');
    const previewCost = document.getElementById('previewCost');
    const previewProfit = document.getElementById('previewProfit');



    function calculate(){


        let compra = parseFloat(purchaseAmount?.value) || 0;

        let precioCompra = parseFloat(purchasePrice?.value) || 0;

        let cantidadUnidad = parseFloat(unitAmount?.value) || 0;

        let precioVenta = parseFloat(salePrice?.value) || 0;



        let rendimiento = 0;

        let costoUnidad = 0;

        let ganancia = 0;



        if(compra > 0 && cantidadUnidad > 0)
        {
            rendimiento = compra / cantidadUnidad;
        }



        if(precioCompra > 0 && rendimiento > 0)
        {
            costoUnidad = precioCompra / rendimiento;
        }



        if(precioVenta > 0 && costoUnidad > 0)
        {
            ganancia = precioVenta - costoUnidad;
        }



        if(yieldInput)
            yieldInput.value = rendimiento.toFixed(2);


        if(unitCostInput)
            unitCostInput.value = costoUnidad.toFixed(2);


        if(profitInput)
            profitInput.value = ganancia.toFixed(2);



        if(previewYield)
            previewYield.innerHTML = rendimiento.toFixed(2);


        if(previewCost)
            previewCost.innerHTML = '$'+costoUnidad.toFixed(2);


        if(previewProfit)
            previewProfit.innerHTML = '$'+ganancia.toFixed(2);


    }



    [
        purchaseAmount,
        purchasePrice,
        unitAmount,
        salePrice

    ].forEach(input=>{


        if(input)
        {
            input.addEventListener(
                'input',
                calculate
            );
        }


    });



});