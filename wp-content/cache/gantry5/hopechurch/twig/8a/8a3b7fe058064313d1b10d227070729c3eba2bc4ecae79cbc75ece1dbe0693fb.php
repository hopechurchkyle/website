<?php

/* @particles/wpfc-assets/wordpress/platform/views/partials/readmore.html.twig */
class __TwigTemplate_a8d0ff91f01dbe27b1482876b7d859fe267c46f27abc1bee36ef362942b6ccef extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'readmore' => array($this, 'block_readmore'),
            'readmore_content' => array($this, 'block_readmore_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["readmore_enabled"] = (($context["readmore_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["scope"] ?? null), "readmore", array()), "enabled", array())));
        // line 2
        $context["readmore_label"] = (($context["readmore_label"]) ?? ($this->getAttribute($this->getAttribute(($context["scope"] ?? null), "readmore", array()), "label", array())));
        // line 3
        $context["readmore_class"] = (($context["readmore_class"]) ?? ($this->getAttribute($this->getAttribute(($context["scope"] ?? null), "readmore", array()), "class", array())));
        // line 4
        echo "
";
        // line 5
        $this->displayBlock('readmore', $context, $blocks);
    }

    public function block_readmore($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        if (($context["readmore_enabled"] ?? null)) {
            // line 7
            echo "        ";
            $this->displayBlock('readmore_content', $context, $blocks);
            // line 10
            echo "    ";
        }
    }

    // line 7
    public function block_readmore_content($context, array $blocks = array())
    {
        // line 8
        echo "            <a href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["post"] ?? null), "link", array()), "html", null, true);
        echo "\" class=\"wpfc-readmore ";
        echo twig_escape_filter($this->env, ($context["readmore_class"] ?? null), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, ($context["readmore_label"] ?? null), "html", null, true);
        echo "</a>
        ";
    }

    public function getTemplateName()
    {
        return "@particles/wpfc-assets/wordpress/platform/views/partials/readmore.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 8,  47 => 7,  42 => 10,  39 => 7,  36 => 6,  30 => 5,  27 => 4,  25 => 3,  23 => 2,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@particles/wpfc-assets/wordpress/platform/views/partials/readmore.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/particles/wpfc-assets/wordpress/platform/views/partials/readmore.html.twig");
    }
}
