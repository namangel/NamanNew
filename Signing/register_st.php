<?php require('../server.php');

if(isset($_SESSION['StpID'])){
    header('location: ../StartUp/index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Startup| Registration Form</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

        <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

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
        </style>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-1.12.4.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>

        <script>
            $(document).ready(function(){

                load_json_data('country');

                function load_json_data(id,parent_id,state_id)
                {
                //console.log(parent_id);
                //console.log(id);
                var html_code = '';
                $.getJSON('json/location.json', function(data){

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
    </head>
    <body>
        <div class="panel panel-primary" style="margin:20px;">
            <div class="panel-heading">
                    <h3 class="panel-title">Registration Form</h3>
            </div>
            </div>
            <div class="panel-body">
            <form method="post" action="register_st.php" name="register_st" id="startup-validate">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group col-md-6 col-sm-6">
                            <label for="fname">Startup Firm Name</label>
                            <input type="text" class="form-control input-sm" name="stname" placeholder="">
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <label for="lname"> First Founder Name	</label>
                            <input type="text" class="form-control input-sm" name="ffname" placeholder="">
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <label for="lname"> Second Founder Name	</label>
                            <input type="text" class="form-control input-sm" name="sfname" placeholder="">
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control input-sm" name="email" placeholder="">
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <label for="type">Choose Industry</label>
                            <select class="form-control input-sm" name="type" id="type">
                            <option value=""></option>
                                        <option value="Advertising">Advertising</option>
                                        <option value="Agriculture">Agriculture</option>
                                        <option value="Analytics">Analytics</option>
                                        <option value="Android">Android</option>
                                        <option value="Apps">Apps</option>
                                        <option value="Art">Art</option>
                                        <option value="Automotive">Automotive</option>
                                        <option value="B2B">B2B</option>
                                        <option value="Big Data">Big Data</option>
                                        <option value="Big Data Analytics">Big Data Analytics</option>
                                        <option value="Brand Marketing">Brand Marketing</option>
                                        <option value="Business Development">Business Development</option>
                                        <option value="Business Services">Business Services</option>
                                        <option value="Clean Energy">Clean Energy</option>
                                        <option value="Clean Technology">Clean Technology</option>
                                        <option value="Cloud Computing">Cloud Computing</option>
                                        <option value="Commercial Real Estate">Commercial Real Estate</option>
                                        <option value="Consulting">Consulting</option>
                                        <option value="Consumer Electronics">Consumer Electronics</option>
                                        <option value="Consumer Goods">Consumer Goods</option>
                                        <option value="Consumer Internet">Consumer Internet</option>
                                        <option value="Consumers">Consumers</option>
                                        <option value="Crowdfunding">Crowdfunding</option>
                                        <option value="Design">Design</option>
                                        <option value="Digital Marketing">Digital Marketing</option>
                                        <option value="Digital Media">Digital Media</option>
                                        <option value="E-Commerce">E-Commerce</option>
                                        <option value="E-Commerce Platforms">E-Commerce Platforms</option>
                                        <option value="Education">Education</option>
                                        <option value="Enterprise Software">Enterprise Software</option>
                                        <option value="Entertainment">Entertainment</option>
                                        <option value="Events">Events</option>
                                        <option value="Fashion">Fashion</option>
                                        <option value="Finance">Finance</option>
                                        <option value="Fitness">Fitness</option>
                                        <option value="Food and Beverages">Food and Beverages</option>
                                        <option value="Games">Games</option>
                                        <option value="Hardware">Hardware</option>
                                        <option value="Health and Wellness">Health and Wellness</option>
                                        <option value="Hospitality">Hospitality</option>
                                        <option value="Human Resources">Human Resources</option>
                                        <option value="Information Technology">Information Technology</option>
                                        <option value="Internet">Internet</option>
                                        <option value="iOS">iOS</option>
                                        <option value="Location Based Services">Location Based Services</option>
                                        <option value="Manufacturing">Manufacturing</option>
                                        <option value="Marketing">Marketing</option>
                                        <option value="Marketplaces">Marketplaces</option>
                                        <option value="Media">Media</option>
                                        <option value="Medical Devices">Medical Devices</option>
                                        <option value="Mobile">Mobile</option>
                                        <option value="Mobile Advertising">Mobile Advertising</option>
                                        <option value="Mobile Application">Mobile Application</option>
                                        <option value="Mobile Commerce">Mobile Commerce</option>
                                        <option value="Mobile Games">Mobile Games</option>
                                        <option value="Mobile Health">Mobile Health</option>
                                        <option value="Mobile Payments">Mobile Payments</option>
                                        <option value="Music">Music</option>
                                        <option value="Nonprofits">Nonprofits</option>
                                        <option value="Online Travel">Online Travel</option>
                                        <option value="Payments">Payments</option>
                                        <option value="Personal Health">Personal Health</option>
                                        <option value="Publishing">Publishing</option>
                                        <option value="Real Estate">Real Estate</option>
                                        <option value="Recruiting">Recruiting</option>
                                        <option value="Restaurants">Restaurants</option>
                                        <option value="Retail">Retail</option>
                                        <option value="Retail Technology">Retail Technology</option>
                                        <option value="SaaS">SaaS</option>
                                        <option value="Sales and Marketing">Sales and Marketing</option>
                                        <option value="Security">Security</option>
                                        <option value="Small and Medium Businesses">Small and Medium Businesses</option>
                                        <option value="Social Commerce">Social Commerce</option>
                                        <option value="Social Games">Social Games</option>
                                        <option value="Social Media">Social Media</option>
                                        <option value="Social Media Marketing">Social Media Marketing</option>
                                        <option value="Software">Software</option>
                                        <option value="Sports">Sports</option>
                                        <option value="Technology">Technology</option>
                                        <option value="Telecommunications">Telecommunications</option>
                                        <option value="Transportation">Transportation</option>
                                        <option value="Travel">Travel</option>
                                        <option value="User Experience Design">User Experience Design</option>
                                        <option value="Venture Capital">Venture Capital</option>
                                        <option value="Video">Video</option>
                                        <option value="Video Games">Video Games</option>
                                        <option value="Web Design">Web Design</option>
                                        <option value="Web Development">Web Development</option>
                            </select>

                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <label for="address">Address</label>
                            <input type="text" name="address"class="form-control" placeholder="Address*" value=""/>
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <label for="country">Country</label>
                            <select class="form-control input-sm custom-select" name="country" id="country">
                                <option value="">Select country</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <label for="state">State</label>
                            <select class="form-control input-sm custom-select " name="state" id="state">
                                <option value="">Select state</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <label for="city">City</label>
                            <select class="form-control input-sm custom-select" name="city" id="city">
                                <option value="">Select city</option>
                            </select>
                        </div>
                       
                        
                        <div class="form-group col-md-6 col-sm-6">
                            <label for="website">Website</label>
                            <input type="text" class="form-control input-sm" name="website" placeholder="">
                        </div>

                        <div class="form-group col-md-6 col-sm-6">
                            <label for="average">Investment Received Till date</label>
                            <input type="number" class="form-control input-sm" name="inv" placeholder="">
                        </div>
                        
                        <div class="form-group col-md-6 col-sm-6">
                            <label for="username">Username</label>
                            <input type="text" class="form-control input-sm" id="username" name="username"placeholder="">
                        </div>

                        <div class="form-group col-md-6 col-sm-6">
                            <label for="phone">Phone Number</label>
                            <input type="number" class="form-control input-sm" name="phone" placeholder="">
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <label for="password_1">Password</label>
                            <input type="password" class="form-control input-sm" name="password_1" placeholder="">
                        </div>

                        <div class="form-group col-md-6 col-sm-6">
                            <label for="password_2">Confirm Password</label>
                            <input type="password" class="form-control input-sm" name="password_2" placeholder="">
                        </div>

                    </div>


                    <div class="col-md-12 col-sm-12">
                        <div class="form-group col-md-12 col-sm-12 pull-right" >
                            <input type="submit" class="btn btn-primary" value="Register" name="reg_st">
                        </div>
                    </div>
                </form>
            </div>
           
                    </div>
                </form>
            </div>
        </div>
    </body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>
<script src="js/validate.js"></script> 
</html>