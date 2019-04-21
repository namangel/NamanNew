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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        .note
        {
            text-align: center;
            height: 80px;
            background: -webkit-linear-gradient(left, #0072ff, #8811c5);
            color: #fff;
            font-weight: bold;
            line-height: 80px;
        }
        .form-content
        {
            padding: 5%;
            border: 1px solid #ced4da;
            margin-bottom: 2%;
        }
        .form-control{
            border-radius:1.5rem;
        }
        .btnSubmit
        {
            border:none;
            border-radius:1.5rem;
            padding: 1%;
            width: 20%;
            cursor: pointer;
            background: #0062cc;
            color: #fff;
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
            margin-left: 20px;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
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
    <div class="container register-form">
        <div class="form">
            <div class="note">
                <p>Investor Registration</p>
            </div>

            <div class="form-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <form method="POST" name="register_inv_select">
                                <select class="form-control" name="type" onchange="show()" id="selecttype">
                                    <option value="NULL">--Select Type of Investor--</option>
                                    <option value="Individual">Individual Investor</option>
                                    <option value="Institution">Institution Investor</option>
                                </select>
                            </form>
                        </div>
                    </div>


                    <section id="info">
                        <div class="row about-extra">
                        <div class="col-lg-6 wow fadeInUp">
                            <img src="../img/5 copy.png" class="img-fluid" alt="">
                        </div>
                        <div class="col-lg-6 wow fadeInUp pt-5 pt-lg-0">
                            <h3>What's the right choice for you?</h3>
                            <p><b>Institutional Investor</b></p> 
                            <p>Institutional Investor is a nonbank person or organization that trades securities in large enough share quantities or dollar amounts that it qualifies for preferential treatment and lower commissions, that is, it is an organization that invests on their behalf of its members</p>

                            <p><b>Individual Investor</b></p> 
                            <p>Individual Investor is an individual who purchases securities for his or her own personal account rather than for an organization.</p>
                        </div>
                        </div>
                    </section>
                </div>


                <div id="individual">
                <form method="POST" name="register_inv" id="indi" action="register_inv.php">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="fname" type="text" class="form-control" placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <input name="lname" type="text" class="form-control" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="phone" type="text" class="form-control" placeholder="Phone Number">
                            </div>
                            <div class="form-group">
                                <input name="email" type="text" class="form-control" placeholder="Email Address">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="country" class="form-control" placeholder="Country">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="state" class="form-control" placeholder="State">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="city" class="form-control" placeholder="City">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input name="ioi" type="text" class="form-control" placeholder="Industry of Interest">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select class="form-control" name="invrange">
                                    <option>Select Investment range</option>
                                    <option>0 - 1,00,000</option>
                                    <option>1,00,000 - 10,00,000</option>
                                    <option>10,00,000 - 50,00,000</option>
                                    <option>50,00,000 - 1,00,00,000</option>
                                    <option>More than 1,00,00,000</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input name="average" type="text" class="form-control" placeholder="Avg. No. of Companies Invested per Year">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input name="cdesc" type="text" class="form-control" placeholder="Company Description - Describe yourself and the value of your company">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input name="username" type="text" class="form-control" placeholder="Username">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input name="password_1" type="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input name="password_2" type="password" class="form-control" placeholder="Confirm Password">
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btnSubmit" name="reginv_ind">
                    </form>
                </div>


                <div id="institution">
                <form method="POST" name="register_inv" id="inst" action="register_inv.php">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input name="iname" type="text" class="form-control" placeholder="Company Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="fname" type="text" class="form-control" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="lname" type="text" class="form-control" placeholder="Last Name">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="phone" type="text" class="form-control" placeholder="Phone Number">
                            </div>
                            <div class="form-group">
                                <input name="email" type="text" class="form-control" placeholder="Email Address">
                            </div>
                        </div>
                        <div class="col-md-6">
                        <!-- </div>
                        <div class="col-md-6"> -->
                            <div class="form-group">
                                <input name="website" type="text" class="form-control" placeholder="Website">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="country" class="form-control" placeholder="Country">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="state" class="form-control" placeholder="State">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="city" class="form-control" placeholder="City">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input name="ioi" type="text" class="form-control" placeholder="Industry of Interest">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <select class="form-control" name="invrange">
                                <option>Select Investment range</option>
                                <option>0 - 1,00,000</option>
                                <option>1,00,000 - 10,00,000</option>
                                <option>10,00,000 - 50,00,000</option>
                                <option>50,00,000 - 1,00,00,000</option>
                                <option>More than 1,00,00,000</option>
                            </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input name="average" type="text" class="form-control" placeholder="Avg. No. of Companies Invested per Year">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input name="cdesc" type="text" class="form-control" placeholder="Company Description">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input name="username" type="text" class="form-control" placeholder="Username">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input name="password_1" type="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input name="password_2" type="password" class="form-control" placeholder="Confirm Password">
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btnSubmit" name="reginv_inst">
                    </form>
                </div>
            </div>
        </div>
    </div>   
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>
<script src="js/validation.js"></script> 


