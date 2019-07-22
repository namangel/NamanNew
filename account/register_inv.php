<?php require('../server.php');

  if(isset($_SESSION['InvID'])){

      if($_SESSION["type"] == "Individual")
          header('location: ../Investor/indi/');
      else
          header('location: ../Investor/inst/');
  }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Investor | Registration Form | Billennium Divas</title>
        <link href="../img/divas.png" rel="icon">
        <!-- Bootstrap -->
        <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

        <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <style type="text/css">
            .form-content
            {
                padding: 5%;
            }
            #individual, #institution{
                display: none;
            }
            input.error {
		    border: 1px dotted red;
            }
            label.error{
                width: 100%;
                color: red;
                font-style: italic;
                margin-left: 10px;
                margin-bottom: 5px;
            }
            .font-big{
              font-size: 16px;
            }
            .font-small{
              font-size: 14px;
            }
        </style>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    </head>
    <body>
    <?php require "../include/header/registerheader.php"?>
        <div class="panel panel-primary" style="margin:20px;">
            <div class="panel-heading font-big">
                    <h3 class="panel-title"> Investor Registration Form</h3>
            </div>
            <div class="form-content font-big">
                <div class="row">
                    <div class="form-group col-md-12 col-sm-12">
                        <form method="POST" name="register_inv_select">
                            <select class="form-control input-sm font-big" name="type" onchange="show()" id="selecttype">
                                <option value="NULL">--Select Type of Investor--</option>
                                <option value="Individual">Individual Investor</option>
                                <option value="Institution">Institution Investor</option>
                            </select>
                        </form>
                    </div>


                    <section id="info">
                        <div class="row about-extra">
                        <div class="col-lg-6 wow fadeInUp">
                            <img src="../img/5 copy.png" class="img-fluid" alt="">
                        </div>
                        <div class="col-lg-6 wow fadeInUp pt-5 pt-lg-0 font-small">
                            <h3>What's the right choice for you?</h3>
                            <p><b>Institutional Investor</b></p>
                            <p>Institutional Investor is a nonbank person or organization that trades securities in large enough share quantities or dollar amounts that it qualifies for preferential treatment and lower commissions, that is, it is an organization that invests on their behalf of its members</p>

                            <p><b>Individual Investor</b></p>
                            <p>Individual Investor is an individual who purchases securities for his or her own personal account rather than for an organization.</p>
                        </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="panel-body" id="individual">
                <form method="POST" name="register_inv" id="indi" action="register_inv.php">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group col-md-6 col-sm-6 font-small">
                            <label for="fname">First Name	</label>
                            <input type="text" class="form-control input-sm font-small" name="fname" placeholder="">
                        </div>
                        <div class="form-group col-md-6 col-sm-6 font-small">
                            <label for="lname">Last Name	</label>
                            <input type="text" class="form-control input-sm font-small" name="lname" placeholder="">
                        </div>
                        <div class="form-group col-md-6 col-sm-6 font-small">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control input-sm font-small" name="email" placeholder="">
                        </div>

                        <div class="form-group col-md-6 col-sm-6 font-small">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control input-sm font-small" name="phone" placeholder="">
                        </div>

                        <div class="form-group col-md-6 col-sm-6 font-small">
                            <label for="country">Country</label>
                            <select class="form-control input-sm custom-select font-small" name="country" id="country">
                                <option value="">Select country</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6 col-sm-6 font-small">
                            <label for="state">State</label>
                            <select class="form-control input-sm custom-select font-small" name="state" id="state">
                                <option value="">Select state</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6 col-sm-6 font-small">
                            <label for="city">City</label>
                            <select class="form-control input-sm custom-select font-small" name="city" id="city">
                                <option value="">Select city</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6 col-sm-6 font-small">
                            <label for="ioi">Industry of Interest</label>
                            <select class="form-control input-sm font-small" name="ioi" id="type">
                            <option value="">Select Industry Type</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6 col-sm-6 font-small">
                            <label for="average">Avg. No. of Companies Invested per Year</label>
                            <input type="text" class="form-control input-sm font-small" name="average" placeholder="">
                        </div>

                        <div class = "form-group col-md-6 col-sm-6 font-small">
                            <label for="invrange">Investment range</label>
                            <select class="form-control input-sm font-small" name="invrange">
                                    <option>Select Investment range</option>
                                    <option>0 - 1,00,000</option>
                                    <option>1,00,000 - 10,00,000</option>
                                    <option>10,00,000 - 50,00,000</option>
                                    <option>50,00,000 - 1,00,00,000</option>
                                    <option>More than 1,00,00,000</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6 col-sm-6 font-small">
                            <label for="address">Company Description</label>
                            <span class="help-block">Describe yourself and the value of your company</span>
                            <textarea class="form-control input-sm font-small" name="address" rows="3"></textarea>
                        </div>

                        <div class="form-group col-md-6 col-sm-6 font-small">
                            <label for="username">Username</label>
                            <input type="text" class="form-control input-sm font-small" id="username" placeholder="">
                        </div>

                        <div class="form-group col-md-6 col-sm-6 font-small">
                            <label for="password_1">Password</label>
                            <input type="password" class="form-control input-sm font-small" name="password_1" placeholder="">
                        </div>

                        <div class="form-group col-md-6 col-sm-6 font-small">
                            <label for="password_2">Confirm Password</label>
                            <input type="password" class="form-control input-sm font-small" name="password_2" placeholder="">
                        </div>

                    </div>


                    <div class="col-md-12 col-sm-12">
                        <div class="form-group col-md-12 col-sm-12 pull-right" >
                            <input type="submit" class="btn btn-primary font-small" value="Register" name="reginv_ind">
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-body" id="institution">
                <form method="POST" name="register_inv" id="inst" action="register_inv.php">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group col-md-6 col-sm-6 font-small">
                            <label for="fname">Company Name </label>
                            <input type="text" class="form-control input-sm font-small" name="iname" placeholder="">
                        </div>
                        <div class="form-group col-md-6 col-sm-6 font-small">
                            <label for="fname">First Name	</label>
                            <input type="text" class="form-control input-sm font-small" name="fname" placeholder="">
                        </div>
                        <div class="form-group col-md-6 col-sm-6 font-small">
                            <label for="lname">Last Name	</label>
                            <input type="text" class="form-control input-sm font-small" name="lname" placeholder="">
                        </div>
                        <div class="form-group col-md-6 col-sm-6 font-small">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control input-sm font-small" name="email" placeholder="">
                        </div>

                        <div class="form-group col-md-6 col-sm-6 font-small">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control input-sm font-small" name="phone" placeholder="">
                        </div>

                        <div class="form-group col-md-6 col-sm-6 font-small">
                            <label for="country">Country</label>
                            <select class="form-control input-sm custom-select font-small" name="country" id="country">
                                <option value="">Select country</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6 col-sm-6 font-small">
                            <label for="state">State</label>
                            <select class="form-control input-sm custom-select font-small " name="state" id="state">
                                <option value="">Select state</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6 col-sm-6 font-small">
                            <label for="city">City</label>
                            <select class="form-control input-sm custom-select font-small" name="city" id="city">
                                <option value="">Select city</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6 col-sm-6 font-small">
                        <label for="ioi">Industry of Interest</label>
                        <select class="form-control input-sm font-small" name="ioi" id="type">
                            <option value="">Select Industry Type</option>
                        </select>
                        </div>

                        <div class="form-group col-md-6 col-sm-6 font-small">
                            <label for="average">Avg. No. of Companies Invested per Year</label>
                            <input type="text" class="form-control input-sm font-small" name="average" placeholder="">
                        </div>

                        <div class = "form-group col-md-6 col-sm-6 font-small">
                            <label for="invrange">Investment range</label>
                            <select class="form-control input-sm font-small" name="invrange">
                                    <option>Select Investment range</option>
                                    <option>0 - 1,00,000</option>
                                    <option>1,00,000 - 10,00,000</option>
                                    <option>10,00,000 - 50,00,000</option>
                                    <option>50,00,000 - 1,00,00,000</option>
                                    <option>More than 1,00,00,000</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6 col-sm-6 font-small">
                            <label for="address">Company Description</label>
                            <span class="help-block">Describe yourself and the value of your company</span>
                            <textarea class="form-control input-sm font-small" name="address" rows="3"></textarea>
                        </div>

                        <div class="form-group col-md-6 col-sm-6 font-small">
                            <label for="username">Username</label>
                            <input type="text" class="form-control input-sm font-small" id="username" placeholder="">
                        </div>

                        <div class="form-group col-md-6 col-sm-6 font-small">
                            <label for="password_1">Password</label>
                            <input type="password" class="form-control input-sm font-small" name="password_1" placeholder="">
                        </div>

                        <div class="form-group col-md-6 col-sm-6 font-small">
                            <label for="password_2">Confirm Password</label>
                            <input type="password" class="form-control input-sm font-small" name="password_2" placeholder="">
                        </div>

                    </div>


                    <div class="col-md-12 col-sm-12">
                        <div class="form-group col-md-12 col-sm-12 pull-right" >
                            <input type="submit" class="btn btn-primary font-small" value="Register" name="reginv_inst">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php require "../include/footer/regfooter.php"?>
    </body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>
