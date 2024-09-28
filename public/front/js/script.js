$(document).ready(function () {

    $('#collection_date').change(function(){
        $.ajax({
            url: "/newsite/delivery-date",
            method: 'GET',  
            data: {
                'date' : $(this).val()
            },                  
            success: function (data) {               
                if (data.length > 0) {                       
                 $('#delivery_date').html(data)
             }
         },

     });
    });
    function scrolling(viewport, content) {
        const sb = new ScrollBooster({
            viewport,
            content,
            //scrollMode: 'native',
            scrollMode: 'transform',
            direction: 'horizontal',
            bounce: true,
            textSelection: false,
            emulateScroll: false,
            /* onUpdate: (state) => {
                //console.log(state)
                content.style.transform = `translate(${-state.position.x}px, ${-state.position.y}px)`;
            }, */
            shouldScroll: (state, event) => {
                console.log(event)
                const isButton = event.target.nodeName.toLowerCase() === 'button';
                return !isButton;
            },
            onClick: (state, event, isTouchDevice) => {
                const isLink = event.target.nodeName.toLowerCase() === 'link';
                if (isLink) {
                    event.preventDefault();
                }
            }
        });
    }

    /* Horizontal Scroll */
    if ($(".viewport").length && $(".draggable").length) {
        const viewport = document.querySelector('.viewport');
        const content = document.querySelector('.draggable');

        scrolling(viewport, content);
    }

    $(window).on("load resize", function () {
        var w = $(window).width();
        if (w < 1024) {
            if ($(".mobile-viewport").length && $(".mobile-draggable").length) {
                const viewportM = document.querySelector('.mobile-viewport');
                const contentM = document.querySelector('.mobile-draggable');
                scrolling(viewportM, contentM);
            }
        }
    })

    /* Float Button Space */
    if ($(".floating-menu").parent().is(":visible")) {
        var menuH = $(".floating-menu").outerHeight();
        $(".skip-bottom").css('margin-bottom', menuH);
    }


    /* Mobile Menu */
    $("#showMenu").on("click", function () {
        $(".mobile-bg").fadeIn();
        $(".mobile-menu").addClass('active');
    });

    $(".mobile-close button, .mobile-bg").on("click", function () {
        $(".mobile-bg").fadeOut();
        $(".mobile-menu").removeClass('active');
    });

    /* Main Tabs */
    $(".tabs_header ul li").on("click", function () {
        $(".tabs_header ul li").removeClass("active");
        $(this).addClass("active");

        var target = $(this).data("target");
        $(".tabs_item").each(function () {
            if ($(this).attr("data-value") == target) {
                $(".tabs_item").hide();
                $(this).fadeIn();
            }
        })
    });

    /* Small Tabs */
    $(".panels_header ul li span").on("click", function () {
        $(".panels_header ul li").removeClass("active");
        $(this).parent().addClass("active");

        var target = $(this).parent().data("target");
        $(".panels_item").each(function () {
            if ($(this).attr("data-value") == target) {
                $(".panels_item").hide();
                $(this).fadeIn();
            }
        })
    });

    // Numbers only for phone number field
    $("input[name=mobile]").on("change keyup", function () {
        if (/\D/g.test(this.value)) {
            this.value = this.value.replace(/\D/g, '');
        }
    })

    // Validate postcode
    checkValidCode();
    function checkValidCode(){
        var postcode = $("input[name=postcode]").val();
        if(typeof(postcode)  === "undefined") {
        } else {
            if (postcode !== '') {
                const code = postcode.split(" ");
                $.ajax({
                    url: "/newsite/checkout/check-post-code",
                    method: 'POST',
                    data: {
                        'code': code[0],
                        '_token': $("input[name=_token]").val()
                    },
                    success: function (data) {
                        if (data.success) {
                            $(".validateStatus").html('<span class="green">Your area is eligible. Please continue the checkout.</span>');
                            $(".details-button").prop('disabled', false);
                        } else {
                            $(".validateStatus").html('<span class="red">Sorry! We currently do not serve your area.</span>');
                            $(".details-button").prop('disabled', true);
                        }
                    }
                });

            } else {
                $(".validateStatus").html('<span class="red">Please enter your postcode.</span>');
            }
        }

    }
    $(".validate-button").on("input", function () {


        // var postcode = $("input[name=postcode]").val();
        // if (postcode !== '') {
        //     const code = postcode.split(" ");
        //     $.ajax({
        //         url: "/checkout/check-post-code",
        //         method: 'POST',
        //         data: {
        //             'code': code[0],
        //             '_token': $("input[name=_token]").val()
        //         },
        //         success: function (data) {
        //             if (data.success) {
        //                 $(".validateStatus").html('<span class="green">Your area is eligible. Please continue the checkout.</span>');
        //                 $(".details-button").prop('disabled', false);
        //             } else {
        //                 $(".validateStatus").html('<span class="red">Sorry! We currently do not serve your area.</span>');
        //                 $(".details-button").prop('disabled', true);
        //             }
        //         }
        //     });

        // } else {
        //     $(".validateStatus").html('<span class="red">Please enter your postcode.</span>');
        // }

    })

    var total = 0;
    // Highlight Services from DB
    if ($("#db-services").length) {
        var serviceList = $("#db-services").data('value');
        if (serviceList !== '' && serviceList !== null) {

            //var servs = JSON.parse(serviceList.services);
            serviceList.forEach(element => {
                $(".checkout-services-list").find("input[value=" + element.service + "]").each(function () {
                    $(this).prop('checked', true);
                    var main = $(this).parent();
                    main.addClass('active');
                    main.find(".action").addClass('remove').text('Remove');

                    // calc pricing
                    if ($("#totalService").length) {
                        total += parseFloat($(this).data('price'));
                        $("#totalService span").text(total.toFixed(2));
                    }
                })
            });
        }
    }

    // Checkout Select Services
    $(".selc-button .action").on("click", function () {
        var main = $(this).parent().parent().parent();
        var checkbox = main.find("input[type=checkbox]");
        console.log(checkbox)
        if (checkbox.is(':checked')) {
            checkbox.prop('checked', false);
            main.removeClass('active');
            $(this).removeClass('remove').text('Add');

            // calc pricing
            total -= parseFloat(checkbox.data('price'));
        } else {
            checkbox.prop('checked', true);
            main.addClass('active');
            $(this).addClass('remove').text('Remove');

            // calc pricing
            total += parseFloat(checkbox.data('price'));
        }
        if ($("#totalService").length) {
            $("#totalService span").text(total.toFixed(2));
        }
    });

    $('.service-item').click(function () {
        var id = $(this).data('id');
        $.ajax({
            url: "/newsite/category/service",
            method: 'POST',
            data: {
                'category_id': id,
                'section_id': $('#secitonId').val(),
                '_token': $("#token").val()
            },
            success: function (data) {
                $('#serviceItems').html(data);
            }
        });
    });




    var modal = document.querySelector(".modal");
    var trigger = document.querySelector(".trigger");
    var closeButton = document.querySelector(".close-button");

    function toggleModal() {
        modal.classList.toggle("show-modal");
    }

    function windowOnClick(event) {
        if (event.target === modal) {
            toggleModal();
        }
    }

    trigger.addEventListener("click", toggleModal);
    closeButton.addEventListener("click", toggleModal);
    window.addEventListener("click", windowOnClick);




})

