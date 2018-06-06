<?php

/* @particles/wpfc-assets/wordpress/platform/views/meta/categories.html.twig */
class __TwigTemplate_59750068a2b5d60525dc736d9e2f9efc2f42f87337d1b41b9d1e9d9312f89aee extends Twig_Template
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
        $context["meta_scope"] = "categories";
        // line 2
        $context["meta_categories_enabled"] = (($context["meta_categories_enabled"]) ?? ($this->getAttribute($this->getAttribute($this->getAttribute(($context["scope"] ?? null), "meta", array()), "categories", array()), "enabled", array())));
        // line 3
        echo "
";
        // line 4
        $this->displayBlock('meta_categories', $context, $blocks);
    }

    public function block_meta_categories($context, array $blocks = array())
    {
        // line 5
        echo "    ";
        if ((($context["meta_categories_enabled"] ?? null) &&  !twig_test_empty($this->getAttribute(($context["post"] ?? null), "categories", array())))) {
            // line 6
            echo "        <div class=\"wpfc-meta-categories wpfc-meta-item\">  
            ";
            // line 7
            $this->displayBlock('meta_categories_content', $context, $blocks);
            // line 21
            echo "        </div>
    ";
        }
    }

    // line 7
    public function block_meta_categories_content($context, array $blocks = array())
    {
        // line 8
        echo "                ";
        $this->loadTemplate("@particles/wpfc-assets/common/views/meta/icon.html.twig", "@particles/wpfc-assets/wordpress/platform/views/meta/categories.html.twig", 8)->display($context);
        // line 9
        echo "                ";
        $this->loadTemplate("@particles/wpfc-assets/common/views/meta/prefix.html.twig", "@particles/wpfc-assets/wordpress/platform/views/meta/categories.html.twig", 9)->display($context);
        // line 10
        echo "
                <span class=\"wpfc-categories\">
                    ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["post"] ?? null), "categories", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 13
            echo "                        ";
            if ((($context["meta_categories_enabled"] ?? null) == "link")) {
                // line 14
                echo "                            <a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "link", array()), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "title", array()), "html", null, true);
                echo "\" class=\"wpfc-single-cat\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "title", array()), "html", null, true);
                echo "</a>
                        ";
            } else {
                // line 16
                echo "                            <span class=\"wpfc-single-cat\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "title", array()), "html", null, true);
                echo "</span>
                        ";
            }
            // line 18
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "                </span>
            ";
    }

    public function getTemplateName()
    {
        return "@particles/wpfc-assets/wordpress/platform/views/meta/categories.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  90 => 19,  84 => 18,  78 => 16,  68 => 14,  65 => 13,  61 => 12,  57 => 10,  54 => 9,  51 => 8,  48 => 7,  42 => 21,  40 => 7,  37 => 6,  34 => 5,  28 => 4,  25 => 3,  23 => 2,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@particles/wpfc-assets/wordpress/platform/views/meta/categories.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/particles/wpfc-assets/wordpress/platform/views/meta/categories.html.twig");
    }
}