<script src="js/validation.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->

<script>
    $(document).ready(function(){

        load_json_data('country');

        function load_json_data(id,parent_id,state_id)
        {
        //console.log(parent_id);
        //console.log(id);
        var html_code = '';
        $.getJSON('../json/location.json', function(data){

        html_code += '<option value="">Select '+id+'</option>';
        $.each(data, function(key, value){
        if(id == 'country')
        {

            html_code += '<option value="'+value.name+'" id="'+value.id+'">'+value.name+'</option>';
        }
        else if(id == 'state')
        {
            if(value.id == parent_id)
            {
                $.each(data[parent_id-1].states, function(key, value){
                html_code += '<option value="'+key+'">'+key+'</option>';
            });
            }
        }
        else
        {
            // console.log("Parent_id"+parent_id);
            // console.log("State_id"+state_id);

            if(value.id == parent_id)
            {
                $.each(data[parent_id-1].states, function(key, value){
                if(key == state_id)
                {
                    for (var i = 0;i < value.length;i++)
                    {
                        html_code += '<option value="'+value[i]+'">'+value[i]+'</option>';
                    }
                }
            });
        }
        }
        });
        $('#'+id).html(html_code);
        });

        }

        $(document).on('change', '#country', function(){
        var country_id = $('#country option:selected').attr('id');
        //console.log("Hello"+country_id);
        if(country_id != '')
        {
        load_json_data('state',country_id);
        }
        else
        {
        $('#state').html('<option value="">Select state</option>');
        $('#city').html('<option value="">Select city</option>');
        }
        });
        $(document).on('change', '#state', function(){

        var e = document.getElementById("country");
        var country_id = $('#country option:selected').attr('id');

        //console.log("dafafafadfa"+country_id);

        var e = document.getElementById("state");
        var state_id = e.options[e.selectedIndex].text;

    //   var state_id = $(this).val();
    //   var state_id = "Maharashtra";

        if(state_id != '')
        {
        load_json_data('city',country_id,state_id);
        }
        else
        {
        $('#city').html('<option value="">Select city</option>');
        }
        });
    });
