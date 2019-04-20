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
                email: "Please enter valid email"
            },
            phone: {
                number: "Please enter numeric value",
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
            }
            
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
            }        
        }
    });
});