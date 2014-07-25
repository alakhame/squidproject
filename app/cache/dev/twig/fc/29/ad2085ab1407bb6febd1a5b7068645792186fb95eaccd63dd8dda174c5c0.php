<?php

/* SquidProjectGeneralBundle:General:login.html.twig */
class __TwigTemplate_fc29ad2085ab1407bb6febd1a5b7068645792186fb95eaccd63dd8dda174c5c0 extends Twig_Template
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
<html lang=\"fr\">
  <head>
    <meta charset=\"utf-8\">

    <title>Login</title>

    <link href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap.css"), "html", null, true);
        echo "\"rel=\"stylesheet\">
    <link href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/login.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
    <style>
  

    </style>

  </head>

  <body>
    <div class=\"container\">
        <form class=\"form-signin\" role=\"form\">
        <h2 class=\"form-signin-heading\">Connectez vous</h2>
        <input type=\"text\" class=\"form-control\" placeholder=\"login\" required autofocus>
        <input type=\"password\" class=\"form-control\" placeholder=\"mot de passe\" required>
        <div class=\"checkbox\">
          <label>
            <input type=\"checkbox\" value=\"remember-me\"> Se souvenir de moi </input>
          </label>
        </div>
        <button class=\"btn btn-lg btn-primary btn-block\" type=\"submit\">Connexion</button>
      </form>

    </div> 
  </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "SquidProjectGeneralBundle:General:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  32 => 9,  28 => 8,  19 => 1,);
    }
}
