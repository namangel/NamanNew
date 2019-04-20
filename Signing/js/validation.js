$(document).ready(function() {
    $("#indi").validate({
        rules: {
            fname: {
                minlength: 2
            },
            lname: {
                minlength: 2
            },
            email: {
                email: true
            },
            phone: {
                number: true,
                digits: true,
                minlength: 10,
                maxlength: 10
            },
            cdesc: {
                minlength: 5,
                maxlength: 250
            },
            average: {
                digits: true,
            },
            password_1: {
                minlength: 8,
                pwcheck: true,
            },
            // password_2: {
            //     equalTo: "#password_1"
            // }
            
        },
        messages: {         
            fname: {
                minlength: "Your name must consist of at least 2 characters"
            },
            lname: {
                minlength: "Your name must consist of at least 2 characters"
            },
            email: {
                email: "Please enter valid email"
            },
            phone: {
                number: "Please enter numeric value",
                digits: "Please enter valid phone number",
                minlength: "Please enter valid phone number",
                maxlength: "Please enter valid phone number"
            },
            cdesc: {
                minlength: "Your description must consist of at least 5 characters",
                maxlength: "Your description can contain upto 250 characters"
            },
            average: {
                digits: "Please enter valid input"
            },
            password_1: {
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

$(document).ready(function() {
    $("#inst").validate({
        rules: {
            iname: {
                minlength: 2
            },
            fname: {
                minlength: 2
            },
            lname: {
                minlength: 2
            },
            email: {
                email: true
            },
            website: {
                url: true
            },
            cdesc: {
                minlength: 5,
                maxlength: 250
            },
            average: {
                digits: true,
            },
            phone: {
                number: true,
                digits: true,
                minlength: 10,
                maxlength: 10
            },
            password_1: {
                minlength: 8,
                pwcheck: true,
            },
            // password_2: {
            //     equalTo: "#password_1"
            // }
        },
        messages: {         
            iname: {
                minlength: "Your name must consist of at least 2 characters"
            },
            fname: {
                minlength: "Your name must consist of at least 2 characters"
            },
            lname: {
                minlength: "Your name must consist of at least 2 characters"
            },
            cdesc: {
                minlength: "Your description must consist of at least 5 characters",
                maxlength: "Your description can contain upto 250 characters"
            },
            email: {
                email: "Please enter valid email"
            },
            website: {
                url: "Please enter valid website"
            },
            average:{
                digits: "Please enter valid input"
            },
            phone: {
                number: "Please enter numeric value",
                digits: "Please enter valid phone number",
                minlength: "Please enter valid phone number",
                maxlength: "Please enter valid phone number"
            },
            password_1: {
                minlength: "Password must contain min 8 characters",
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