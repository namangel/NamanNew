<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <title>Accordion</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    
        <style>
            a{text-decoration:none}
            h4{text-align:center;margin:30px 0;color:#444}
            .main-timeline{position:relative}
            .main-timeline:before{content:"";width:5px;height:100%;border-radius:20px;margin:0 auto;background:#242922;position:absolute;top:0;left:0;right:0}
            .main-timeline .timeline{display:inline-block;margin-bottom:50px;position:relative}
            .main-timeline .timeline:before{content:"";width:20px;height:20px;border-radius:50%;border:4px solid #fff;background:#ec496e;position:absolute;top:50%;left:50%;z-index:1;transform:translate(-50%,-50%)}
            .main-timeline .timeline-icon{display:inline-block;width:130px;height:130px;border-radius:50%;border:3px solid #ec496e;padding:13px;text-align:center;position:absolute;top:50%;left:30%;transform:translateY(-50%)}
            .main-timeline .timeline-icon i{display:block;border-radius:50%;background:#ec496e;font-size:64px;color:#fff;line-height:100px;z-index:1;position:relative}
            .main-timeline .timeline-icon:after,.main-timeline .timeline-icon:before{content:"";width:100px;height:4px;background:#ec496e;position:absolute;top:50%;right:-100px;transform:translateY(-50%)}
            .main-timeline .timeline-icon:after{width:70px;height:50px;background:#fff;top:89px;right:-30px}
            .main-timeline .timeline-content{width:50%;padding:0 50px;margin:52px 0 0;float:right;position:relative}
            .main-timeline .timeline-content:before{content:"";width:70%;height:100%;border:3px solid #ec496e;border-top:none;border-right:none;position:absolute;bottom:-13px;left:35px}
            .main-timeline .timeline-content:after{content:"";width:37px;height:3px;background:#ec496e;position:absolute;top:13px;left:0}
            .main-timeline .title{font-size:20px;font-weight:600;color:#ec496e;text-transform:uppercase;margin:0 0 5px}
            .main-timeline .description{display:inline-block;font-size:16px;color:#404040;line-height:20px;letter-spacing:1px;margin:0}
            .main-timeline .timeline:nth-child(even) .timeline-icon{left:auto;right:30%}
            .main-timeline .timeline:nth-child(even) .timeline-icon:before{right:auto;left:-100px}
            .main-timeline .timeline:nth-child(even) .timeline-icon:after{right:auto;left:-30px}
            .main-timeline .timeline:nth-child(even) .timeline-content{float:left}
            .main-timeline .timeline:nth-child(even) .timeline-content:before{left:auto;right:35px;transform:rotateY(180deg)}
            .main-timeline .timeline:nth-child(even) .timeline-content:after{left:auto;right:0}
            .main-timeline .timeline:nth-child(2n) .timeline-content:after,.main-timeline .timeline:nth-child(2n) .timeline-icon i,.main-timeline .timeline:nth-child(2n) .timeline-icon:before,.main-timeline .timeline:nth-child(2n):before{background:#f9850f}
            .main-timeline .timeline:nth-child(2n) .timeline-icon{border-color:#f9850f}
            .main-timeline .timeline:nth-child(2n) .title{color:#f9850f}
            .main-timeline .timeline:nth-child(2n) .timeline-content:before{border-left-color:#f9850f;border-bottom-color:#f9850f}
            .main-timeline .timeline:nth-child(3n) .timeline-content:after,.main-timeline .timeline:nth-child(3n) .timeline-icon i,.main-timeline .timeline:nth-child(3n) .timeline-icon:before,.main-timeline .timeline:nth-child(3n):before{background:#8fb800}
            .main-timeline .timeline:nth-child(3n) .timeline-icon{border-color:#8fb800}
            .main-timeline .timeline:nth-child(3n) .title{color:#8fb800}
            .main-timeline .timeline:nth-child(3n) .timeline-content:before{border-left-color:#8fb800;border-bottom-color:#8fb800}
            .main-timeline .timeline:nth-child(4n) .timeline-content:after,.main-timeline .timeline:nth-child(4n) .timeline-icon i,.main-timeline .timeline:nth-child(4n) .timeline-icon:before,.main-timeline .timeline:nth-child(4n):before{background:#2fcea5}
            .main-timeline .timeline:nth-child(4n) .timeline-icon{border-color:#2fcea5}
            .main-timeline .timeline:nth-child(4n) .title{color:#2fcea5}
            .main-timeline .timeline:nth-child(4n) .timeline-content:before{border-left-color:#2fcea5;border-bottom-color:#2fcea5}
            @media only screen and (max-width:1200px){.main-timeline .timeline-icon:before{width:50px;right:-50px}
            .main-timeline .timeline:nth-child(even) .timeline-icon:before{right:auto;left:-50px}
            .main-timeline .timeline-content{margin-top:75px}
            }
            @media only screen and (max-width:990px){.main-timeline .timeline{margin:0 0 10px}
            .main-timeline .timeline-icon{left:25%}
            .main-timeline .timeline:nth-child(even) .timeline-icon{right:25%}
            .main-timeline .timeline-content{margin-top:115px}
            }
            @media only screen and (max-width:767px){.main-timeline{padding-top:50px}
            .main-timeline:before{left:80px;right:0;margin:0}
            .main-timeline .timeline{margin-bottom:70px}
            .main-timeline .timeline:before{top:0;left:83px;right:0;margin:0}
            .main-timeline .timeline-icon{width:60px;height:60px;line-height:40px;padding:5px;top:0;left:0}
            .main-timeline .timeline:nth-child(even) .timeline-icon{left:0;right:auto}
            .main-timeline .timeline-icon:before,.main-timeline .timeline:nth-child(even) .timeline-icon:before{width:25px;left:auto;right:-25px}
            .main-timeline .timeline-icon:after,.main-timeline .timeline:nth-child(even) .timeline-icon:after{width:25px;height:30px;top:44px;left:auto;right:-5px}
            .main-timeline .timeline-icon i{font-size:30px;line-height:45px}
            .main-timeline .timeline-content,.main-timeline .timeline:nth-child(even) .timeline-content{width:100%;margin-top:-15px;padding-left:130px;padding-right:5px}
            .main-timeline .timeline:nth-child(even) .timeline-content{float:right}
            .main-timeline .timeline-content:before,.main-timeline .timeline:nth-child(even) .timeline-content:before{width:50%;left:120px}
            .main-timeline .timeline:nth-child(even) .timeline-content:before{right:auto;transform:rotateY(0)}
            .main-timeline .timeline-content:after,.main-timeline .timeline:nth-child(even) .timeline-content:after{left:85px}
            }
            @media only screen and (max-width:479px){.main-timeline .timeline-content,.main-timeline .timeline:nth-child(2n) .timeline-content{padding-left:110px}
            .main-timeline .timeline-content:before,.main-timeline .timeline:nth-child(2n) .timeline-content:before{left:99px}
            .main-timeline .timeline-content:after,.main-timeline .timeline:nth-child(2n) .timeline-content:after{left:65px}
            }

        </style>
    </head>
    <body>
    <?php require "include/header/mainheader.php"?>
        <div class="container">
            <h4>Learn what we do in just a few simple steps:</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="main-timeline">
                        <a href="#" class="timeline">
                            <div class="timeline-icon"><i class="fa fa-globe"></i></div>
                            <div class="timeline-content">
                                <h3 class="title">Startups Build Profiles</h3>
                                <p class="description">
                                    Startups register on our platform and pitch their ideas in a methodical documented approach. Templates and services are available for building profiles, making it a very simple process. If any other consulting is needed, contact our team and we shall work towards providing a solution. 
                                </p>
                            </div>
                        </a>
                        <a href="#" class="timeline">
                            <div class="timeline-icon"><i class="fa fa-rocket"></i></div>
                            <div class="timeline-content">
                                <h3 class="title">Verification</h3>
                                <p class="description">
                                    Only verified startups are shown to our investors. Our team works tirelessly to authenticate every profile and showcases only genuine startups.
                                </p>
                            </div>
                        </a>
                        <a href="#" class="timeline">
                            <div class="timeline-icon"><i class="fa fa-briefcase"></i></div>
                            <div class="timeline-content">
                                <h3 class="title">Investors browse startup profiles</h3>
                                <p class="description">
                                    Verified member investors can browse through the startup profiles and through a single click notify our team. Non-members can see basic details of startups. No information is misused. Take note of our privacy policy. 
                                </p>
                            </div>
                        </a>
                        <a href="#" class="timeline">
                            <div class="timeline-icon"><i class="fa fa-mobile"></i></div>
                            <div class="timeline-content">
                                <h3 class="title">Naman connects both</h3>
                                <p class="description">
                                    Our team connects interested investors to respective startups. Face to face meetings or via skype or phone calls shall be arranged.
                                </p>
                            </div>
                        </a>
                        <a href="#" class="timeline">
                            <div class="timeline-icon"><i class="fa fa-mobile"></i></div>
                            <div class="timeline-content">
                                <h3 class="title">Deal Complete</h3>
                                <p class="description">
                                    All formal procedures are taken care of and the transactions progress, thereby benefiting both parties. 
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, delectus.  
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
        <?php require "include/footer/footer.php"?>
    </body>
</html>