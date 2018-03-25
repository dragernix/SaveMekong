<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Save Mekong</title>
<!--
Short HTML Template
http://www.templatemo.com/tm-502-short
-->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/easy-responsive-tabs.min.css">
        <link rel="stylesheet" href="css/tabs.css">
        <link rel="stylesheet" href="css/templatemo-style.css">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <!-- Laoding page  -->
    <div class="preloader">
      <div class="spinner">
        <div class="dot1"></div>
        <div class="dot2"></div>
      </div>
    </div>
    <!-- End Laoding page  -->

    <!-- Begin HorizontalTab style 6 -->
    <section class="section-full image-bg">

      <div class="container">

        <div class="row">

          <div class="col-md-12">

            <a href="index.php"><div class="responsive-logo hidden-lg hidden-md hidden-sm"><img src="img/logo.png"></div></a>
            
            <!-- Begin .HorizontalTab -->
            <div class="VerticalTab VerticalTab_hash_scroll VerticalTab_6 tabs_ver_6">
            
              <ul class="resp-tabs-list hor_1">
                <a href="index.php"><div class="logo"><img src="img/logo.png"></div></a>
                <li class="tabs-1" data-tab-name="suggestion"><span class="tabs-text">Suggestion</span></li>
                <li class="tabs-2" data-tab-name="addsuggestions"><span class="tabs-text">Add suggestions</span></li>
                <li class="tabs-3" data-tab-name="emailrelevant"><span class="tabs-text">Email relevant authorities</span></li>
              </ul>
              
              <div class="resp-tabs-container hor_1 tabs_scroll">
                
                <div class="fc-tab-1">
                
                  <div class="home-container">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="left-content">
                          <div class="left-line"></div>  
                          <h2>List of Suggestions </h2><p><ul>
                          <?php
                            require_once "SuggestionDao.php";
                            $dao = new SuggestionDAO();
                            if(count($dao->getSuggestions()) >0){
                                echo "<ul>";
                                foreach ($dao->getSuggestions() as $item){
                                    echo "<li>";
                                    echo $item;
                                    echo "</li>";
                                }
                                echo "</ul>";
                            }
                            else{
                                echo "There are no suggestions yet :(";
                            }
                        ?>
                        </ul>
                        </p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="right-content">
                          <img src="img/home-mekong.jpg" width="370" height="390">
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
                
                <div class="fc-tab-2" >
                
                  <div class="about-container lowerbottom">
                    <div class="row">
                      <div class="col-md-12">
                        <h2>Add suggestions</h2>
                        <div class="under-line"></div>
                        <form action = 'processSuggestion.php' method = 'GET'> 
                            Suggestion: <input type = text name='suggest'/>
                            <input type = submit value ='Submit'/>
                        </form>
                      </div>
                    </div>
                  </div>
                  
                </div>
                
                <div class="fc-tab-3" >
                
                <div class="home-container lowerbottom">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="left-content">
                          <div class="left-line"></div>  
                          <h2>List of Suggestions </h2><p><ul>
                          <?php
                            require_once "SuggestionDao.php";
                            $dao = new SuggestionDAO();
                            echo "<form method = 'GET' action = 'processEmails.php'>";
                            if(count($dao->getSuggestions()) >0){
                                echo "<table>";
                                foreach ($dao->getSuggestions() as $item){
                                    echo "<tr><td>";
                                    echo $item;
                                    echo "</td><td>";
                                    echo "<input type = 'checkbox' name='toEmail[]' value ='$item'/";
                                    echo "</td></tr>";
                                }
                                echo "</table>";
                            }
                            else{
                                echo "There are no suggestions yet :(";
                            }
                        ?>
                        </ul>
                        </p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="left-content">
                            <div class="left-line"></div>  
                          <h2>List of Relevant Authorities </h2><p><ul>
                              <table><tr><td>Relevant authority 1</td><td><input type = 'checkbox' name='authority[]' value = 'chuamingyu@yahoo.com.sg'></td></tr>
                                <tr><td>Relevant authority 2</td><td><input type='checkbox' name='authority[]' value = 'lim.jinyang@dhs.sg'></td></tr>
                            </table>
                        </div>
                      </div>
                    </div>
                    <input type = 'submit' value = 'Email selected items' class = 'test'/>
                  </div>
                  
                  
                  
                </div>
                
                
              </div>
            </div>
            <!-- End .HorizontalTab -->
          
          </div>
          
        </div>
        
      </div>

    </section>
    <!-- End HorizontalTab style 6 -->
    

      <footer>
        <p>Copyright &copy; 2018 Save Mekong 
                                
        | Design: <a href="http://www.templatemo.com" target="_parent"><em>template mo</em></a></p>
      </footer>
    </div> <!-- /container -->        

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script src="js/jquery.nicescroll.min.js"></script>
        <script src="js/easyResponsiveTabs.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    

    </body>
</html>
