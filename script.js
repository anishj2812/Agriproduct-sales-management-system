// const decreaseBtn = document.getElementById('decrease');
//     const increaseBtn = document.getElementById('increase');
//     const quantityInput = document.getElementById('cap');

//     decreaseBtn.addEventListener('click', () => {
//         console.log("**");
//         if (quantityInput.value >= 1) {
//             quantityInput.value = parseInt(quantityInput.value) - 1;
//         }
//     });

//     increaseBtn.addEventListener('click', () => {
//         console.log("**");
//         quantityInput.value = parseInt(quantityInput.value) + 1;
//     });


    document.addEventListener("DOMContentLoaded", function () {
        const addToCartBtn = document.getElementById('addToCartBtn');
        const offcanvas = new bootstrap.Offcanvas(document.getElementById('offcanvas'));

        addToCartBtn.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent form submission
            offcanvas.show(); // Open the off-canvas
        });
    });