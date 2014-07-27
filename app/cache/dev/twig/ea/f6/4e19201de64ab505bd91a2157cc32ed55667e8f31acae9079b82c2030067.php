<?php

/* SquidProjectGeneralBundle:General:sourceNewIP.html.twig */
class __TwigTemplate_eaf64e19201de64ab505bd91a2157cc32ed55667e8f31acae9079b82c2030067 extends Twig_Template
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
        echo "\t<div style=\"padding-left:150px; padding-top:50px  \" class=\"col-lg-8\" >
\t\t<form role=\"form\" method=\"post\" action=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("squid_project_general_source_newIP");
        echo "\">
\t\t<fieldset>
             <div class=\"form-group \">
                <label class=\"control-label\" for=\"type\">Type de la source</label>
                <select class=\"form-control\" name=\"type\" id=\"type\">
                \t<option value=\"\"></option>
                    <option value=\"1\">fichier d'adresses IPs</option>
                    <option value=\"2\">Plage d'addresses</option>
                    <option value=\"3\">Adresse avec CIDR</option>
                </select>
            </div>

            <div class=\"form-group \">
                <label class=\"control-label\" for=\"fichierip\">Nom du fichier d'IPs</label>
                <input type=\"text\" class=\"form-control\" id=\"fichierip\" name=\"fichierip\">
            </div>
            <div class=\"form-group \">
                <label class=\"control-label\" for=\"plageip\">Plage d'addresses</label>
                <input type=\"text\" class=\"form-control\" id=\"plageip\" name=\"plageip\">
            </div>
            <div class=\"form-group \">
                <label class=\"control-label\" for=\"cidr\">Adresse avec CIDR</label>
                <input type=\"text\" class=\"form-control \" id=\"cidr\" name=\"cidr\">
            </div>
            <button type=\"submit\" class=\"btn btn-primary\">Déclarer</button>
        </fieldset>
        </form>\t
\t</div>

\t<script type=\"text/javascript\">
\t\t\$(function(){
\t\t  \tvar input1=\$(\"#fichierip\");
\t\t  \tvar input2=\$(\"#plageip\");
\t\t  \tvar input3=\$(\"#cidr\");
\t\t  \tinput1.prop('disabled', true);
\t\t  \tinput2.prop('disabled', true);
\t\t  \tinput3.prop('disabled', true);
\t\t

\t\t\tvar type= \$(\"#type\");
\t\t\ttype.click(function(){
\t\t\t\tvar n=type.val();
\t\t\t\tif(n==1){
\t\t\t\t\tinput1.prop('disabled', false); input2.prop('disabled', true); input3.prop('disabled', true);
\t\t\t\t}
\t\t\t\telse if(n==2){
\t\t\t\t\tinput2.prop('disabled', false); input1.prop('disabled', true); input3.prop('disabled', true);
\t\t\t\t}
\t\t\t\telse if(n==3){
\t\t\t\t\tinput3.prop('disabled', false); input2.prop('disabled', true); input1.prop('disabled', true);
\t\t\t\t}
\t\t\t\telse{
\t\t\t\t\tinput3.prop('disabled', true); input2.prop('disabled', true); input1.prop('disabled', true);
\t\t\t\t}

\t\t\t});
\t\t});
\t</script>
";
    }

    public function getTemplateName()
    {
        return "SquidProjectGeneralBundle:General:sourceNewIP.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 15,  55 => 14,  52 => 13,  47 => 10,  44 => 9,  41 => 8,  36 => 5,  33 => 4,  30 => 3,);
    }
}
