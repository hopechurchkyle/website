<?php

/* @particles/wpfc-image.html.twig */
class __TwigTemplate_8e215a6235580d1855dccacd1f142cd17813e31122084c63d038a0b03d0aa896 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@nucleus/partials/particle.html.twig", "@particles/wpfc-image.html.twig", 1);
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
        echo "    ";
        $context["scroll_image"] = $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute($this->getAttribute(($context["particle"] ?? null), "scroll", array()), "image", array()));
        // line 9
        echo "
    <div class=\"";
        // line 10
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "\">
        <a href=\"";
        // line 11
        echo twig_escape_filter($this->env, ($context["url"] ?? null), "html", null, true);
        echo "\" title=\"";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["particle"] ?? null), "text", array()), "html", null, true);
        echo "\" ";
        echo ((array_key_exists("rel", $context)) ? (_twig_default_filter(($context["rel"] ?? null), "")) : (""));
        echo " ";
        echo ((array_key_exists("class", $context)) ? (_twig_default_filter(($context["class"] ?? null), "")) : (""));
        echo ">
            ";
        // line 12
        if ( !twig_test_empty($this->getAttribute(($context["particle"] ?? null), "svg", array()))) {
            // line 13
            echo "                ";
            echo $this->getAttribute(($context["particle"] ?? null), "svg", array());
            echo "
            ";
        } elseif (        // line 14
($context["image"] ?? null)) {
            // line 15
            if ( !$this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "mobile_detect", array()), "isMobile", array(), "method")) {
                // line 16
                echo "<img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute(($context["particle"] ?? null), "image", array())), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["particle"] ?? null), "text", array()), "html", null, true);
                echo "\" ";
                if ($this->getAttribute(($context["particle"] ?? null), "width", array())) {
                    echo " style=\"max-width: ";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["particle"] ?? null), "width", array()), "html", null, true);
                    echo "\"";
                }
                echo " />";
            } else {
                // line 18
                echo "<img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute($this->getAttribute(($context["particle"] ?? null), "mobile", array()), "image", array())), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["particle"] ?? null), "text", array()), "html", null, true);
                echo "\" ";
                if ($this->getAttribute($this->getAttribute(($context["particle"] ?? null), "mobile", array()), "width", array())) {
                    echo " style=\"max-width: ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["particle"] ?? null), "mobile", array()), "width", array()), "html", null, true);
                    echo "\"";
                }
                echo " />";
            }
        } else {
            // line 21
            echo "                ";
            echo twig_escape_filter($this->env, (($this->getAttribute(($context["particle"] ?? null), "text", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "text", array()), "Logo")) : ("Logo")), "html", null, true);
            echo "
            ";
        }
        // line 23
        echo "        </a>
    </div>

    ";
        // line 26
        ob_start();
        // line 27
        echo "        .headroom--not-top.headroom--pinned [class*=\"wpfc-image-\"] img {
            content: url( ";
        // line 28
        echo twig_escape_filter($this->env, ($context["scroll_image"] ?? null), "html", null, true);
        echo " );
        }
    ";
        $context["inline_style"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 31
        echo "
    ";
        // line 32
        if (($context["scroll_image"] ?? null)) {
            // line 33
            echo "        ";
            $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "document", array()), "addInlineStyle", array(0 => ($context["inline_style"] ?? null)), "method");
            // line 34
            echo "    ";
        }
    }

    public function getTemplateName()
    {
        return "@particles/wpfc-image.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  133 => 34,  130 => 33,  128 => 32,  125 => 31,  119 => 28,  116 => 27,  114 => 26,  109 => 23,  103 => 21,  89 => 18,  76 => 16,  74 => 15,  72 => 14,  67 => 13,  65 => 12,  55 => 11,  51 => 10,  48 => 9,  45 => 8,  42 => 7,  39 => 6,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@particles/wpfc-image.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/particles/wpfc-image.html.twig");
    }
}
