<?php

/* wpfc-sermon/partials/entry-meta.html.twig */
class __TwigTemplate_bce1dd8cd9fa873e11535eb89da760cae15990e104b2cf9698ff9818bc17e292 extends Twig_Template
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
        $context["sermon_meta_preacher_enabled"] = (($context["sermon_meta_preacher_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".meta-preacher.enabled"), 1 => "1"), "method")));
        // line 2
        $context["sermon_meta_series_enabled"] = (($context["sermon_meta_series_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".meta-series.enabled"), 1 => "1"), "method")));
        // line 3
        $context["sermon_meta_book_enabled"] = (($context["sermon_meta_book_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".meta-book.enabled"), 1 => "1"), "method")));
        // line 4
        $context["sermon_meta_service_enabled"] = (($context["sermon_meta_service_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".meta-service.enabled"), 1 => "1"), "method")));
        // line 5
        $context["sermon_meta_topics_enabled"] = (($context["sermon_meta_topics_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".meta-topics.enabled"), 1 => "1"), "method")));
        // line 6
        $context["sermon_meta_passage_enabled"] = (($context["sermon_meta_passage_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".meta-passage.enabled"), 1 => "1"), "method")));
        // line 7
        echo "
";
        // line 8
        $this->displayBlock('entry_meta', $context, $blocks);
    }

    public function block_entry_meta($context, array $blocks = array())
    {
        // line 9
        echo "    ";
        if ((((((($context["sermon_meta_preacher_enabled"] ?? null) || ($context["sermon_meta_series_enabled"] ?? null)) || ($context["sermon_meta_book_enabled"] ?? null)) || ($context["sermon_meta_service_enabled"] ?? null)) || ($context["sermon_meta_topics_enabled"] ?? null)) || ($context["sermon_meta_passage_enabled"] ?? null))) {
            // line 10
            echo "        <div class=\"entry-meta\">
            ";
            // line 11
            $this->loadTemplate("wpfc-sermon/meta/preacher.html.twig", "wpfc-sermon/partials/entry-meta.html.twig", 11)->display($context);
            // line 12
            echo "            ";
            $this->loadTemplate("wpfc-sermon/meta/series.html.twig", "wpfc-sermon/partials/entry-meta.html.twig", 12)->display($context);
            // line 13
            echo "            ";
            $this->loadTemplate("wpfc-sermon/meta/book.html.twig", "wpfc-sermon/partials/entry-meta.html.twig", 13)->display($context);
            // line 14
            echo "            ";
            $this->loadTemplate("wpfc-sermon/meta/service.html.twig", "wpfc-sermon/partials/entry-meta.html.twig", 14)->display($context);
            // line 15
            echo "            ";
            $this->loadTemplate("wpfc-sermon/meta/topics.html.twig", "wpfc-sermon/partials/entry-meta.html.twig", 15)->display($context);
            // line 16
            echo "            ";
            $this->loadTemplate("wpfc-sermon/meta/passage.html.twig", "wpfc-sermon/partials/entry-meta.html.twig", 16)->display($context);
            // line 17
            echo "        </div>
    ";
        }
        // line 18
        echo "   
";
    }

    public function getTemplateName()
    {
        return "wpfc-sermon/partials/entry-meta.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 18,  64 => 17,  61 => 16,  58 => 15,  55 => 14,  52 => 13,  49 => 12,  47 => 11,  44 => 10,  41 => 9,  35 => 8,  32 => 7,  30 => 6,  28 => 5,  26 => 4,  24 => 3,  22 => 2,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "wpfc-sermon/partials/entry-meta.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/wpfc-sermon/partials/entry-meta.html.twig");
    }
}
