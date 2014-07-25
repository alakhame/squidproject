<?php

/* SquidProjectGeneralBundle:General:accueil.html.twig */
class __TwigTemplate_d76b3bff8a9c5564a7b9c19051e4857290c0d67516214fcb2eb1cb8b0f07d154 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
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
\t\t\t\t    <li><a href=\"#item2\">Utilisateurs</a></li>
\t\t\t\t  \t<li><a href=\"#item3\">Gestion des ACL</a></li>
\t\t\t\t  \t<li><a href=\"#item4\">Définition Horaires</a></li>
\t\t\t  \t</ul>

\t\t\t\t<ul class=\"nav navbar-right top-nav\">
\t                
\t                <li class=\"dropdown\">
\t                    <a href=\"#\" style=\"color: rgb(153, 153, 153); \"class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"fa fa-user\"></i> ";
        // line 44
        echo twig_escape_filter($this->env, (isset($context["pseudo"]) ? $context["pseudo"] : $this->getContext($context, "pseudo")), "html", null, true);
        echo " <b class=\"caret\"></b></a>
\t                    <ul class=\"dropdown-menu\">
\t                        <li><a href=\"#\"><i class=\"fa fa-fw fa-user\"></i> Profil</a>  </li>
\t                        <li> <a href=\"#\"><i class=\"fa fa-fw fa-gear\"></i> Paramètres</a></li>
\t                        <li class=\"divider\"></li>
\t                        <li> <a href=\"";
        // line 49
        echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
        echo "\"><i class=\"fa fa-fw fa-power-off\"></i> Déconnection</a></li>
\t                    </ul>
\t                </li>
\t            </ul>
\t\t\t</div>


\t\t</div>
    </div>

    <header id=\"myCarousel\" class=\"carousel slide\">
        <ol class=\"carousel-indicators\">
            <li data-target=\"#myCarousel\" data-slide-to=\"0\" class=\"active\"></li>
            <li data-target=\"#myCarousel\" data-slide-to=\"1\"></li>
            <li data-target=\"#myCarousel\" data-slide-to=\"2\"></li>
        </ol>
        <div class=\"carousel-inner\">
            <div class=\"item active\">
                <div class=\"fill\" style=\"background-image:url('";
        // line 67
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/1.jpg"), "html", null, true);
        echo "');\"></div>
                <div class=\"carousel-caption\">
                    <h2>squid 1</h2>
                </div>
            </div>
            <div class=\"item\">
                <div class=\"fill\" style=\"background-image:url('";
        // line 73
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/2.png"), "html", null, true);
        echo "');\"></div>
                <div class=\"carousel-caption\">
                    <h2>squid 2</h2>
                </div>
            </div>
            <div class=\"item\">
                <div class=\"fill\" style=\"background-image:url('";
        // line 79
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/3.jpeg"), "html", null, true);
        echo "');\"></div>
                <div class=\"carousel-caption\">
                    <h2>squid 3</h2>
                </div>
            </div>
        </div>

        <a class=\"left carousel-control\" href=\"#myCarousel\" data-slide=\"prev\">
            <span class=\"icon-prev\"></span>
        </a>
        <a class=\"right carousel-control\" href=\"#myCarousel\" data-slide=\"next\">
            <span class=\"icon-next\"></span>
        </a>

    </header>

   \t<div class=\"container  starter-template\">
\t\t
\t\t<div class=\"row\">
\t\t\t<div class=\"col-lg-2\">
\t\t\t\t<div class=\"collapse navbar-collapse navbar-ex1-collapse\">
\t                <ul class=\"nav navbar-nav side-nav\">
\t                    <li>
\t                        <a href=\"\"><i class=\"fa fa-fw fa-dashboard\"></i> Menu 1</a>
\t                    </li>
\t                    <li>
\t                        <a href=\"\"><i class=\"fa fa-fw fa-bar-chart-o\"></i> Menu 2</a>
\t                    </li>
\t                    <li>
\t                        <a href=\"\"><i class=\"fa fa-fw fa-table\"></i> Menu 3</a>
\t                    </li>
\t                    <li>
\t                        <a href=\"\"><i class=\"fa fa-fw fa-edit\"></i> Menu 4</a>
\t                    </li>
\t                    <li>
\t                        <a href=\"\"><i class=\"fa fa-fw fa-desktop\"></i> Menu 5</a>
\t                    </li>
\t                    <li>
\t                        <a href=\"\"><i class=\"fa fa-fw fa-wrench\"></i> Menu 6</a>
\t                    </li>
\t                    <li>
\t                        <a href=\"javascript:;\" data-toggle=\"collapse\" data-target=\"#demo\"><i class=\"fa fa-fw fa-arrows-v\"></i> Menu 7<i class=\"fa fa-fw fa-caret-down\"></i></a>
\t                        <ul id=\"demo\" class=\"collapse\">
\t                            <li>
\t                                <a href=\"#\">Menu 71</a>
\t                            </li>
\t                            <li>
\t                                <a href=\"#\">Menu 72</a>
\t                            </li>
\t                        </ul>
\t                    </li>
\t                   
\t                </ul>
           \t\t</div>\t      
\t\t\t</div>

\t\t\t<div class=\"col-lg-8\" >
\t\t\t\tSection\t\t\t
\t\t\t</div>
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
\t<script src=\"";
        // line 161
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 162
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>

  </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "SquidProjectGeneralBundle:General:accueil.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  215 => 162,  211 => 161,  126 => 79,  117 => 73,  108 => 67,  87 => 49,  79 => 44,  43 => 11,  39 => 10,  35 => 9,  31 => 8,  27 => 7,  19 => 1,);
    }
}
