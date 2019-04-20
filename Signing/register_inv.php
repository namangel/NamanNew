<?php require('../server.php');

if(isset($_SESSION['InvID'])){
	header('location: ../Investor/index.php');
}
// $_SESSION["type"]
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
    }
    else if(type == "Institution"){
        document.getElementById("individual").style.display = "NONE";
        document.getElementById("institution").style.display = "block";
    }
    else if(type == "Individual"){
        document.getElementById("institution").style.display = "NONE";
        document.getElementById("individual").style.display = "block";
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
                                <select class="form-control" name="type" onchange="show()" id="selecttype" required>
                                    <option value="NULL">--Select Type of Investor--</option>
                                    <option value="Individual">Individual Investor</option>
                                    <option value="Institution">Institution Investor</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>


                <div id="individual">
                <form method="POST" name="register_inv" id="indi" action="register_inv.php">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="fname" type="text" class="form-control" placeholder="First Name" required>
                            </div>
                            <div class="form-group">
                                <input name="lname" type="text" class="form-control" placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="phone" type="text" class="form-control" placeholder="Phone Number" required>
                            </div>
                            <div class="form-group">
                                <input name="email" type="text" class="form-control" placeholder="Email Address" required>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="country" class="form-control" placeholder="Country" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="state" class="form-control" placeholder="State" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="city" class="form-control" placeholder="City" required>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input name="ioi" type="text" class="form-control" placeholder="Industry of Interest" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input name="invrange" type="text" class="form-control" placeholder="Investment Range" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input name="average" type="text" class="form-control" placeholder="Avg. No. of Companies Invested per Year" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input name="cdesc" type="text" class="form-control" placeholder="Company Description - Describe yourself and the value of your company" required>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input name="username" type="text" class="form-control" placeholder="Username" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input name="pass" type="text" class="form-control" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input name="confpass" type="text" class="form-control" placeholder="Confirm Password" required>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btnSubmit" name="reginv_ind">Submit</button>
                    </form>
                </div>


                <div id="institution">
                <form method="POST" name="register_inv" id="inst" action="register_inv.php">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input name="iname" type="text" class="form-control" placeholder="Company Name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="fname" type="text" class="form-control" placeholder="First Name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="lname" type="text" class="form-control" placeholder="Last Name" required>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="phone" type="text" class="form-control" placeholder="Phone Number" required>
                            </div>
                            <div class="form-group">
                                <input name="email" type="text" class="form-control" placeholder="Email Address" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <!-- </div>
                        <div class="col-md-6"> -->
                            <div class="form-group">
                                <input name="website" type="text" class="form-control" placeholder="Website" required>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="country" class="form-control" placeholder="Country" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="state" class="form-control" placeholder="State" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="city" class="form-control" placeholder="City" required>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input name="ioi" type="text" class="form-control" placeholder="Industry of Interest" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input name="invrange" type="text" class="form-control" placeholder="Investment Range" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input name="average" type="text" class="form-control" placeholder="Avg. No. of Companies Invested per Year" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input name="cdesc" type="text" class="form-control" placeholder="Company Description" required>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input name="username" type="text" class="form-control" placeholder="Username" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input name="password_1" type="text" class="form-control" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input name="password_2" type="text" class="form-control" placeholder="Confirm Password" required>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btnSubmit" name="reginv_inst">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>
    <script src="js/validation.js"></script>    
</body>



