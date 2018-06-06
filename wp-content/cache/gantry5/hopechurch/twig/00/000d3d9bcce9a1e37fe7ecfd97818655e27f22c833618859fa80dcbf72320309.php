<?php

/* @particles/wpfc-assets/wordpress/platform/views/partials/entry-meta.html.twig */
class __TwigTemplate_e428f6907da839dbec814ad6328147c1604aa05f84071a7fdaa8b1564607276c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'entry_meta' => array($this, 'block_entry_meta'),
            'entry_meta_content' => array($this, 'block_entry_meta_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["meta_author_enabled"] = (($context["meta_author_enabled"]) ?? ($this->getAttribute($this->getAttribute($this->getAttribute(($context["scope"] ?? null), "meta", array()), "author", array()), "enabled", array())));
        // line 2
        $context["meta_categories_enabled"] = (($context["meta_categories_enabled"]) ?? ($this->getAttribute($this->getAttribute($this->getAttribute(($context["scope"] ?? null), "meta", array()), "categories", array()), "enabled", array())));
        // line 3
        $context["meta_date_enabled"] = (($context["meta_date_enabled"]) ?? ($this->getAttribute($this->getAttribute($this->getAttribute(($context["scope"] ?? null), "meta", array()), "date", array()), "enabled", array())));
        // line 4
        $context["meta_comments_enabled"] = (($context["meta_comments_enabled"]) ?? ($this->getAttribute($this->getAttribute($this->getAttribute(($context["scope"] ?? null), "meta", array()), "comments", array()), "enabled", array())));
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
        if (((($context["meta_author_enabled"] ?? null) || ($context["meta_date_enabled"] ?? null)) || ($context["meta_comments_enabled"] ?? null))) {
            // line 8
            echo "        <div class=\"wpfc-entry-meta\">
            ";
            // line 9
            $this->displayBlock('entry_meta_content', $context, $blocks);
            // line 15
            echo "        </div>
    ";
        }
    }

    // line 9
    public function block_entry_meta_content($context, array $blocks = array())
    {
        // line 10
        echo "                ";
        $this->loadTemplate("@particles/wpfc-assets/wordpress/platform/views/meta/author.html.twig", "@particles/wpfc-assets/wordpress/platform/views/partials/entry-meta.html.twig", 10)->display($context);
        // line 11
        echo "                ";
        $this->loadTemplate("@particles/wpfc-assets/wordpress/platform/views/meta/categories.html.twig", "@particles/wpfc-assets/wordpress/platform/views/partials/entry-meta.html.twig", 11)->display($context);
        // line 12
        echo "                ";
        $this->loadTemplate("@particles/wpfc-assets/wordpress/platform/views/meta/date.html.twig", "@particles/wpfc-assets/wordpress/platform/views/partials/entry-meta.html.twig", 12)->display($context);
        // line 13
        echo "                ";
        $this->loadTemplate("@particles/wpfc-assets/common/views/meta/comments-type.html.twig", "@particles/wpfc-assets/wordpress/platform/views/partials/entry-meta.html.twig", 13)->display($context);
        // line 14
        echo "            ";
    }

    public function getTemplateName()
    {
        return "@particles/wpfc-assets/wordpress/platform/views/partials/entry-meta.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 14,  64 => 13,  61 => 12,  58 => 11,  55 => 10,  52 => 9,  46 => 15,  44 => 9,  41 => 8,  38 => 7,  32 => 6,  29 => 5,  27 => 4,  25 => 3,  23 => 2,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@particles/wpfc-assets/wordpress/platform/views/partials/entry-meta.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/particles/wpfc-assets/wordpress/platform/views/partials/entry-meta.html.twig");
    }
}
