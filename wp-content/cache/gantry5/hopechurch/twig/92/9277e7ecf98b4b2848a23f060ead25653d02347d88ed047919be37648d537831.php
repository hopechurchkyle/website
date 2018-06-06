<?php

/* @particles/wpfc-assets/wordpress/platform/views/partials/entry-content.html.twig */
class __TwigTemplate_dd1e4b3dff0be80075861f0485c468ac2c28c2bda42b9c1abd6e0afc9c4b6532 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'entry_content' => array($this, 'block_entry_content'),
            'entry_content_inner' => array($this, 'block_entry_content_inner'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["entry_content_enabled"] = (($context["entry_content_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["scope"] ?? null), "content", array()), "enabled", array())));
        // line 2
        $context["entry_content_limit"] = (($context["entry_content_limit"]) ?? ($this->getAttribute($this->getAttribute(($context["scope"] ?? null), "content", array()), "limit", array())));
        // line 3
        echo "
";
        // line 4
        $this->displayBlock('entry_content', $context, $blocks);
    }

    public function block_entry_content($context, array $blocks = array())
    {
        // line 5
        echo "    ";
        if (($context["entry_content_enabled"] ?? null)) {
            // line 6
            echo "        <div class=\"wpfc-entry-content\">
            ";
            // line 7
            $this->displayBlock('entry_content_inner', $context, $blocks);
            // line 18
            echo "        </div>
    ";
        }
    }

    // line 7
    public function block_entry_content_inner($context, array $blocks = array())
    {
        // line 8
        echo "                ";
        if (((($context["entry_content_enabled"] ?? null) == "excerpt") && $this->getAttribute(($context["post"] ?? null), "post_excerpt", array()))) {
            // line 9
            echo "                    <div class=\"wpfc-post-excerpt\">";
            // line 10
            echo call_user_func_array($this->env->getFilter('apply_filters')->getCallable(), array($this->getAttribute(($context["post"] ?? null), "post_excerpt", array()), "the_excerpt"));
            // line 11
            echo "</div>
                ";
        } elseif ((        // line 12
($context["entry_content_enabled"] ?? null) == "content")) {
            // line 13
            echo "                    <div class=\"wpfc-post-content\">";
            // line 14
            echo $this->getAttribute(($context["post"] ?? null), "content", array(0 => "", 1 => ($context["entry_content_limit"] ?? null)), "method");
            // line 15
            echo "</div>
                ";
        }
        // line 17
        echo "            ";
    }

    public function getTemplateName()
    {
        return "@particles/wpfc-assets/wordpress/platform/views/partials/entry-content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 17,  67 => 15,  65 => 14,  63 => 13,  61 => 12,  58 => 11,  56 => 10,  54 => 9,  51 => 8,  48 => 7,  42 => 18,  40 => 7,  37 => 6,  34 => 5,  28 => 4,  25 => 3,  23 => 2,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@particles/wpfc-assets/wordpress/platform/views/partials/entry-content.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/particles/wpfc-assets/wordpress/platform/views/partials/entry-content.html.twig");
    }
}
