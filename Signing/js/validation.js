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
                digits: "Please enter valid phone number",
                minlength: "Please enter valid input",
                minlength: "Please enter valid input"
            },
            cdesc: {
                minlength: "Your description must consist of at least 5 characters",
                maxlength: "Your description can contain upto 250 characters"
            },
            average: {
                digits: "Please enter valid input"
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
            },
            average: {
                digits: true,
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
            },
            average:{
                digits: "Please enter valid input"
            }    
        }
    });
});