</script>

<script>
    function show(){
        var type = document.getElementById("selecttype").value;
        if(type == "NULL"){
            document.getElementById("institution").style.display = "NONE";
            document.getElementById("individual").style.display = "NONE";
            document.getElementById("info").style.display = "block";
        }
        else if(type == "Institution"){
            document.getElementById("individual").style.display = "NONE";
            document.getElementById("institution").style.display = "block";
            document.getElementById("info").style.display = "NONE";
        }
        else if(type == "Individual"){
            document.getElementById("institution").style.display = "NONE";
            document.getElementById("individual").style.display = "block";
            document.getElementById("info").style.display = "NONE";
        }
    }
</script>
<script>

$(document).ready(function(){
load_json_data('type');

function load_json_data(id){
   var html_code = '';
   $.getJSON('../../json/industry.json', function(data){

       function SortByName(x,y){
           return (((x.name).toLowerCase() == (y.name).toLowerCase()) ? 0 : (((x.name).toLowerCase() > (y.name).toLowerCase()) ? 1 : -1 ));
       }

       // Call Sort By Name
       data.sort(SortByName);

       function removeDumplicateValue(myArray){
           var newArray = [];

           $.each(myArray, function(key, value) {
               var exists = false;
               $.each(newArray, function(k, val2) {
                   if(value.name == val2.name){ exists = true };
               });
               if(exists == false && value.name != "") { newArray.push(value); }
           });

           return newArray;
       }

       data = removeDumplicateValue(data);
       var count = Object.keys(data).length;
       console.log(count);

       html_code += '<option value="">Select Industry '+id+'</option>';
       $.each(data, function(key, value){
           if(value.name != "Others")
               html_code += '<option value="'+value.name+'" id="'+value.name+'">'+value.name+'</option>';
       });
       html_code += '<option value="Others" id="Others">Others</option>';

       $('#'+id).html(html_code);
   });
}
});
</script>
</html>
