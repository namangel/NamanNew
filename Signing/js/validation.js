$(document).ready(function() {
    $("#indi").validate({
        rules: {
            fname: {
                required: true,
                minlength: 2
            },
            lname: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                number: true,
                digits: true,
                minlength: 10,
                maxlength: 10
            },
            cdesc: {
                required: true,
                minlength: 5,
                maxlength: 250
            },
            average: {
                required: true,
                digits: true,
            }
            
        },
        messages: {         
            fname: {
                required: "Please fill this field",
                minlength: "Your name must consist of at least 2 characters"
            },
            lname: {
                required: "Please fill this field",
                minlength: "Your name must consist of at least 2 characters"
            },
            email: {
                required: "Please fill this field",
                email: "Please enter valid email"
            },
            phone: {
                required: "Please fill this field",
                number: "Please enter numeric value",
                digits: "Please enter valid phone number",
                minlength: "Please enter valid phone number",
                maxlength: "Please enter valid phone number"
            },
            cdesc: {
                required: "Please fill this field",
                minlength: "Your description must consist of at least 5 characters",
                maxlength: "Your description can contain upto 250 characters"
            },
            average: {
                required: "Please fill this field",
                digits: "Please enter valid input"
            }  
        }
    });
});

$(document).ready(function() {
    $("#inst").validate({
        rules: {
            iname: {
                required: true,
                minlength: 2
            },
            fname: {
                required: true,
                minlength: 2
            },
            lname: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true
            },
            website: {
                required: true,
                url: true
            },
            cdesc: {
                minlength: 5,
                maxlength: 250
            },
            average: {
                required: true,
                digits: true,
            },
            phone: {
                required: true,
                number: true,
                digits: true,
                minlength: 10,
                maxlength: 10
            },
            
        },
        messages: {         
            iname: {
                required: "Please fill this field",
                minlength: "Your name must consist of at least 2 characters"
            },
            fname: {
                required: "Please fill this field",
                minlength: "Your name must consist of at least 2 characters"
            },
            lname: {
                minlength: "Your name must consist of at least 2 characters"
            },
            cdesc: {
                required: "Please fill this field",
                minlength: "Your description must consist of at least 5 characters",
                maxlength: "Your description can contain upto 250 characters"
            },
            email: {
                required: "Please fill this field",
                email: "Please enter valid email"
            },
            website: {
                required: "Please fill this field",
                url: "Please enter valid website"
            },
            average:{
                required: "Please fill this field",
                digits: "Please enter valid input"
            },
            phone: {
                required: "Please fill this field",
                number: "Please enter numeric value",
                digits: "Please enter valid phone number",
                minlength: "Please enter valid phone number",
                maxlength: "Please enter valid phone number"
            },
        }
    });
});