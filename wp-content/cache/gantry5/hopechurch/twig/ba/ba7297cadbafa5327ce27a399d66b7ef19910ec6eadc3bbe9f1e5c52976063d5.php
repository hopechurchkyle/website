<?php

/* archive-wpfc_sermon.html.twig */
class __TwigTemplate_18f1cc411f3dfeedff53b434bd0914aa344b6d7d0db37c859d09699ec5a35031 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base-archive.html.twig", "archive-wpfc_sermon.html.twig", 1);
        $this->blocks = array(
            'header' => array($this, 'block_header'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base-archive.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["twigTemplate"] = "sermon-archive.html.twig";
        // line 4
        $context["scope"] = "sermon-archive";
        // line 5
        $context["platform_class"] = "platform-wpfc-sermon";
        // line 6
        $context["content"] = $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".general.content"), 1 => "content"), "method");
        // line 7
        $context["route"] = "wpfc-sermon";
        // line 8
        $context["class_grid"] = twig_join_filter(array(0 => "g-grid", 1 => ("wpfc-style-" . ($context["content"] ?? null))), " ");
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 10
    public function block_header($context, array $blocks = array())
    {
        // line 11
        echo "    ";
        $this->loadTemplate("platform/partials/page-header.html.twig", "archive-wpfc_sermon.html.twig", 11)->display($context);
        // line 12
        echo "    ";
        $this->loadTemplate("wpfc-sermon/partials/sermon-sorting.html.twig", "archive-wpfc_sermon.html.twig", 12)->display($context);
    }

    public function getTemplateName()
    {
        return "archive-wpfc_sermon.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 12,  44 => 11,  41 => 10,  37 => 1,  35 => 8,  33 => 7,  31 => 6,  29 => 5,  27 => 4,  25 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "archive-wpfc_sermon.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/archive-wpfc_sermon.html.twig");
    }
}
