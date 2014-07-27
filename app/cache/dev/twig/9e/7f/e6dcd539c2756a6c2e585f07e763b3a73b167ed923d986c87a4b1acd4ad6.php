<?php

/* SquidProjectGeneralBundle:Menus:menuSource.html.twig */
class __TwigTemplate_9e7fe6dcd539c2756a6c2e585f07e763b3a73b167ed923d986c87a4b1acd4ad6 extends Twig_Template
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
        echo "<div  class=\"collapse navbar-collapse navbar-ex1-collapse\">
\t                <ul class=\"nav navbar-nav side-nav\">
\t                    <li>
\t                        <a href=\"";
        // line 4
        echo $this->env->getExtension('routing')->getPath("squid_project_general_source_newIP");
        echo "\"><i class=\"fa fa-fw fa-dashboard\"></i> Déclarer addresses IP</a>
\t                    </li>
\t                    <li>
\t                        <a href=\"";
        // line 7
        echo $this->env->getExtension('routing')->getPath("squid_project_general_source_new");
        echo "\"><i class=\"fa fa-fw fa-dashboard\"></i> Nouvelle Source</a>
\t                    </li>
\t                    <li>
\t                        <a href=\"\"><i class=\"fa fa-fw fa-bar-chart-o\"></i> Rechercher/Modifier une source </a>
\t                    </li>
\t                    <li>
\t                        <a href=\"\"><i class=\"fa fa-fw fa-table\"></i> Lister toutes les sources</a>
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
           \t\t</div>\t      ";
    }

    public function getTemplateName()
    {
        return "SquidProjectGeneralBundle:Menus:menuSource.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  24 => 4,  29 => 9,  19 => 1,  190 => 81,  187 => 80,  180 => 73,  177 => 72,  171 => 64,  168 => 63,  134 => 85,  132 => 80,  127 => 77,  125 => 72,  118 => 67,  116 => 63,  103 => 53,  95 => 48,  83 => 39,  54 => 16,  46 => 11,  42 => 10,  38 => 15,  34 => 8,  22 => 1,  58 => 17,  55 => 14,  52 => 13,  47 => 21,  44 => 9,  41 => 8,  36 => 5,  33 => 4,  30 => 7,);
    }
}
