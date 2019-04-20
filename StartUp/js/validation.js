$(document).ready(function() {
    $("#company-basics").validate({
        rules: {
            cbname: {
                minlength: 2
            },
            cbaddress: {
                minlength: 10
            },
            cbdate: {
                date: true
            },
            cbempnum: {
                number: true,
                min: 1
            },
            cbweb: {
                url: true
            },
            cbsummary: {
                required: true,
                minlength: 5,
                maxlength: 250
            }
            
        },
        messages: {         
            cbname: {
                minlength: "Your name must consist of at least 2 characters"
            },
            cbaddress: {
                minlength: "Your address must consist of at least 10 characters"
            },
            cbsummary: {
                required: "Please enter investor description",
                minlength: "Your description must consist of at least 5 characters",
                maxlength: "Your description can contain upto 250 characters"
            },
            cbdate: {
                required: "Please enter valid date"
            },
            cbempnum: {
                number: "Please enter numerc value",
                min: "Please enter valid input"
            },
            cbweb: {
                url: "Please enter valid website"
            }        
        }
    });
});


$(document).ready(function() {
    $("#company-overview").validate({
        rules: {
            olp: {
                minlength: 10,
                maxlength: 100
            },
            elp: {
                minlength: 50,
                maxlength: 500
            }
        },
        messages: {         
            olp: {
                minlength: "Your one line pitch must consist of at least 10 characters",
                maxlength: "Your one line pitch can contain upto 100 characters"
            },
            elp: {
                minlength: "Your one line pitch must consist of at least 50 characters",
                maxlength: "Your one line pitch can contain upto 500 characters"
            }
                   
        }
    });
});

$(document).ready(function() {
    $("#company-advisors").validate({
        rules: {
            cadvname: {
                required: true,
                minlength: 2
            },
            cadvemail: {
                required: true,
                email: true
            }
        },
        messages:  {
            cadvname: {
                required: "Please fill this field",
                minlength: "Your name must consist of at least 2 characters"
            },
            cadvemail: {
                required: "Please fill this field",
                email: "Please enter valid email"
            }
        }
    });  
});

$(document).ready(function() {
    $("#previous-inv").validate({
        rules: {
            pinvname: {
                required: true,
                minlength: 2
            },
            pinvemail: {
                required: true,
                email: true
            }
        },
        messages:  {
            pinvname: {
                required: "Please fill this field",
                minlength: "Your name must consist of at least 2 characters"
            },
            pinvemail: {
                required: "Please fill this field",
                email: "Please enter valid email"
            }
        }
    });  
});

$(document).ready(function() {
    $("#executive-summary").validate({
        rules: {
            custform: {
                minlength: 100,
                maxlength: 1000
            },
            prodser: {
                minlength: 100,
                maxlength: 1000
            },
            TarMar: {
                minlength: 100,
                maxlength: 1000
            },
            BModel: {
                minlength: 100,
                maxlength: 1000
            },
            MarketSizing: {
                minlength: 100,
                maxlength: 1000
            },
            CSegments: {
                minlength: 100,
                maxlength: 1000
            },
            SMStrat: {
                minlength: 100,
                maxlength: 1000
            },
            Competitors: {
                minlength: 100,
                maxlength: 1000
            },
            CompAdv: {
                minlength: 100,
                maxlength: 1000
            }
        },
        messages:  {
            custform: {
                minlength: "Please fill atleast 100 characters",
                maxlength: "This field can contain upto 1000 characters"
            },
            prodser: {
                minlength: "Please fill atleast 100 characters",
                maxlength: "This field can contain upto 1000 characters"
            },
            TarMar: {
                minlength: "Please fill atleast 100 characters",
                maxlength: "This field can contain upto 1000 characters"
            },
            BModel: {
                minlength: "Please fill atleast 100 characters",
                maxlength: "This field can contain upto 1000 characters"
            },
            MarketSizing: {
                minlength: "Please fill atleast 100 characters",
                maxlength: "This field can contain upto 1000 characters"
            },
            CSegments: {
                minlength: "Please fill atleast 100 characters",
                maxlength: "This field can contain upto 1000 characters"
            },
            SMStrat: {
                minlength: "Please fill atleast 100 characters",
                maxlength: "This field can contain upto 1000 characters"
            },
            Competitors: {
                minlength: "Please fill atleast 100 characters",
                maxlength: "This field can contain upto 1000 characters"
            },
            CompAdv: {
                minlength: "Please fill atleast 100 characters",
                maxlength: "This field can contain upto 1000 characters"
            },
        }
    });  
});

