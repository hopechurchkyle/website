<?php

/* platform/partials/entry-content-more.html.twig */
class __TwigTemplate_c48511d7a3a4cc3484b7507eafc248a46b13125f7e5dba8d924b39ce30820b3d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("platform/partials/entry-content.html.twig", "platform/partials/entry-content-more.html.twig", 1);
        $this->blocks = array(
            'entry_content_inner' => array($this, 'block_entry_content_inner'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "platform/partials/entry-content.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["twigTemplate"] = "entry-content-more.html.twig";
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_entry_content_inner($context, array $blocks = array())
    {
        // line 5
        echo "    ";
        $this->displayParentBlock("entry_content_inner", $context, $blocks);
        echo "
    ";
        // line 6
        $this->loadTemplate("platform/partials/readmore.html.twig", "platform/partials/entry-content-more.html.twig", 6)->display($context);
    }

    public function getTemplateName()
    {
        return "platform/partials/entry-content-more.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 6,  34 => 5,  31 => 4,  27 => 1,  25 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "platform/partials/entry-content-more.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/platform/partials/entry-content-more.html.twig");
    }
}
