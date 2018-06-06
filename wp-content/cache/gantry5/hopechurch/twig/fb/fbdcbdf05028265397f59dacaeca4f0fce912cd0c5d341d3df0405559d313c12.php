<?php

/* platform/meta/categories.html.twig */
class __TwigTemplate_a2d2ee13448a2085cc1a2f5785a6aa8d23dc6ead811d71ef040fa4ce9c58b92a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'meta_categories' => array($this, 'block_meta_categories'),
            'meta_categories_content' => array($this, 'block_meta_categories_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["meta_scope"] = "meta-categories";
        // line 2
        $context["meta_categories_enabled"] = (($context["meta_categories_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (((("content." . ($context["scope"] ?? null)) . ".") . ($context["meta_scope"] ?? null)) . ".enabled"), 1 => "1"), "method")));
        // line 3
        $context["meta_categories_link"] = (($context["meta_categories_link"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (((("content." . ($context["scope"] ?? null)) . ".") . ($context["meta_scope"] ?? null)) . ".link"), 1 => "1"), "method")));
        // line 4
        echo "
";
        // line 5
        $this->displayBlock('meta_categories', $context, $blocks);
    }

    public function block_meta_categories($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        if (($context["meta_categories_enabled"] ?? null)) {
            // line 7
            echo "        <div class=\"meta-categories meta-item\">
            ";
            // line 8
            $this->displayBlock('meta_categories_content', $context, $blocks);
            // line 22
            echo "        </div>
    ";
        }
    }

    // line 8
    public function block_meta_categories_content($context, array $blocks = array())
    {
        // line 9
        echo "                ";
        $this->loadTemplate("platform/meta/icon.html.twig", "platform/meta/categories.html.twig", 9)->display($context);
        // line 10
        echo "                ";
        $this->loadTemplate("platform/meta/prefix.html.twig", "platform/meta/categories.html.twig", 10)->display($context);
        // line 11
        echo "
                <span class=\"categories\">
                    ";
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["post"] ?? null), "categories", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 14
            echo "                        ";
            if (($context["meta_categories_link"] ?? null)) {
                // line 15
                echo "                            <a href=\"";
                echo $this->getAttribute($context["category"], "link", array());
                echo "\" title=\"";
                echo $this->getAttribute($context["category"], "title", array());
                echo "\" class=\"single-cat\">";
                echo $this->getAttribute($context["category"], "title", array());
                echo "</a>
                        ";
            } else {
                // line 17
                echo "                            <span class=\"single-cat\">";
                echo $this->getAttribute($context["category"], "title", array());
                echo "</span>
                        ";
            }
            // line 19
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "                </span>
            ";
    }

    public function getTemplateName()
    {
        return "platform/meta/categories.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 20,  86 => 19,  80 => 17,  70 => 15,  67 => 14,  63 => 13,  59 => 11,  56 => 10,  53 => 9,  50 => 8,  44 => 22,  42 => 8,  39 => 7,  36 => 6,  30 => 5,  27 => 4,  25 => 3,  23 => 2,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "platform/meta/categories.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/platform/meta/categories.html.twig");
    }
}
