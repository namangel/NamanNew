<?php require('../server.php');

if(isset($_SESSION['StpID'])){
    header('location: ../StartUp/index.php');
}

if(isset($_POST["reg_st"]))  
 {  
      if(empty($_POST["name"]))  
      {  
        echo "<script>alert('Specify industry type')</script>";
      }  
      else  
      {  
           if(file_exists('json/industry.json'))  
           {  
                $current_data = file_get_contents('json/industry.json');  
                $array_data = json_decode($current_data, true);  
                $extra = array( 
                     'name'               =>     $_POST['name'],  
                );  
                $array_data[] = $extra;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('json/industry.json', $final_data))  
                {  
                    echo "<script>alert('Industry appended')</script>";
                }  
           }  
           else  
           {  
                echo "<script>alert('JSON file not found')</script>";
        }  
      }  
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

        <link href="../css/style.css" rel="stylesheet">
        <link href="css/regform.css" rel="stylesheet">
       

        <?php require "../include/header/registerheader.php"?>

     

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
        <script src="js/location.js"></script>

        <script>

            $(document).ready(function(){
                load_json_data('type');
                
                function load_json_data(id){
                    var html_code = '';
                    $.getJSON('json/industry.json', function(data){
                        
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

                        html_code += '<option value="">Select '+id+'</option>';
                        $.each(data, function(key, value){
                            if(value.name != "Others")
                                html_code += '<option value="'+value.name+'" id="'+value.name+'">'+value.name+'</option>';
                        });
                        html_code += '<option value="Others" id="Others">Others</option>';

                        $('#'+id).html(html_code);
                    });    
                }     
            });

            function CheckInd(val){
                var element=document.getElementById("name");
                if(val=="Others")
                    element.style.display="block";
                else  
                    element.style.display="none";
            }

</script>

</head>
 <body>
   

        <div class="panel panel-primary" style="margin:20px;">
            <div class="panel-heading">
                    <h3 class="panel-title"> Startup Registration Form</h3>
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
                            <select class="form-control input-sm" name="type" id="type" onchange="CheckInd(this.value);">
                            <option value="">Select industry</option>
                            </select><br>
                            <input type="text" name="name" id="name" class="form-control" style="display:none;" placeholder="Specify Industry type"  /><br />  
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
        <br>
        <br>
  
        <?php require "../include/footer/regfooter.php"?>



    </body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>
<script src="js/validate.js"></script>

</html>
