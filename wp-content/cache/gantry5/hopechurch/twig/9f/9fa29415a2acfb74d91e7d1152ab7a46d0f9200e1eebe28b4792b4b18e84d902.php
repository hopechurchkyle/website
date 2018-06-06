<?php

/* platform/meta/icon.html.twig */
class __TwigTemplate_8240232864851c2c50aa5d46b93a4a690d656c647f145f1d45212515d10aae2b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'meta_icon' => array($this, 'block_meta_icon'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["meta_icon"] = (($context["meta_icon"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (((("content." . ($context["scope"] ?? null)) . ".") . ($context["meta_scope"] ?? null)) . ".icon"), 1 => ""), "method")));
        // line 2
        echo "
";
        // line 3
        $this->displayBlock('meta_icon', $context, $blocks);
    }

    public function block_meta_icon($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        if (($context["meta_icon"] ?? null)) {
            // line 5
            echo "        <span class=\"meta-icon\">
            <i class=\"";
            // line 6
            echo ($context["meta_icon"] ?? null);
            echo "\" aria-hidden=\"true\"></i>
        </span>
    ";
        }
    }

    public function getTemplateName()
    {
        return "platform/meta/icon.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 6,  34 => 5,  31 => 4,  25 => 3,  22 => 2,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "platform/meta/icon.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/platform/meta/icon.html.twig");
    }
}
