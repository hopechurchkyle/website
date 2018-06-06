<?php

/* wpfc-sermon/content/content-single.html.twig */
class __TwigTemplate_a2a7768267f88c76212099fbcdf01b9b892e5acdb7871e075fac2b5b424c1f07 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["sermon_meta_date_enabled"] = (($context["sermon_meta_date_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".meta-date.enabled"), 1 => "1"), "method")));
        // line 2
        $context["entry_title_enabled"] = (($context["entry_title_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-title.enabled"), 1 => "1"), "method")));
        // line 3
        $context["sermon_meta_preacher_enabled"] = (($context["sermon_meta_preacher_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".meta-preacher.enabled"), 1 => "1"), "method")));
        // line 4
        $context["sermon_meta_series_enabled"] = (($context["sermon_meta_series_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".meta-series.enabled"), 1 => "1"), "method")));
        // line 5
        $context["sermon_meta_book_enabled"] = (($context["sermon_meta_book_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".meta-book.enabled"), 1 => "1"), "method")));
        // line 6
        $context["sermon_meta_service_enabled"] = (($context["sermon_meta_service_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".meta-service.enabled"), 1 => "1"), "method")));
        // line 7
        $context["sermon_meta_topics_enabled"] = (($context["sermon_meta_topics_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".meta-topics.enabled"), 1 => "1"), "method")));
        // line 8
        echo "
<article class=\"";
        // line 9
        echo $this->getAttribute(($context["post"] ?? null), "class", array());
        echo "\">

    ";
        // line 11
        $this->displayBlock('content', $context, $blocks);
        // line 41
        echo "    
</article>";
    }

    // line 11
    public function block_content($context, array $blocks = array())
    {
        // line 12
        echo "
        ";
        // line 14
        echo "        <div class=\"entry-wrapper\">
            ";
        // line 16
        echo "            ";
        $this->loadTemplate("platform/partials/featured-image.html.twig", "wpfc-sermon/content/content-single.html.twig", 16)->display($context);
        // line 17
        echo "
            ";
        // line 19
        echo "            ";
        if (((((((($context["sermon_meta_date_enabled"] ?? null) ||         // line 20
($context["entry_title_enabled"] ?? null)) ||         // line 21
($context["sermon_meta_preacher_enabled"] ?? null)) ||         // line 22
($context["sermon_meta_series_enabled"] ?? null)) ||         // line 23
($context["sermon_meta_book_enabled"] ?? null)) ||         // line 24
($context["sermon_meta_service_enabled"] ?? null)) ||         // line 25
($context["sermon_meta_topics_enabled"] ?? null))) {
            // line 26
            echo "                <div class=\"entry-header\">
                    ";
            // line 27
            $this->loadTemplate("wpfc-sermon/meta/date.html.twig", "wpfc-sermon/content/content-single.html.twig", 27)->display($context);
            // line 28
            echo "                    ";
            $this->loadTemplate("platform/partials/entry-title.html.twig", "wpfc-sermon/content/content-single.html.twig", 28)->display($context);
            // line 29
            echo "                    ";
            $this->loadTemplate("wpfc-sermon/partials/entry-meta.html.twig", "wpfc-sermon/content/content-single.html.twig", 29)->display($context);
            // line 30
            echo "                </div>
            ";
        }
        // line 32
        echo "
            ";
        // line 34
        echo "            ";
        $this->loadTemplate("wpfc-sermon/partials/paged-content-pass.html.twig", "wpfc-sermon/content/content-single.html.twig", 34)->display($context);
        // line 35
        echo "        </div>

        ";
        // line 38
        echo "        ";
        $this->loadTemplate("wpfc-sermon/partials/entry-preacher.html.twig", "wpfc-sermon/content/content-single.html.twig", 38)->display($context);
        // line 39
        echo "
    ";
    }

    public function getTemplateName()
    {
        return "wpfc-sermon/content/content-single.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 39,  98 => 38,  94 => 35,  91 => 34,  88 => 32,  84 => 30,  81 => 29,  78 => 28,  76 => 27,  73 => 26,  71 => 25,  70 => 24,  69 => 23,  68 => 22,  67 => 21,  66 => 20,  64 => 19,  61 => 17,  58 => 16,  55 => 14,  52 => 12,  49 => 11,  44 => 41,  42 => 11,  37 => 9,  34 => 8,  32 => 7,  30 => 6,  28 => 5,  26 => 4,  24 => 3,  22 => 2,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "wpfc-sermon/content/content-single.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/wpfc-sermon/content/content-single.html.twig");
    }
}
