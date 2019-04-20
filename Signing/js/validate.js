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
                number: true,
                range:[0,5] 
            },
            industry:{
                required:true,
            }
        },

    })
}


)