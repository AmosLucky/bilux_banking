document.addEventListener('DOMContentLoaded', function() {
    var animated = document.querySelector('.auth-illustration');

    setTimeout(function() {
        animated.classList.add('is-animated');
    }, 100);

    setTimeout(function() {
        let elements = document.querySelectorAll('.auth-illustration__part');
        elements.forEach(el => {
            el.classList.remove('animate__item_delay_1');
            el.classList.remove('animate__item_delay_2');
        });

    }, 200);

    // elements movement animation
    let mainBlock = document.querySelectorAll('.auth-illustration');
    for (var i = 0; i < mainBlock.length; i++) {
        mainBlock[i].addEventListener('mousemove', function(e) {
            let el1 = document.querySelector('.auth-illustration__part1');
            let el2 = document.querySelector('.auth-illustration__part2');
            let el3 = document.querySelector('.auth-illustration__part3');
            let el4 = document.querySelector('.auth-illustration__part4');

            // // left down, right down
            if (e.pageX > oldBGx) {
                el1.style.transform = "translateX(-20px)";
                el2.style.transform = "translateX(20px)";
                el3.style.transform = "translateX(20px)";
                el4.style.transform = "translateX(-20px)";
            }

            // right top, left top
            if (e.pageX < oldBGx) {
                el1.style.transform = "translateX(20px)";
                el2.style.transform = "translateX(-20px)";
                el3.style.transform = "translateX(-20px)";
                el4.style.transform = "translateX(20px)";
            }

            oldBGx = e.pageX;
            oldBGy = e.pageY;
        });
    }

    var oldBGx = 0;
    var oldBGy = 0;


    // Send again form 
    $('#sent-code-block').click(function(e){
        e.preventDefault();
        $('#forgot-form').submit();
    });

    // Sending login 2fa code on blur
    // $('.auth_form #2faModal input[name="ga_code"]').blur(function() {
    //   $('.auth_form').submit();
    // });

    $('#2faModal').on('hidden.bs.modal', function() {
        $('#2faModal input[name="ga_code"]').val('');
    });

    if ($('input').is('[name="ga_code"]')) {
        $('#2faModal input[name="ga_code"]').val('');
        
        // Sending login 2fa code on input
        $('#2faModal input[name="ga_code"]').on('input', function(){
            let code2fa = $(this).val();
            if (code2fa.length == 6) {
            //     code2fa = code2fa + 1;
            // } else {
                $('.auth_form').submit();
                // $('#2faModal input[name="ga_code"]').val('');
            }
        });
    }

});
