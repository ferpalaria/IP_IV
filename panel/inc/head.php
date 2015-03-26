<?php


function head(){

    $html  ="<meta charset=\"utf-8\">";
    $html .="<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">";
    $html .="<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">";
    $html .="<meta name=\"author\" content=\"Jeferson R. Costa\">";
    $html .="<link rel=\"shortcut icon\" href=\"../favicon.ico\">";
    $html .="<title>". TITLE ."</title>";

    $html .="<!-- Bootstrap Core CSS -->";
    $html .="<link href=\"css/bootstrap.min.css\" rel=\"stylesheet\">";

    $html .="<!-- MetisMenu CSS -->";
    $html .="<link href=\"css/plugins/metisMenu/metisMenu.min.css\" rel=\"stylesheet\">";

    $html .="<!-- DataTables CSS -->";
    $html .="<link href=\"css/plugins/dataTables.bootstrap.css\" rel=\"stylesheet\">";

    $html .="<!-- Timeline CSS -->";
    $html .="<link href=\"css/plugins/timeline.css\" rel=\"stylesheet\">";

    $html .="<!-- Custom CSS -->";
    $html .="<link href=\"css/sb-admin-2.css\" rel=\"stylesheet\">";

    $html .="<!-- Morris Charts CSS -->";
    $html .="<link href=\"css/plugins/morris.css\" rel=\"stylesheet\">";

    $html .="<!-- Custom Fonts -->";
    $html .="<link href=\"font-awesome-4.1.0/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\">";

    $html .="<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->";
    $html .="<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->";
    $html .="<!--[if lt IE 9]>";
    $html .="<script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>";
    $html .="<script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>";
    $html .="<![endif]-->";

    return $html;
}