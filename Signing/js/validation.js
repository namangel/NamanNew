$(document).ready(function() {
    $("#individual").validate({
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
                maxlength: 10
            },
            cdesc: {
                minlength: 5,
                maxlength: 250
            }
            
        },
        messages: {         
            fname: {
                minlength: "Your name must consist of at least 2 characters"
            },
            lname: {
                minlength: "Your name must consist of at least 2 characters"
            },
            email: {
                required: "Please fill this field",
                email: "Please enter valid email"
            },
            phone: {
                number: "Please enter numerc value",
                minlength: "Please enter valid input"
            },
            cdesc: {
                minlength: "Your description must consist of at least 5 characters",
                maxlength: "Your description can contain upto 250 characters"
            }   
        }
    });
});

$(document).ready(function() {
    $("#institution").validate({
        rules: {
            cname: {
                minlength: 2
            },
            foundname: {
                minlength: 2
            },
            email: {
                email: true
            },
            web: {
                url: true
            },
            cdesc: {
                minlength: 5,
                maxlength: 250
            }
            
        },
        messages: {         
            cname: {
                minlength: "Your name must consist of at least 2 characters"
            },
            foundname: {
                minlength: "Your name must consist of at least 2 characters"
            },
            cdesc: {
                minlength: "Your description must consist of at least 5 characters",
                maxlength: "Your description can contain upto 250 characters"
            },
            email: {
                required: "Please fill this field",
                email: "Please enter valid email"
            },
            web: {
                url: "Please enter valid website"
            }        
        }
    });
});