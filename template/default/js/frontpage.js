document.addEventListener('DOMContentLoaded', function() {
    // Detect request animation frame
    var scroll = window.requestAnimationFrame ||
        // IE Fallback
        function(callback) { window.setTimeout(callback, 1000 / 60) };
    var elementsToShow = document.querySelectorAll('.animate');

    function loop() {

        Array.prototype.forEach.call(elementsToShow, function(element) {
            if (isInViewport(element)) {
                element.classList.add('is-animated');
                let animatedSvg = document.querySelector('.is-animated #animated-svg');
                if (animatedSvg && animatedSvg.classList.contains('active')) {
                    console.log('1')
                    animatedSvg.beginElement();
                    !animatedSvg.classList.remove('active')
                }
            }
            // else {
            //   element.classList.remove('is-visible');
            // }
        });

        scroll(loop);
    }

    // Call the loop for the first time
    loop();


    // if ($('animate').is('#animated-svg')) {
    //     var $div = $(".milestones-animate");
    //     var observer = new MutationObserver(function(mutations) {
    //         console.log('mutations', mutations)
    //         // mutations.forEach(function(mutation) {
    //         //     if (mutation.attributeName === 'class') {
    //         //         alert('Ch-ch-ch-changes!')
    //         //     }
    //         // });
    //     });
    //     observer.observe($div[0], {
    //         attributes: true
    //     });
    // }

    // Helper function
    function isInViewport(el) {
        if (typeof jQuery === "function" && el instanceof jQuery) {
            el = el[0];
        }
        var rect = el.getBoundingClientRect();
        return (
            (rect.bottom >= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.top <= (window.innerHeight || document.documentElement.clientHeight)) ||
            (rect.top >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight))
        );
    }


    // Rotate cards on click
    const lenderTab = document.querySelector('#pills-lender-tab');
    const borrowerTab = document.querySelector('#pills-borrower-tab');
    if(lenderTab) {
        lenderTab.addEventListener("click", () => {
            const cards = document.querySelectorAll('.steps__card');
            cards.forEach((card) => {
                card.classList.remove('rotate')
            });
        });
    }
    
    if(borrowerTab){
        borrowerTab.addEventListener("click", () => {
            const cards = document.querySelectorAll('.steps__card');
            cards.forEach((card) => {
                card.classList.add('rotate')
            });
        });
    }
    
    let mainBlock = document.getElementById('movement-trigger');
    if(mainBlock) {
        let mainLayer1 = document.querySelector('.main__layer_1');
        let mainLayer2 = document.querySelector('.main__layer_2');
    // for (var i = 0; i < mainBlock.length; i++) {
        // mainBlock.addEventListener('mousemove', function(e) {
        //     let mainLayer1 = document.querySelector('.main__layer_1');
        //     let mainLayer2 = document.querySelector('.main__layer_2');

        //     // // left down, right down
        //     if (e.pageY > oldBGy) {
        //         mainLayer1.style.transform = "translateX(-60px) translateY(45px)";
        //         mainLayer2.style.transform = "translateX(60px) translateY(-30px)";
        //     }

        //     // right top, left top
        //     if (e.pageY < oldBGy) {
        //         mainLayer1.style.transform = "translateX(60px) translateY(-45px)";
        //         mainLayer2.style.transform = "translateX(-60px) translateY(30px)";
        //     }

        //     oldBGx = e.pageX;
        //     oldBGy = e.pageY;
        // });
    // }
        var oldBGx = 0;
        var oldBGy = 0;

        mainBlock.addEventListener('mouseover', function(e) {
            mainLayer1.classList.add('main__layer_up');
            mainLayer2.classList.add('main__layer_down');
        });

        mainBlock.addEventListener('mouseleave', function(e) {
            mainLayer1.classList.remove('main__layer_up');
            mainLayer2.classList.remove('main__layer_down');
        });
    }
    

});