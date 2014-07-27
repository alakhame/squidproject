<?php

/* SquidProjectGeneralBundle:Source:sourceNew.html.twig */
class __TwigTemplate_cf46907978ed1ab43c0809d57d06c9e9cdc8a2cf5f7e4ee8247ad11aae05c5ba extends Twig_Template
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
\t\t<button   style=\"float:right\" class=\"btn btn-primary\" id=\"addnew\">Nouvelle @ Ip</button>
\t\t<form role=\"form\"  style=\"margin-top:20px\" method=\"post\" action=\"";
        // line 16
        echo $this->env->getExtension('routing')->getPath("squid_project_general_source_new");
        echo "\">
\t\t <fieldset id=\"field\">
            <div class=\"form-group \">
                <label class=\"control-label\" for=\"nom\">Nom de la source</label>
                <input type=\"text\" class=\"form-control\" id=\"nom\" name=\"nom\">
            </div>

            <div class=\"form-group \" id=\"g1\">
                <label class=\"control-label\" for=\"sel1\">Adresses IPs</label>
                <select class=\"form-control\" name=\"sel1\" id=\"sel1\">
                    ";
        // line 26
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["ips"]) ? $context["ips"] : $this->getContext($context, "ips")));
        foreach ($context['_seq'] as $context["_key"] => $context["ip"]) {
            // line 27
            echo "                    \t<option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ip"]) ? $context["ip"] : $this->getContext($context, "ip")), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ip"]) ? $context["ip"] : $this->getContext($context, "ip")), "ip"), "html", null, true);
            echo "</option>
                \t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ip'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "                </select>
\t        </div>
\t        <div class=\"form-group \" id=\"g2\">
                <label class=\"control-label\" for=\"sel2\">Adresses IPs</label>
                <select class=\"form-control\" name=\"sel2\" id=\"sel2\">
                    ";
        // line 34
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["ips"]) ? $context["ips"] : $this->getContext($context, "ips")));
        foreach ($context['_seq'] as $context["_key"] => $context["ip"]) {
            // line 35
            echo "                    \t<option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ip"]) ? $context["ip"] : $this->getContext($context, "ip")), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ip"]) ? $context["ip"] : $this->getContext($context, "ip")), "ip"), "html", null, true);
            echo "</option>
                \t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ip'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "                </select>
\t        </div>
\t        <div class=\"form-group \" id=\"g3\">
                <label class=\"control-label\" for=\"sel3\">Adresses IPs</label>
                <select class=\"form-control\" name=\"sel3\" id=\"sel3\">
                    ";
        // line 42
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["ips"]) ? $context["ips"] : $this->getContext($context, "ips")));
        foreach ($context['_seq'] as $context["_key"] => $context["ip"]) {
            // line 43
            echo "                    \t<option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ip"]) ? $context["ip"] : $this->getContext($context, "ip")), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ip"]) ? $context["ip"] : $this->getContext($context, "ip")), "ip"), "html", null, true);
            echo "</option>
                \t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ip'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        echo "                </select>
\t        </div>
\t        <div class=\"form-group \" id=\"g4\">
                <label class=\"control-label\" for=\"sel4\">Adresses IPs</label>
                <select class=\"form-control\" name=\"sel4\" id=\"sel4\">
                    ";
        // line 50
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["ips"]) ? $context["ips"] : $this->getContext($context, "ips")));
        foreach ($context['_seq'] as $context["_key"] => $context["ip"]) {
            // line 51
            echo "                    \t<option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ip"]) ? $context["ip"] : $this->getContext($context, "ip")), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ip"]) ? $context["ip"] : $this->getContext($context, "ip")), "ip"), "html", null, true);
            echo "</option>
                \t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ip'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 53
        echo "                </select>
\t        </div>
\t        <div class=\"form-group \" id=\"g5\">
                <label class=\"control-label\" for=\"sel5\">Adresses IPs</label>
                <select class=\"form-control\" name=\"sel5\" id=\"sel5\">
                    ";
        // line 58
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["ips"]) ? $context["ips"] : $this->getContext($context, "ips")));
        foreach ($context['_seq'] as $context["_key"] => $context["ip"]) {
            // line 59
            echo "                    \t<option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ip"]) ? $context["ip"] : $this->getContext($context, "ip")), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ip"]) ? $context["ip"] : $this->getContext($context, "ip")), "ip"), "html", null, true);
            echo "</option>
                \t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ip'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        echo "                </select>
\t        </div>
\t        <input type=\"hidden\"  id=\"count\" name=\"count\" value=\"1\">
\t\t</fieldset>
            <button type=\"submit\" class=\"btn btn-primary\">Ajouter</button>
        
        </form>\t
\t</div>

\t<script type=\"text/javascript\">
\t\t\$(function(){
\t\t\tfunction init(){
\t\t\t\tfor(var i=2; i<6;i++){
\t\t\t\t\t\$(\"#g\"+i).hide();
\t\t\t\t}
\t\t\t} 

\t\t\tinit();
\t\t   var add= \$(\"#addnew\");
\t\t   add.click(function(){
\t\t   \t\tvar c= parseInt(\$(\"#count\").attr(\"value\"))+1;
\t\t   \t\tif(c<6){
\t\t   \t\t\t\$(\"#count\").attr(\"value\",c);
\t\t   \t\t\t\$(\"#g\"+c).show(500);
\t\t\t\t\t
\t\t\t\t}
\t\t\t\telse alert(\"vous ne pouvez pas dépasser ce nombre maximum\");
\t\t\t\t
\t\t   });
\t\t});
\t</script>
";
    }

    public function getTemplateName()
    {
        return "SquidProjectGeneralBundle:Source:sourceNew.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  175 => 61,  164 => 59,  160 => 58,  153 => 53,  142 => 51,  138 => 50,  131 => 45,  120 => 43,  116 => 42,  109 => 37,  98 => 35,  94 => 34,  87 => 29,  76 => 27,  72 => 26,  59 => 16,  55 => 14,  52 => 13,  47 => 10,  44 => 9,  41 => 8,  36 => 5,  33 => 4,  30 => 3,);
    }
}
