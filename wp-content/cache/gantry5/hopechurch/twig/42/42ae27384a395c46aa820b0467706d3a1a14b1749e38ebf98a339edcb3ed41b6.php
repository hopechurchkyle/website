<?php

/* @particles/wpfc-assets/wordpress/platform/views/partials/entry-title.html.twig */
class __TwigTemplate_645e27ba74db92dbe231f808081670833f5fcc7920ca38a6158cc044339c37a4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'entry_title' => array($this, 'block_entry_title'),
            'entry_title_content' => array($this, 'block_entry_title_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["entry_title_enabled"] = (($context["entry_title_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["scope"] ?? null), "title", array()), "enabled", array())));
        // line 2
        $context["entry_title_tag"] = (($context["entry_title_tag"]) ?? ($this->getAttribute($this->getAttribute(($context["scope"] ?? null), "title", array()), "tag", array())));
        // line 3
        $context["entry_title_limit"] = (($context["entry_title_limit"]) ?? ($this->getAttribute($this->getAttribute(($context["scope"] ?? null), "title", array()), "limit", array())));
        // line 4
        $context["entry_title_text"] = ((($context["entry_title_limit"] ?? null)) ? ($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->truncateHtml($this->getAttribute(($context["post"] ?? null), "title", array()), ($context["entry_title_limit"] ?? null))) : ($this->getAttribute(($context["post"] ?? null), "title", array())));
        // line 5
        echo "
";
        // line 6
        $this->displayBlock('entry_title', $context, $blocks);
    }

    public function block_entry_title($context, array $blocks = array())
    {
        // line 7
        echo "    ";
        if (($context["entry_title_enabled"] ?? null)) {
            // line 8
            echo "        <";
            echo twig_escape_filter($this->env, ($context["entry_title_tag"] ?? null), "html", null, true);
            echo " class=\"wpfc-entry-title\">   
            ";
            // line 9
            $this->displayBlock('entry_title_content', $context, $blocks);
            // line 17
            echo "    
        </";
            // line 18
            echo twig_escape_filter($this->env, ($context["entry_title_tag"] ?? null), "html", null, true);
            echo ">
    ";
        }
    }

    // line 9
    public function block_entry_title_content($context, array $blocks = array())
    {
        // line 10
        echo "                ";
        if ((($context["entry_title_enabled"] ?? null) == "link")) {
            // line 11
            echo "                    <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["post"] ?? null), "link", array()), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["post"] ?? null), "title", array()), "html", null, true);
            echo "\" class=\"wpfc-entry-title-text\">";
            // line 12
            echo ($context["entry_title_text"] ?? null);
            // line 13
            echo "</a>
                ";
        } else {
            // line 15
            echo "                    <span class=\"wpfc-entry-title-text\">";
            echo ($context["entry_title_text"] ?? null);
            echo "</span>
                ";
        }
        // line 17
        echo "            ";
    }

    public function getTemplateName()
    {
        return "@particles/wpfc-assets/wordpress/platform/views/partials/entry-title.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 17,  76 => 15,  72 => 13,  70 => 12,  64 => 11,  61 => 10,  58 => 9,  51 => 18,  48 => 17,  46 => 9,  41 => 8,  38 => 7,  32 => 6,  29 => 5,  27 => 4,  25 => 3,  23 => 2,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@particles/wpfc-assets/wordpress/platform/views/partials/entry-title.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/particles/wpfc-assets/wordpress/platform/views/partials/entry-title.html.twig");
    }
}
