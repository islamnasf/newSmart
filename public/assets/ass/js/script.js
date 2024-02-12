$(document).ready(function(){
    $('.owl-carousel').owlCarousel({
        rtl:true,
        loop:true,
        items: 3,
        margin: 10,
        autoplay:true,
        autoplayTimeout:2000,
        autoplayHoverPause:true,
        dots: false,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:2,
                nav:false
            },
            1000:{
                items:3,
                nav:false,
            }
        }
    })
});

document.addEventListener("DOMContentLoaded", function () {
    var quantityInputs = document.querySelectorAll(".input-number");
    var decrementButtons = document.querySelectorAll(".input-number-decrement");
    var incrementButtons = document.querySelectorAll(".input-number-increment");

    decrementButtons.forEach(function (button, index) {
        button.addEventListener("click", function () {
            decrementQuantity(index);
        });
    });

    incrementButtons.forEach(function (button, index) {
        button.addEventListener("click", function () {
            incrementQuantity(index);
        });
    });

    function decrementQuantity(index) {
        var currentValue = parseInt(quantityInputs[index].value, 10);
        if (currentValue > 1) {
            quantityInputs[index].value = currentValue - 1;
        }
    }

    function incrementQuantity(index) {
        var currentValue = parseInt(quantityInputs[index].value, 10);
        quantityInputs[index].value = currentValue + 1;
    }
});

document.getElementById("done").addEventListener("click", function() {
    var targetElement = document.getElementById("chackout");
  
    targetElement.classList.add("show");
  });