$(document).ready(function() {
    $("#open-funding-round").validate({
        rules: {
            round: {
                required: true,
            },
            seeking: {
                required: true,
                number: true
            },
            sec: {
                required: true,
            },
            preval: {
                required: true,
                number: true
            },
            valcap: {
                required: true,
                number: true
            },
            discount: {
                required: true,
                number: true
            },
            interest: {
                required: true,
                number: true
            },
            term: {
                required: true,
                number: true
            }
        },
        messages:  {
            round: {
                required: "Please select this feild",
            },
            seeking: {
                required: "Please fill this feild",
                number: "Please enter numeric values"
            },
            sec: {
                required: "Please select this feild",
            },
            preval: {
                required: "Please fill this feild",
                number: "Please enter numeric values"
            },
            valcap: {
                required: "Please fill this feild",
                number: "Please enter numeric values"
            },
            discount: {
                required: "Please fill this feild",
                number: "Please enter numeric values"
            },
            interest: {
                required: "Please fill this feild",
                number: "Please enter numeric values"
            },
            term: {
                required: "Please fill this feild",
                number: "Please enter numeric values"
            }
        }
    });  
});

$(document).ready(function() {
    $("#close-round").validate({
        rules: {
            capraise:  {
                required: true,
                number: true
            },
            cal:  {
                required: true,
                date: true
            }
        },
        messages:   {
            capraise:  {
                required: "Please fill this feild",
                number: "Please enter numeric values"
            },
            cal:  {
                required: "Please fill this feild",
                date: "Please enter valid date"
            }
        }
    });  
});
$(document).ready(function() {
    $("#contactForm").validate({
        rules: {
            first_name: {
                required: true,
                minlength: 2
            },
            company_name: {
                required: true,
                minlength: 2
            },
            last_name: {
                required: true,
                minlength: 2
            },
            summary: {
                required: true,
                minlength: 5,
                maxlength: 250
            },
            phone: {
                required: true,
                minlength: 10,
                maxlength: 10,
                digits: true,
            },
            email: {
                required: true,
                email: true
            },
            website: {
                required: true,
                url: true
            }
    
        },
        messages: {         
            first_name: {
                required: "Please fill this field",
                minlength: "Your name must consist of at least 2 characters"
            },
            company_name: {
                required: "Please fill this field",
                minlength: "Your name must consist of at least 2 characters"
            },
            last_name: {
                required: "Please fill this field",
                minlength: "Your name must consist of at least 2 characters"
            },
            phone: {
                required: "Please fill this field",
                digits: "Please enter valid phone number",
                minlength: "Please enter valid phone number",
                maxlength: "Please enter valid phone number"
            }, 
            email: {
                required: "Please fill this field",
                email: "Please enter valid email"
            },
            website: {
                required: "Please fill this field",
                url: "Please enter valid input"
            }
        }
    });
});
$(document).ready(function() {
    $("#accountForm").validate({
        rules: {
            user_name: {
                required: true,
                minlength: 2
            },
            current_password: {
                required: true,
            },
            new_password: {
                required: true,
                pwcheck: true
            },
            confirm_password: {
                required: true,
                pwcheck: true
            },
        },
        messages: {         
            user_name: {
                required: "Please fill this field",
                minlength: "Your name must consist of at least 2 characters"
            },
            current_password: {
                required: "Please fill this field",
            },
            new_password: {
                required: "Please fill this field",
                pwcheck: "Password must have 1 digit, 1 uppercase & 1 special character",
            },
            confirm_password: {
                required: "Please fill this field",
                pwcheck: "Password must have 1 digit, 1 uppercase & 1 special character",
            },
        }
    });
    $.validator.addMethod("pwcheck", function(value) {
        return /^[A-Za-z0-9\d=!\-@$#%^&~._*]*$/.test(value) // consists of only these
            && /[A-Z]/.test(value) // has a uppercase letter
            && /\d/.test(value) // has a digit
            && /[=!\-@$#%^&~._*]/.test(value)
    });
});
