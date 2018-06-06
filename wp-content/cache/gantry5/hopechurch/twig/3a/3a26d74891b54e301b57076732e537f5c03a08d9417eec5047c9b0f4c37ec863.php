<?php

/* platform/partials/entry-meta.html.twig */
class __TwigTemplate_17e399a63c9243b0d8a273a3692549ee5a9b00e9203409a4c6048769d8f9403c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'entry_meta' => array($this, 'block_entry_meta'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["meta_categories_enabled"] = (($context["meta_categories_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".meta-categories.enabled"), 1 => "1"), "method")));
        // line 2
        $context["meta_author_enabled"] = (($context["meta_author_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".meta-author.enabled"), 1 => "1"), "method")));
        // line 3
        $context["meta_date_enabled"] = (($context["meta_date_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".meta-date.enabled"), 1 => "1"), "method")));
        // line 4
        $context["meta_comments_enabled"] = (($context["meta_comments_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".meta-comments.enabled"), 1 => ""), "method")));
        // line 5
        echo "
";
        // line 6
        $this->displayBlock('entry_meta', $context, $blocks);
    }

    public function block_entry_meta($context, array $blocks = array())
    {
        // line 7
        echo "    ";
        if ((((($context["meta_categories_enabled"] ?? null) || ($context["meta_author_enabled"] ?? null)) || ($context["meta_date_enabled"] ?? null)) || ($context["meta_comments_enabled"] ?? null))) {
            // line 8
            echo "        <div class=\"entry-meta\">
            ";
            // line 9
            $this->loadTemplate("platform/meta/categories.html.twig", "platform/partials/entry-meta.html.twig", 9)->display($context);
            // line 10
            echo "            ";
            $this->loadTemplate("platform/meta/author.html.twig", "platform/partials/entry-meta.html.twig", 10)->display($context);
            // line 11
            echo "            ";
            $this->loadTemplate("platform/meta/date.html.twig", "platform/partials/entry-meta.html.twig", 11)->display($context);
            // line 12
            echo "            ";
            $this->loadTemplate("platform/meta/comments.html.twig", "platform/partials/entry-meta.html.twig", 12)->display($context);
            // line 13
            echo "        </div>
    ";
        }
        // line 14
        echo "   
";
    }

    public function getTemplateName()
    {
        return "platform/partials/entry-meta.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 14,  54 => 13,  51 => 12,  48 => 11,  45 => 10,  43 => 9,  40 => 8,  37 => 7,  31 => 6,  28 => 5,  26 => 4,  24 => 3,  22 => 2,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "platform/partials/entry-meta.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/platform/partials/entry-meta.html.twig");
    }
}