$('.trigger-modal').click(function () {
    var modal = $("#" + $(this).data("id"));
    modal.fadeIn();
    modal.removeClass("hidden");
    modal.addClass("show-modal");
});

$('.trigger-modal-signup').click(function () {
    var modal = $(this).parents('.modal');
    modal.fadeOut();
    modal.fadeIn();
    modal.removeClass("show-modal");

    var modal = $("#" + $(this).data("id"));
    modal.fadeIn();
    modal.removeClass("hidden");
    modal.addClass("show-modal");
});

$(".close-modal").click(function () {
    var modal = $(this).parents('.modal');
    modal.fadeOut();
    modal.addClass("hidden");
    modal.removeClass("show-modal");
});















// let tabsContainer = document.querySelector("#tabs"); 

// let tabTogglers = tabsContainer.querySelectorAll("#tabs a");

// console.log(tabTogglers);

// tabTogglers.forEach(function (toggler) {
//     toggler.addEventListener("click", function (e) {
//         e.preventDefault();

//         let tabName = this.getAttribute("href");

//         let tabContents = document.querySelector("#tab-contents");

//         for (let i = 0; i < tabContents.children.length; i++) {
//             tabTogglers[i].parentElement.classList.remove(
//                 "border-t",
//                 "border-r",
//                 "border-l",
//                 "-mb-px",
//                 "bg-white"
//             );
//             tabContents.children[i].classList.remove("hidden");
//             if ("#" + tabContents.children[i].id === tabName) {
//                 continue;
//             }
//             tabContents.children[i].classList.add("hidden");
//         }
//         e.target.parentElement.classList.add(
//             "border-t",
//             "border-r",
//             "border-l",
//             "-mb-px",
//             "bg-white"
//         );
//     });
// });

