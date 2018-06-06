<?php

/* platform/meta/prefix.html.twig */
class __TwigTemplate_ef161904a1ead31f80e9d3669affcd33e4973fdbbf81082bfbb423dd22b08ea5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'meta_prefix' => array($this, 'block_meta_prefix'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["meta_prefix"] = (($context["meta_prefix"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (((("content." . ($context["scope"] ?? null)) . ".") . ($context["meta_scope"] ?? null)) . ".prefix"), 1 => ""), "method")));
        // line 2
        echo "
";
        // line 3
        $this->displayBlock('meta_prefix', $context, $blocks);
    }

    public function block_meta_prefix($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        if (($context["meta_prefix"] ?? null)) {
            // line 5
            echo "        <span class=\"meta-prefix\">";
            echo ($context["meta_prefix"] ?? null);
            echo "</span>
    ";
        }
    }

    public function getTemplateName()
    {
        return "platform/meta/prefix.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 5,  31 => 4,  25 => 3,  22 => 2,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "platform/meta/prefix.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/platform/meta/prefix.html.twig");
    }
}
