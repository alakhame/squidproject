<?php

/* ::layoutSquid.html.twig */
class __TwigTemplate_da6b2b36d6891207d4b7b4e1c46ce119d2c8239993d2d540478737381c5f2ecd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'slider' => array($this, 'block_slider'),
            'menu' => array($this, 'block_menu'),
            'corps' => array($this, 'block_corps'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
\t
    <meta charset=\"utf-8\">
    <title>Premier Draft</title>
     <link href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
     <link href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/style.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
     <link href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/half-slider.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
     <link href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/aside-menu.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
    <link href= \"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/font-awesome.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\">
<style>

</style>

<script src=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>

</head>

  <body>
     
\t
\t<div class=\"navbar navbar-inverse navbar-fixed-top  \" role=\"navigation\">
      \t<div class=\"container\">
\t\t\t<div class=\"navbar-header\">
\t\t\t \t<button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">
\t\t\t    <span class=\"icon-bar\"></span>
\t\t\t    <span class=\"icon-bar\"></span>
\t\t\t    <span class=\"icon-bar\"></span>
\t\t\t  \t</button>
\t\t\t  \t<a class=\"navbar-brand\" href=\"#\">Squid Project</a>
\t\t\t</div>

\t\t\t<div class=\"collapse navbar-collapse\">
\t\t\t\t<ul class=\"nav navbar-nav\">
\t\t\t    \t<li class=\"active\"><a href=\"#\">Accueil</a></li>
\t\t\t\t    <li><a href=\"#item1\">Restrictions</a></li>
\t\t\t\t    <li><a href=\"";
        // line 39
        echo $this->env->getExtension('routing')->getPath("squid_project_general_source");
        echo "\">Utilisateurs source</a></li>
\t\t\t\t    <li><a href=\"#item2\">Destination</a></li>
\t\t\t\t  \t<li><a href=\"#item3\">Gestion des ACL</a></li>
\t\t\t\t  \t<li><a href=\"#item4\">Définition des Horaires</a></li>
\t\t\t  \t</ul>

\t\t\t\t<ul class=\"nav navbar-right top-nav\">
\t                
\t                <li class=\"dropdown\">
\t                    <a href=\"#\" style=\"color: rgb(153, 153, 153); \"class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"fa fa-user\"></i> ";
        // line 48
        echo twig_escape_filter($this->env, (isset($context["pseudo"]) ? $context["pseudo"] : $this->getContext($context, "pseudo")), "html", null, true);
        echo " <b class=\"caret\"></b></a>
\t                    <ul class=\"dropdown-menu\">
\t                        <li><a href=\"#\"><i class=\"fa fa-fw fa-user\"></i> Profil</a>  </li>
\t                        <li> <a href=\"#\"><i class=\"fa fa-fw fa-gear\"></i> Paramètres</a></li>
\t                        <li class=\"divider\"></li>
\t                        <li> <a href=\"";
        // line 53
        echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
        echo "\"><i class=\"fa fa-fw fa-power-off\"></i> Déconnection</a></li>
\t                    </ul>
\t                </li>
\t            </ul>
\t\t\t</div>


\t\t</div>
    </div>

    ";
        // line 63
        $this->displayBlock('slider', $context, $blocks);
        // line 67
        echo "
   \t<div class=\"container  starter-template\">
\t\t
\t\t<div class=\"row\">
\t\t\t<div class=\"col-lg-2\">
\t\t\t\t";
        // line 72
        $this->displayBlock('menu', $context, $blocks);
        // line 77
        echo "\t\t\t\t
\t\t\t</div>

\t\t\t";
        // line 80
        $this->displayBlock('corps', $context, $blocks);
        // line 85
        echo "


\t\t\t<div class=\"col-lg-2\">
\t\t\t  \t<aside class=\"col-lg-12\">Aside</aside>
\t\t\t\t<aside class=\"col-lg-12\">Aside</aside>\t      
\t\t\t</div>
\t\t</div>
\t\t<footer class=\"row\">
\t\t\t<div class=\"col-lg-12\">
\t\t\t  
\t\t\t\t<div id=\"footer-bottom\" class=\"grid_16\">
\t\t\t\t<div id=\"footer-logo\" class=\"grid_5 alpha\">
\t\t\t\t\t<a href=\"http://djolofsystem.com/\"><img src=\"http://djolofsystem.com/wp-content/themes/ds/images/logo_djolof_footer.png\" alt=\"Logo Jolof System\"></a>
\t\t\t\t</div>
\t\t\t\t<div class=\"grid_11 omega\">
\t\t\t\t 
\t\t\t\t<p>© 2014 Jolof System Inc. Tous droits réservés.</p>
\t\t\t</div>
\t\t</div>
\t\t
\t\t\t</div>
\t\t</footer>
\t</div>

\t
\t

  </body>
</html>
";
    }

    // line 63
    public function block_slider($context, array $blocks = array())
    {
        // line 64
        echo "

    ";
    }

    // line 72
    public function block_menu($context, array $blocks = array())
    {
        // line 73
        echo "


\t\t\t\t";
    }

    // line 80
    public function block_corps($context, array $blocks = array())
    {
        // line 81
        echo "


\t\t\t";
    }

    public function getTemplateName()
    {
        return "::layoutSquid.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  190 => 81,  187 => 80,  180 => 73,  177 => 72,  171 => 64,  168 => 63,  134 => 85,  132 => 80,  127 => 77,  125 => 72,  118 => 67,  116 => 63,  103 => 53,  95 => 48,  83 => 39,  54 => 16,  46 => 11,  42 => 10,  38 => 9,  34 => 8,  22 => 1,  58 => 17,  55 => 14,  52 => 13,  47 => 10,  44 => 9,  41 => 8,  36 => 5,  33 => 4,  30 => 7,);
    }
}
