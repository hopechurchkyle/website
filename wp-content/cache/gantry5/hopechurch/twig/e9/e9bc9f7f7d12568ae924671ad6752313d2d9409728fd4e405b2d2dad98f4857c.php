<?php

/* wpfc-sermon/partials/paged-content.html.twig */
class __TwigTemplate_29fc3e8750eb6e697767b395e3ad930a9a5ddcf682847b29a344975bd62d7804 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'sermon_paged_content' => array($this, 'block_sermon_paged_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('sermon_paged_content', $context, $blocks);
    }

    public function block_sermon_paged_content($context, array $blocks = array())
    {
        // line 2
        echo "    <section class=\"entry-content-wrapper\">
        ";
        // line 3
        $this->loadTemplate("wpfc-sermon/partials/entry-media.html.twig", "wpfc-sermon/partials/paged-content.html.twig", 3)->display($context);
        // line 4
        echo "        ";
        $this->loadTemplate("wpfc-sermon/partials/entry-content.html.twig", "wpfc-sermon/partials/paged-content.html.twig", 4)->display($context);
        // line 5
        echo "    </section>
";
    }

    public function getTemplateName()
    {
        return "wpfc-sermon/partials/paged-content.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  34 => 5,  31 => 4,  29 => 3,  26 => 2,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "wpfc-sermon/partials/paged-content.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/wpfc-sermon/partials/paged-content.html.twig");
    }
}
