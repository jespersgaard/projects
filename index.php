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
    
    <script src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script>
    <script src="prettify/prettify.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap-transition.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap-tooltip.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap-popover.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap-dropdown.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap-alert.js" type="text/javascript"></script>
    <script src="jquery.ba-outside-events.min.js" type="text/javascript"></script>
    <!--<script src="less.js" type="text/javascript"></script>-->
    <script src="script.js" type="text/javascript"></script>
  </head>
  
  <body>
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="#!/"><?=$projectName?></a>
            <ul class="nav">
                <li><a href="#!/dashboard" rel="tooltip" title="Dashboard"><i class="icon-th-large"></i></a></li>
                <li><a href="#!/projects" rel="tooltip" title="Projects"><i class="icon-folder-open"></i></a></li>
                <li><a href="#!/messages" rel="tooltip" title="Messages"><i class="icon-inbox"></i></a></li>
                <li><a href="#!/calendar" rel="tooltip" title="Calendar"><i class="icon-calendar"></i></a></li>
                <li><a href="#!/tasks" rel="tooltip" title="Tasks"><i class="icon-list"></i></a></li>
                <li><a href="#!/files" rel="tooltip" title="Files"><i class="icon-file"></i></a></li>
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
                    <li id="search">
                        <a rel="tooltip" title="Search"><i class="icon-search"></i></a>
                    </li><li>
                        <a href="#!/settings" rel="tooltip" title="Settings"><i class="icon-cogs"></i></a>
                    </li><li>
                        <a href="#!/logout" rel="tooltip" title="Logout"><i class="icon-signout"></i></a>
                    </li>
                </ul>
            </div>
            <div class="pull-right">
                <div id="ajax-loader"><img src="img/ajax-loader.gif"></div>
            </div>
        </div>
      </div>
    </div>
    <div class="container" id="body">
        <div id="alertArea">    
        </div>
        <div id="breadcrumb">
        </div>
        <div id="content">
        </div>
        <footer class="footer">
            <p>&copy; projects 2012</p>
            <p><a href="https://github.com/Wuschli/projects" target="_blank"><i class="icon-github-sign"></i> Visit projects on Github!</a></p>
        </footer>
    </div> <!-- /container -->
  </body>
</html>
