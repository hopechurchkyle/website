<?php

/* platform/partials/entry-header.html.twig */
class __TwigTemplate_57f61e7109c99ed35c26ca53d9e4e9bd9423787f90a830d89286a5093d718c57 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'entry_header' => array($this, 'block_entry_header'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["entry_title_enabled"] = (($context["entry_title_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-title.enabled"), 1 => "1"), "method")));
        // line 2
        echo "
";
        // line 3
        $context["meta_categories_enabled"] = (($context["meta_categories_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".meta-categories.enabled"), 1 => ""), "method")));
        // line 4
        $context["meta_author_enabled"] = (($context["meta_author_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".meta-author.enabled"), 1 => "1"), "method")));
        // line 5
        $context["meta_date_enabled"] = (($context["meta_date_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".meta-date.enabled"), 1 => "1"), "method")));
        // line 6
        $context["meta_comments_enabled"] = (($context["meta_comments_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".meta-comments.enabled"), 1 => ""), "method")));
        // line 7
        echo "
";
        // line 8
        $this->displayBlock('entry_header', $context, $blocks);
    }

    public function block_entry_header($context, array $blocks = array())
    {
        // line 9
        echo "    ";
        if (((((($context["entry_title_enabled"] ?? null) || ($context["meta_categories_enabled"] ?? null)) || ($context["meta_author_enabled"] ?? null)) || ($context["meta_date_enabled"] ?? null)) || ($context["meta_comments_enabled"] ?? null))) {
            // line 10
            echo "        <section class=\"entry-header\">
            ";
            // line 11
            $this->loadTemplate("platform/partials/entry-title.html.twig", "platform/partials/entry-header.html.twig", 11)->display($context);
            // line 12
            echo "            ";
            $this->loadTemplate("platform/partials/entry-meta.html.twig", "platform/partials/entry-header.html.twig", 12)->display($context);
            // line 13
            echo "        </section>
    ";
        }
    }

    public function getTemplateName()
    {
        return "platform/partials/entry-header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 13,  50 => 12,  48 => 11,  45 => 10,  42 => 9,  36 => 8,  33 => 7,  31 => 6,  29 => 5,  27 => 4,  25 => 3,  22 => 2,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "platform/partials/entry-header.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/platform/partials/entry-header.html.twig");
    }
}
