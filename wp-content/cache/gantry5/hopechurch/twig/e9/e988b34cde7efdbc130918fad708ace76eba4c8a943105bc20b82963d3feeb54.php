<?php

/* page-plugin.html.twig */
class __TwigTemplate_233f5518c03a6924539aa347d0ba114b537a4e20c65b775d6cc3f8b33fda2236 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("partials/page.html.twig", "page-plugin.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "partials/page.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["twigTemplate"] = "page-plugin.html.twig";
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "
    <div class=\"platform-content platform-wordpress\">
        <div class=\"plugin-content\">
            ";
        // line 8
        echo ($context["content"] ?? null);
        echo "
        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "page-plugin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 8,  34 => 5,  31 => 4,  27 => 1,  25 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "page-plugin.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/page-plugin.html.twig");
    }
}
