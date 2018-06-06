<?php

/* platform/partials/paged-content.html.twig */
class __TwigTemplate_460965e1c719dd94b0feb73a84802dee785f1c847db50ef52fd50e9ac18e50e4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'paged_content' => array($this, 'block_paged_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["paged_content_edit_enabled"] = (($context["paged_content_edit_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".general.edit.enabled"), 1 => ""), "method")));
        // line 2
        $context["paged_content_edit_label"] = (($context["paged_content_edit_label"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".general.edit.label"), 1 => "Edit"), "method")));
        // line 3
        $context["paged_content_edit_class"] = (($context["paged_content_edit_class"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".general.edit.class"), 1 => "button small"), "method")));
        // line 4
        echo "
";
        // line 5
        $this->displayBlock('paged_content', $context, $blocks);
    }

    public function block_paged_content($context, array $blocks = array())
    {
        // line 6
        echo "    <section class=\"entry-content\">
        ";
        // line 8
        echo "        ";
        echo $this->getAttribute(($context["post"] ?? null), "paged_content", array());
        echo "

        ";
        // line 11
        echo "        ";
        $this->loadTemplate("platform/partials/pagination-links.html.twig", "platform/partials/paged-content.html.twig", 11)->display($context);
        // line 12
        echo "
        ";
        // line 14
        echo "        ";
        if (($context["paged_content_edit_enabled"] ?? null)) {
            // line 15
            echo "            ";
            echo call_user_func_array($this->env->getFunction('function')->getCallable(), array("edit_post_link", call_user_func_array($this->env->getFunction('__')->getCallable(), array(($context["paged_content_edit_label"] ?? null), "wpfc-core")), "<p class=\"edit-link\">", "</p>", "", ($context["paged_content_edit_class"] ?? null)));
            echo "
        ";
        }
        // line 17
        echo "    </section>
";
    }

    public function getTemplateName()
    {
        return "platform/partials/paged-content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 17,  53 => 15,  50 => 14,  47 => 12,  44 => 11,  38 => 8,  35 => 6,  29 => 5,  26 => 4,  24 => 3,  22 => 2,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "platform/partials/paged-content.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/platform/partials/paged-content.html.twig");
    }
}
