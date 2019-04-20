$(document).ready(function(){
    $("#startup-validate").validate({
        rules:{
            stname:{
                minlength:2
            },
            ffname:{
                minlength:2
            },
            sfname:{
                minlength:2

            },
            website: {
                url: true
            },
            email: {
                email: true
            },
            phone:{
                minlength: 10,
                maxlength: 10,
                number: true
            },
            inv:{
                required: true,
                digits: true,
                minvalue:0,
                maxvalue:5
            },
            industry:{
                required:true,
            },
        },
        messages: {         
            stname: {
                minlength: "Your name must consist of at least 2 characters"
            },
            ffname: {
                minlength: "Your name must consist of at least 2 characters"
            },
            sfname: {
                minlength: "Your name must consist of at least 2 characters"
            },
            inv: {
                minvalue: "Your description must consist of at least 5 characters",
                maxvalue: "Your description can contain upto 250 characters"
            },
            email: {
                email: "Please enter valid email"
            },
            website: {
                url: "Please enter valid website"
            }  
        }

    });
});