const tabs = document.querySelectorAll(".tabs");
const tab = document.querySelectorAll(".tab");
const panel = document.querySelectorAll(".tab-content");

const tab_s = document.querySelectorAll(".tab-s");
const panel_s = document.querySelectorAll(".tab-content-s");






function onTabClick(event) {
    // deactivate existing active tabs and panel

    for (let i = 0; i < tab.length; i++) {
        tab[i].classList.remove("active");
    }

    for (let i = 0; i < panel.length; i++) {
        panel[i].classList.remove("active");
    }
    // activate new tabs and panel
    event.target.classList.add("active");
    let classString = event.target.getAttribute("data-target");  
    document
    .getElementById("panels")
    .getElementsByClassName(classString)[0]
    .classList.add("active");
}

function onTab_s_Click(event) {
    // deactivate existing active tabs and panel

    for (let i = 0; i < tab_s.length; i++) {
        tab_s[i].classList.remove("active");
    }

    for (let i = 0; i < panel_s.length; i++) {
        panel_s[i].classList.remove("active");
    }








    // activate new tabs and panel
    event.target.classList.add("active");
    let classString = event.target.getAttribute("data-target");
    document
    .getElementById("content-panels")
    .getElementsByClassName(classString)[0]
    .classList.add("active");






}

for (let i = 0; i < tab.length; i++) {
    tab[i].addEventListener("click", onTabClick, false);
}
for (let i = 0; i < tab_s.length; i++) {
    tab_s[i].addEventListener("click", onTab_s_Click, false);
}

$(".tab-bg").click(function () {
    $(this).parents("nav").find(".tab-bg").removeClass("custom-active");
    $(this).addClass("custom-active");
});

