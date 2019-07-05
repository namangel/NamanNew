$(document).ready(function(){
    $("#startup-validate").validate({
        rules:{
            stname:{
                required:true,
                minlength:2
            },
            ffname:{
                required:true,
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
                required: true,
                number: true,
                digits: true,
                minlength: 10,
                maxlength: 10
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
            password_1: {
                required: true,
                minlength: 8,
                pwcheck: true,   
               
            },
        },
        messages: {         
            stname: {
                required: "Please fill this field",
                minlength: "Your name must consist of at least 2 characters"
            },
            ffname: {
                required: "Please fill this field",
                minlength: "Your name must consist of at least 2 characters"
            },
            
            sfname: {
                minlength: "Your name must consist of at least 2 characters"
            },
            phone: {
                required: "Please fill this field",
                number: "Please enter numeric value",
                digits: "Please enter valid phone number",
                minlength: "Please enter valid phone number",
            },
            inv: {
                minvalue: "Your description must consist of at least 5 characters",
                maxvalue: "Your description can contain upto 250 characters"
            },
            email: {
                email: "Please enter valid email"
            },
            website: {
                required: "Please fill this field",
                url: "Please enter valid website"
            },
            password_1: {
                required: "Please fill this field",
                minlength: "Password must be of minimum 8 characters",
                pwcheck: "Password must have 1 digit, 1 uppercase & 1 special character",
            }  
        }

    });
    $.validator.addMethod("pwcheck", function(value) {
        return /^[A-Za-z0-9\d=!\-@$#%^&~._*]*$/.test(value) // consists of only these
            && /[A-Z]/.test(value) // has a uppercase letter
            && /\d/.test(value) // has a digit
            && /[=!\-@$#%^&~._*]/.test(value)
    });
});