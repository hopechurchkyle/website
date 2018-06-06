<?php

/* @particles/logo.html.twig */
class __TwigTemplate_fab1d9869088c7f448d49109fc90fcdcae23d68a8e2c01933a40187155fb3ba7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@nucleus/partials/particle.html.twig", "@particles/logo.html.twig", 1);
        $this->blocks = array(
            'particle' => array($this, 'block_particle'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@nucleus/partials/particle.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_particle($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $context["url"] = _twig_default_filter($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute(($context["particle"] ?? null), "url", array())), $this->getAttribute(($context["gantry"] ?? null), "siteUrl", array(), "method"));
        // line 5
        echo "    ";
        if ((($context["url"] ?? null) == $this->getAttribute(($context["gantry"] ?? null), "siteUrl", array(), "method"))) {
            $context["rel"] = "rel=\"home\"";
        }
        // line 6
        echo "    ";
        $context["class"] = (($this->getAttribute(($context["particle"] ?? null), "class", array())) ? ((("class=\"" . $this->getAttribute(($context["particle"] ?? null), "class", array())) . "\"")) : (""));
        // line 7
        echo "    ";
        $context["image"] = $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute(($context["particle"] ?? null), "image", array()));
        // line 8
        echo "    
    ";
        // line 9
        if (($this->getAttribute(($context["particle"] ?? null), "link", array()) == true)) {
            // line 10
            echo "        <a href=\"";
            echo twig_escape_filter($this->env, ($context["url"] ?? null), "html", null, true);
            echo "\" target=\"";
            echo twig_escape_filter($this->env, (($this->getAttribute(($context["particle"] ?? null), "target", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "target", array()), "_self")) : ("_self")), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["particle"] ?? null), "text", array()), "html", null, true);
            echo "\" ";
            echo ((array_key_exists("rel", $context)) ? (_twig_default_filter(($context["rel"] ?? null), "")) : (""));
            echo " ";
            echo ((array_key_exists("class", $context)) ? (_twig_default_filter(($context["class"] ?? null), "")) : (""));
            echo ">
    ";
        } else {
            // line 11
            echo "<div ";
            echo ((array_key_exists("class", $context)) ? (_twig_default_filter(($context["class"] ?? null), "")) : (""));
            echo ">";
        }
        // line 12
        echo "        ";
        if ( !twig_test_empty($this->getAttribute(($context["particle"] ?? null), "svg", array()))) {
            // line 13
            echo "            ";
            echo $this->getAttribute(($context["particle"] ?? null), "svg", array());
            echo "
        ";
        } elseif (        // line 14
($context["image"] ?? null)) {
            // line 15
            echo "            <img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute(($context["particle"] ?? null), "image", array())), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["particle"] ?? null), "text", array()), "html", null, true);
            echo "\" />
        ";
        } else {
            // line 17
            echo "            ";
            echo twig_escape_filter($this->env, (($this->getAttribute(($context["particle"] ?? null), "text", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "text", array()), "Logo")) : ("Logo")), "html", null, true);
            echo "
        ";
        }
        // line 19
        echo "    ";
        if (($this->getAttribute(($context["particle"] ?? null), "link", array()) == true)) {
            echo "</a>";
        } else {
            echo "</div>";
        }
    }

    public function getTemplateName()
    {
        return "@particles/logo.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 19,  87 => 17,  79 => 15,  77 => 14,  72 => 13,  69 => 12,  64 => 11,  50 => 10,  48 => 9,  45 => 8,  42 => 7,  39 => 6,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@particles/logo.html.twig", "/var/www/html/wp-content/plugins/gantry5/engines/nucleus/particles/logo.html.twig");
    }
}
