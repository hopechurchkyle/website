<?php

/* platform/partials/entry-title.html.twig */
class __TwigTemplate_930bbc758e6dd56e9863f5731a173e054c551678ba6b9ef85e506ca6e87f7bd7 extends Twig_Template
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
        $context["entry_title_enabled"] = (($context["entry_title_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-title.enabled"), 1 => "1"), "method")));
        // line 2
        $context["entry_title_tag"] = (($context["entry_title_tag"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-title.tag"), 1 => "h2"), "method")));
        // line 3
        $context["entry_title_link"] = (($context["entry_title_link"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-title.link"), 1 => ""), "method")));
        // line 4
        $context["entry_title_limit"] = (($context["entry_title_limit"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-title.limit"), 1 => ""), "method")));
        // line 5
        $context["entry_title_text"] = ((($context["entry_title_limit"] ?? null)) ? ($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->truncateHtml($this->getAttribute(($context["post"] ?? null), "title", array()), ($context["entry_title_limit"] ?? null))) : ($this->getAttribute(($context["post"] ?? null), "title", array())));
        // line 6
        echo "
";
        // line 7
        $this->displayBlock('entry_title', $context, $blocks);
    }

    public function block_entry_title($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        if (($context["entry_title_enabled"] ?? null)) {
            // line 9
            echo "        <";
            echo ($context["entry_title_tag"] ?? null);
            echo " class=\"entry-title\">       
            ";
            // line 10
            $this->displayBlock('entry_title_content', $context, $blocks);
            // line 19
            echo "        </";
            echo ($context["entry_title_tag"] ?? null);
            echo ">
    ";
        }
        // line 21
        echo "
";
    }

    // line 10
    public function block_entry_title_content($context, array $blocks = array())
    {
        // line 11
        echo "                ";
        if (($context["entry_title_link"] ?? null)) {
            // line 12
            echo "                    <a href=\"";
            echo $this->getAttribute(($context["post"] ?? null), "link", array());
            echo "\" title=\"";
            echo $this->getAttribute(($context["post"] ?? null), "title", array());
            echo "\" class=\"entry-title-text\">";
            // line 13
            echo ($context["entry_title_text"] ?? null);
            // line 14
            echo "</a>
                ";
        } else {
            // line 16
            echo "                    <span class=\"entry-title-text\">";
            echo ($context["entry_title_text"] ?? null);
            echo "</span>
                ";
        }
        // line 18
        echo "            ";
    }

    public function getTemplateName()
    {
        return "platform/partials/entry-title.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 18,  79 => 16,  75 => 14,  73 => 13,  67 => 12,  64 => 11,  61 => 10,  56 => 21,  50 => 19,  48 => 10,  43 => 9,  40 => 8,  34 => 7,  31 => 6,  29 => 5,  27 => 4,  25 => 3,  23 => 2,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "platform/partials/entry-title.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/platform/partials/entry-title.html.twig");
    }
}
