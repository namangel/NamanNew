$(document).ready(function() {
    $("#investor-basics").validate({
        rules: {
            cbfname: {
                minlength: 2
            },
            cblname: {
                minlength: 2
            },
            summary: {
                required: true,
                minlength: 5,
                maxlength: 250
            },
            cbioi: {
                required: true
            }
        },
        messages: {         
            cbfname: {
                minlength: "Your name must consist of at least 2 characters"
            },
            cblname: {
                minlength: "Your name must consist of at least 2 characters"
            },
            summary: {
                required: "Please enter investor description",
                minlength: "Your description must consist of at least 5 characters",
                maxlength: "Your description can contain upto 250 characters"
            },
            cbioi: {
                required: "Please select this fields"
            }         
        }
    });
});


$(document).ready(function() {
    $("#previous-inv").validate({
        rules: {
            piname: {
                required: true,
                minlength: 2
            },
            piyear: {
                required: true,
                number: true,
                range:[2000,2099]
            },
            piamount: {
                required: true,
                number: true,
                min: 1
            },
            pistage: {
                required: true,
            },
            pistake: {
                required: true,
                number:true,
                range:[1,100]
            },
            piweb:{
                url:true
            }
        },
        messages: {         
            piname: {
                required: "Please fill this field",
                minlength: "Your name must consist of at least 2 characters"
            },
            piyear: {
                required:  "Please fill this field",
                number: "Please enter numeric values",
                range: "Please enter year in between 2000 to 2099"
            },
            piamount: {
                required:  "Please fill this field",
                number: "Please enter numeric values",
                min: "Investment amount should not be zero"
            },
            pistage: {
                required:  "Please select this field",
            },
            pistake: {
                required:  "Please fill this field",
                number:"Please enter numeric values",
                range:"Please enter percentage in between 1 to 100"
            },
            piweb:{
                url:"Please enter valid URL"
            }       
        }
    });
});

$(document).ready(function() {
    $("#contact-social").validate({
        rules: {
            sfphone: {
                minlength: 10,
                maxlength: 10,
                number: true
            },
            sfemail: {
                email: true
            },
            sfwebsite: {
                url: true
            }
        },
        messages: {         
            sfphone: {
                minlength: "Your phone no. must contain of 10 digits",
                maxlength: "Your phone no. must contain of 10 digits",
                number: "Please enter numeric values"
            },
            sfemail: {
                email: "Please enter valid email address"
            },
            sfwebsite: {
                url: "Please enter valid url"
            }    
        }
    });  
});
