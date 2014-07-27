<?php

/* ::slider.html.twig */
class __TwigTemplate_d88e9c2c115d2bd36cbdc7ba7323bde459c4e1b80160692e1a38743bfcea31ae extends Twig_Template
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
        echo "<header id=\"myCarousel\" class=\"carousel slide\">
        <ol class=\"carousel-indicators\">
            <li data-target=\"#myCarousel\" data-slide-to=\"0\" class=\"active\"></li>
            <li data-target=\"#myCarousel\" data-slide-to=\"1\"></li>
            <li data-target=\"#myCarousel\" data-slide-to=\"2\"></li>
        </ol>
        <div class=\"carousel-inner\">
            <div class=\"item active\">
                <div class=\"fill\" style=\"background-image:url('";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/1.jpg"), "html", null, true);
        echo "');\"></div>
                <div class=\"carousel-caption\">
                    <h2>squid 1</h2>
                </div>
            </div>
            <div class=\"item\">
                <div class=\"fill\" style=\"background-image:url('";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/2.png"), "html", null, true);
        echo "');\"></div>
                <div class=\"carousel-caption\">
                    <h2>squid 2</h2>
                </div>
            </div>
            <div class=\"item\">
                <div class=\"fill\" style=\"background-image:url('";
        // line 21
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

 </header>";
    }

    public function getTemplateName()
    {
        return "::slider.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 9,  19 => 1,  190 => 81,  187 => 80,  180 => 73,  177 => 72,  171 => 64,  168 => 63,  134 => 85,  132 => 80,  127 => 77,  125 => 72,  118 => 67,  116 => 63,  103 => 53,  95 => 48,  83 => 39,  54 => 16,  46 => 11,  42 => 10,  38 => 15,  34 => 8,  22 => 1,  58 => 17,  55 => 14,  52 => 13,  47 => 21,  44 => 9,  41 => 8,  36 => 5,  33 => 4,  30 => 7,);
    }
}
