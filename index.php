<?php
require_once 'settings.php';
?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <title><?=$projectName?> - social project management</title>
    
    <!--<link href="bootstrap/less/bootstrap.less" rel="stylesheet/less">-->
    <link href="bootstrap.css" rel="stylesheet">
    <link href="prettify/prettify.css" rel="stylesheet">
    <link href="fontAwesome/css/font-awesome.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    
    <script src="jquery.js" type="text/javascript"></script>
    <script src="prettify/prettify.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap-transition.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap-tooltip.js" type="text/javascript"></script>
    <script src="jquery.ba-outside-events.min.js" type="text/javascript"></script>
    <!--<script src="less.js" type="text/javascript"></script>-->
    <script src="script.js" type="text/javascript"></script>
  </head>
  
  <body>
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="#!/dashboard"><?=$projectName?></a>
            <ul class="nav">
                <li class="active"><a href="#!/dashboard" rel="tooltip" title="Dashboard"><i class="icon-th-large icon-white"></i></a></li>
                <li><a href="#!/projects" rel="tooltip" title="Projects" id="projects"><i class="icon-folder-open icon-white"></i></a></li>
                <li><a href="#!/messages" rel="tooltip" title="Messages"><i class="icon-inbox icon-white"></i></a></li>
                <li><a href="#!/calendar" rel="tooltip" title="Calendar"><i class="icon-calendar icon-white"></i></a></li>
                <li><a href="#!/tasks" rel="tooltip" title="Tasks"><i class="icon-list icon-white"></i></a></li>
                <li><a href="#!/files" rel="tooltip" title="Files"><i class="icon-file icon-white"></i></a></li>
            </ul>
            <div id="searchdiv">
                <!--<form action="" class="navbar-search pull-right">
                    <input id="search" class="search-query" type="text" autocomplete="off" placeholder="Search">
                    <span id="inputFieldOverlay"><a class="close">&times;</a></span>
                </form>-->
                <div id="searchResultContainer">
                    <table class="table table-striped table-bordered table-condensed span6" id="searchResults">
                        <tr>
                            <td><a href="#">first result</a></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div>
                <ul class="nav pull-right">
                    <li id="search"><a rel="tooltip" title="Search"><i class="icon-search icon-white"></i></a></li>
                    <li><a href="#!/settings" rel="tooltip" title="Settings"><i class="icon-cogs icon-white"></i></a></li>
                    <li><a href="#" rel="tooltip" title="Logout"><i class="icon-signout icon-white"></i></a></li>
                </ul>
            </div>
            <div class="pull-right">
                <div id="ajax-loader"><img src="img/ajax-loader.gif"></div>
            </div>
        </div>
      </div>
    </div>
    <div class="container" id="body">
        <div id="content">
        </div>
      <footer>
        <p>&copy; 2012</p>
      </footer>

    </div> <!-- /container -->
  </body>
</html>
