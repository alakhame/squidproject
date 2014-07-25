<?php

/* SquidProjectUserBundle:Login:login.html.twig */
class __TwigTemplate_6c1dd32f8388faa630e9f19a298364df7f166e39d76c189fa5bc53ac461942b0 extends Twig_Template
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
        <form action=\"";
        // line 19
        echo $this->env->getExtension('routing')->getPath("fos_user_security_check");
        echo "\" class=\"form-signin\" role=\"form\">
        <h2 class=\"form-signin-heading\">Connectez vous</h2>
        <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 21
        echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : null), "html", null, true);
        echo "\" />

        <input type=\"text\"  id=\"username\" name=\"_username\" value=\"";
        // line 23
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : null), "html", null, true);
        echo "\" required=\"required\" class=\"form-control\" placeholder=\"login\" required autofocus>
        <input type=\"password\" id=\"password\" name=\"_password\" required=\"required\" class=\"form-control\" placeholder=\"mot de passe\" required>
        <div class=\"checkbox\">
          <label>
            <input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\" value=\"on\" > Se souvenir de moi </input>
          </label>
        </div>
        <button id=\"_submit\" name=\"_submit\" class=\"btn btn-lg btn-primary btn-block\" type=\"submit\">Connexion</button>
      </form>

    </div> 
  </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "SquidProjectUserBundle:Login:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 23,  50 => 21,  45 => 19,  32 => 9,  28 => 8,  19 => 1,);
    }
}
