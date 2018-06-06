<?php

/* @particles/wpfc-assets/wordpress/platform/views/meta/date.html.twig */
class __TwigTemplate_dbcf20c361edc079263c9e2d11bd536bfacb8c372dfcf7d86d2ccfcc87d03f93 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'meta_date' => array($this, 'block_meta_date'),
            'meta_date_content' => array($this, 'block_meta_date_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["meta_scope"] = "date";
        // line 2
        $context["meta_date_enabled"] = (($context["meta_date_enabled"]) ?? ($this->getAttribute($this->getAttribute($this->getAttribute(($context["scope"] ?? null), "meta", array()), "date", array()), "enabled", array())));
        // line 3
        $context["meta_date_format"] = (($context["meta_date_format"]) ?? ($this->getAttribute($this->getAttribute($this->getAttribute(($context["scope"] ?? null), "meta", array()), "date", array()), "format", array())));
        // line 4
        echo "
";
        // line 5
        $this->displayBlock('meta_date', $context, $blocks);
    }

    public function block_meta_date($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        if (($context["meta_date_enabled"] ?? null)) {
            // line 7
            echo "        <div class=\"wpfc-meta-date wpfc-meta-item\">
            ";
            // line 8
            $this->displayBlock('meta_date_content', $context, $blocks);
            // line 18
            echo "        </div>
    ";
        }
    }

    // line 8
    public function block_meta_date_content($context, array $blocks = array())
    {
        // line 9
        echo "                ";
        $this->loadTemplate("@particles/wpfc-assets/common/views/meta/icon.html.twig", "@particles/wpfc-assets/wordpress/platform/views/meta/date.html.twig", 9)->display($context);
        // line 10
        echo "                ";
        $this->loadTemplate("@particles/wpfc-assets/common/views/meta/prefix.html.twig", "@particles/wpfc-assets/wordpress/platform/views/meta/date.html.twig", 10)->display($context);
        // line 11
        echo "
                ";
        // line 12
        if ((($context["meta_date_enabled"] ?? null) == "link")) {
            // line 13
            echo "                    <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["post"] ?? null), "link", array()), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["post"] ?? null), "title", array()), "html", null, true);
            echo "\" class=\"wpfc-date\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('date')->getCallable(), array($this->getAttribute(($context["post"] ?? null), "date", array()), ($context["meta_date_format"] ?? null))), "html", null, true);
            echo "</a>
                ";
        } else {
            // line 15
            echo "                    <span class=\"wpfc-date\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('date')->getCallable(), array($this->getAttribute(($context["post"] ?? null), "date", array()), ($context["meta_date_format"] ?? null))), "html", null, true);
            echo "</span>
                ";
        }
        // line 17
        echo "            ";
    }

    public function getTemplateName()
    {
        return "@particles/wpfc-assets/wordpress/platform/views/meta/date.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 17,  74 => 15,  64 => 13,  62 => 12,  59 => 11,  56 => 10,  53 => 9,  50 => 8,  44 => 18,  42 => 8,  39 => 7,  36 => 6,  30 => 5,  27 => 4,  25 => 3,  23 => 2,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@particles/wpfc-assets/wordpress/platform/views/meta/date.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/particles/wpfc-assets/wordpress/platform/views/meta/date.html.twig");
    }
}
