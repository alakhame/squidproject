<?php

/* SquidProjectGeneralBundle:Source:source.html.twig */
class __TwigTemplate_0cfa58a2c919a7467c5f7927740ef023f6db161053cbc39a8fb502ccbcc35743 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::layoutSquid.html.twig");

        $this->blocks = array(
            'slider' => array($this, 'block_slider'),
            'menu' => array($this, 'block_menu'),
            'corps' => array($this, 'block_corps'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::layoutSquid.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_slider($context, array $blocks = array())
    {
        // line 4
        echo "\t";
        $this->env->loadTemplate("::slider.html.twig")->display($context);
        // line 5
        echo "
";
    }

    // line 8
    public function block_menu($context, array $blocks = array())
    {
        // line 9
        echo "\t";
        $this->env->loadTemplate("SquidProjectGeneralBundle:Menus:menuSource.html.twig")->display($context);
        // line 10
        echo "
";
    }

    // line 13
    public function block_corps($context, array $blocks = array())
    {
        // line 14
        echo "\t<div class=\"col-lg-8\" >
\t\t\t\tSection\t\t\t
\t</div>
";
    }

    public function getTemplateName()
    {
        return "SquidProjectGeneralBundle:Source:source.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 14,  52 => 13,  47 => 10,  44 => 9,  41 => 8,  36 => 5,  33 => 4,  30 => 3,);
    }
}
