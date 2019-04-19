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
                            <select class="form-control" name="type" onchange="show()" id="selecttype" required>
                                <option value="NULL">--Select Type of Investor--</option>
                                <option value="Individual">Individual Investor</option>
                                <option value="Institution">Institution Investor</option>
                            </select>
                        </div>
                    </div>
                </div>


                <div id="individual">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="First Name" required value=""/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Last Name" required value=""/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Phone Number" required value=""/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email Address" required value=""/>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Country" required value=""/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="State" required value=""/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="City" required value=""/>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Industry of Interest" required value=""/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Investment Range" required value=""/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Avg. No. of Companies Invested per Year" required value=""/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Company Description - Describe yourself and the value of your company" required value=""/>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username" required value=""/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Password" required value=""/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Confirm Password" required value=""/>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btnSubmit">Submit</button>
                </div>


                <div id="institution">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Company Name" required value=""/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Founder Name" required value=""/>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Phone Number" required value=""/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email Address" required value=""/>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <!-- </div>
                        <div class="col-md-6"> -->
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Website" required value=""/>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Country" required value=""/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="State" required value=""/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="City" required value=""/>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Industry of Interest" required value=""/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Investment Range" required value=""/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Avg. No. of Companies Invested per Year" required value=""/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Company Description" required value=""/>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username" required value=""/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Password" required value=""/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Confirm Password" required value=""/>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btnSubmit">Submit</button>
                </div>
            </div>
        </div>
    </div>
</body>