jQuery(document).ready(function(){
    ///signup
    $('#signup').validate({
        rules: {
            "name": {
                required: true,
                maxlength: 255
            },
            "email": {
                required: true,
                email: true,
                maxlength: 255
            },
            "password": {
                required: true,
                minlength: 6,
                maxlength: 10
            },

        },
        submitHandler: function (form) {

            $.ajax({
                // url: "/newsite/signup",
                url: signup_url,
                method: 'POST',
                headers: {'X-CSRF-TOKEN': $("input[name=_token]").val()},
                data: $(form).serialize(),               

                success: function (data) {
                    $("#signupuser").hide();
                    $("#verifyuser").show();
                    if(data.status == 1){
                        $("#optsuccess").html(data.message);
                        $("#opterror").html("");
                    } else {
                        $("#opterror").html(data.message);
                    }
                },
                error(data){
                    var response = JSON.parse(data.responseText);
                    $.each( response.errors, function( key, value) {
                        $('#'+key).after('<label class="error">'+value+'</label>');
                    });
                }
            });
        }
    });

    $('#verifyuserotp').validate({
        rules: {
            "otp": {
                required: true,
                maxlength: 4
            },
        },
        submitHandler: function (form) {
            $.ajax({
                url: verifyOtp,
                method: 'POST',
                headers: {'X-CSRF-TOKEN': $("input[name=_token]").val()},
                data: $(form).serialize(),               
                success: function (data) {
                    if(data.status == 1){
                        $("#optverifysuccess").html(data.message);
                        $("#optverifyerror").html("");
                        window.location.href = home_url; 
                    } else {
                        $("#optverifyerror").html(data.message);
                    }
                },
                error(data){
                    var response = JSON.parse(data.responseText);
                    $.each( response.errors, function( key, value) {
                        $('#'+key).after('<label class="error">'+value+'</label>');
                    });
                }
            });
        }
    });

    $('#login').validate({
        rules: {
            "email": {
                required: true,
                email: true,                
            },
            "password": {
                required: true,              
            },

        },
        submitHandler: function (form) {

            var parent = $(form);
            $.ajax({
                // url: "/newsite/login",
                url : login_url,
                method: 'POST',
                headers: {'X-CSRF-TOKEN': $("input[name=_token]").val()},
                data: $(form).serialize(),               

                success: function (data) {

                    if (data.success) {

                        if(!data.last_visited_url) {
                            window.location.href = home_url;
                        } else {
                            window.location.href = checkout_url;
                        }

                    }else{
                        parent.find('.message').html("<h5 class='error'>Invalid User</h5>");
                    }
                },
                error(data){

                    var response = JSON.parse(data.responseText);
                    $.each( response.errors, function( key, value) {
                        $('#'+key).after('<label class="error">'+value+'</label>');
                    });
                }
            });
        }
    });

    $('#contact').validate({
        submitHandler: function (form) {
            var parent = $(form);

            $.ajax({
                url: addContactUrl,
                method: 'POST',
                headers: {'X-CSRF-TOKEN': $("input[name=_token]").val()},
                data: $(form).serialize(),               

                success: function (data) {

                    if (data.success) {                       
                     parent.find('label.error').remove();
                     parent.find('.message').html("<h5 class='green'>saved successfully</h5>");
                 } else{
                    parent.find('.message').html("<h5 class='error'>something went wrong</h5>");
                }
            },
            error(data){
                var response = JSON.parse(data.responseText);
                $.each( response.errors, function( key, value) {
                    $('#'+key).after('<label class="error">'+value+'</label>');
                });
            }
        });
        }
    });

    $('#change-password').validate({
        submitHandler: function (form) {
            var parent = $(form);
            $.ajax({
                url: "change-password",
                method: 'POST',
                headers: {'X-CSRF-TOKEN': $("input[name=_token]").val()},
                data: $(form).serialize(),               

                success: function (data) {

                    if (data.success) {                       
                     parent.find('label.error').remove();
                     parent.find('.message').html("<h5 class='green'>saved successfully</h5>");
                     parent.find('.modal').removeClass("show-modal");
                     parent.find('.modal').addClass("hidden");
                 } else{
                    parent.find('.message').html("<h5 class='error'>something went wrong</h5>");
                }
            },
            error(data){
                var response = JSON.parse(data.responseText);
                $.each( response.errors, function( key, value) {
                    $('#'+key).after('<label class="error">'+value+'</label>');
                });
            }
        });
        }
    });

    $('#address').validate({
        submitHandler: function (form) {
            var parent = $(form);

            $.ajax({
                url: addAddress,
                method: 'POST',
                headers: {'X-CSRF-TOKEN': $("input[name=_token]").val()},
                data: $(form).serialize(),               

                success: function (data) {

                    if (data.success) {                       
                     parent.find('label.error').remove();
                     parent.find('.message').html("<h5 class='green'>saved successfully</h5>");
                     parent.find('.modal').removeClass("show-modal");
                     parent.find('.modal').addClass("hidden");
                 } else{
                    parent.find('.message').html("<h5 class='error'>something went wrong</h5>");
                }
            },
            error(data){
                var response = JSON.parse(data.responseText);
                $.each( response.errors, function( key, value) {
                    $('#'+key).after('<label class="error">'+value+'</label>');
                });
            }
        });
        }
    });

    // $('#card').validate({
    //     submitHandler: function (form) {
    //         var parent = $(form);
    //         $.ajax({
    //             url: "/add-card",
    //             method: 'POST',
    //             headers: {'X-CSRF-TOKEN': $("input[name=_token]").val()},
    //             data: $(form).serialize(),               

    //             success: function (data) {

    //                 if (data.success) {                       
    //                    parent.find('label.error').remove();
    //                    parent.find('.message').html("<h5 class='green'>"+data.message+"</h5>");
    //                    parent.find('.modal').removeClass("show-modal");
    //                    parent.find('.modal').addClass("hidden");
    //                 } else{
    //                     parent.find('.message').html("<h5 class='error'>"+data.message+"</h5>");
    //                 }
    //             },
    //             error(data){
    //                 var response = JSON.parse(data.responseText);
    //                 $.each( response.errors, function( key, value) {
    //                     $('#'+key).after('<label class="error">'+value+'</label>');
    //                 });
    //             }
    //         });
    //     }
    // });

    

// $("#signup-submit").on('click',function(){
//     alert()
//    $("#signup").valid();
// });

    

});


// new
$(".testimonial-content").owlCarousel({
	loop: true,
	items: 1,
	margin: 50,
	dots: true,
	nav: false,
	mouseDrag: true,
	autoplay: true,
	autoplayTimeout: 3000,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    smartSpeed: 800
});

function openModal(){

    $('#myModalSignup').modal();
}  
function logout(){
    $("#logoutform").submit();
}