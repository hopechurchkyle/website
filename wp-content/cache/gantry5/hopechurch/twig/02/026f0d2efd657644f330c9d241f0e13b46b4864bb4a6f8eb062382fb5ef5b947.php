<?php

/* single.html.twig */
class __TwigTemplate_e5b0687a3a1506e8fb6ab0f5a67a4c3307ac8a339e232e75ee00cf76ba9c9de7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("partials/page.html.twig", "single.html.twig", 1);
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
        $context["twigTemplate"] = "single.html.twig";
        // line 3
        $context["scope"] = "single";
        // line 4
        $context["content"] = "content";
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "
    <div class=\"platform-content platform-wordpress\">
        <div class=\"content-wrapper\">
            <section class=\"entry\">

                ";
        // line 12
        $this->loadTemplate(array(0 => (("platform/content/content-" . ($context["scope"] ?? null)) . ".html.twig"), 1 => (("platform/content/" . ($context["content"] ?? null)) . ".html.twig")), "single.html.twig", 12)->display($context);
        // line 13
        echo "
            </section>
        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "single.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 13,  45 => 12,  38 => 7,  35 => 6,  31 => 1,  29 => 4,  27 => 3,  25 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "single.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/single.html.twig");
    }
}
