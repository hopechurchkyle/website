<?php

/* platform/partials/page-header.html.twig */
class __TwigTemplate_8a993717e2588fc0df8191b5b4da49eacdc37eac053a7a5db17c41f7f6fbaf57 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'page_header' => array($this, 'block_page_header'),
            'page_header_content' => array($this, 'block_page_header_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["page_header_enabled"] = $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".page-header.enabled"), 1 => "1"), "method");
        // line 2
        echo "
";
        // line 3
        $context["page_header_title_enabled"] = $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".page-header.title.enabled"), 1 => "1"), "method");
        // line 4
        $context["page_header_title_text"] = $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".page-header.title.text"), 1 => ""), "method");
        // line 5
        $context["page_header_title_tag"] = $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".page-header.title.tag"), 1 => "h2"), "method");
        // line 6
        $context["page_header_has_title"] = (((($context["page_header_title_enabled"] ?? null) && (($context["page_header_title_text"] ?? null) || ($context["title"] ?? null)))) ? ("true") : (""));
        // line 7
        echo "
";
        // line 8
        $context["page_header_description_enabled"] = $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".page-header.description.enabled"), 1 => "1"), "method");
        // line 9
        $context["page_header_description_text"] = $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".page-header.description.text"), 1 => ""), "method");
        // line 10
        $context["page_header_has_description"] = (((($context["page_header_description_enabled"] ?? null) && (($context["page_header_description_text"] ?? null) || ($context["description"] ?? null)))) ? ("true") : (""));
        // line 11
        echo "
";
        // line 12
        $this->displayBlock('page_header', $context, $blocks);
    }

    public function block_page_header($context, array $blocks = array())
    {
        // line 13
        echo "    ";
        if ((($context["page_header_enabled"] ?? null) && (($context["page_header_has_title"] ?? null) || ($context["page_header_has_description"] ?? null)))) {
            // line 14
            echo "        <div class=\"page-header\">
            ";
            // line 15
            $this->displayBlock('page_header_content', $context, $blocks);
            // line 40
            echo "        </div>
    ";
        }
    }

    // line 15
    public function block_page_header_content($context, array $blocks = array())
    {
        // line 16
        echo "                
                ";
        // line 18
        echo "                ";
        if (($context["page_header_has_title"] ?? null)) {
            // line 19
            echo "                    <";
            echo ($context["page_header_title_tag"] ?? null);
            echo " class=\"page-header-title\">
                        ";
            // line 20
            if (($context["page_header_title_text"] ?? null)) {
                // line 21
                echo "                            <span>";
                echo ($context["page_header_title_text"] ?? null);
                echo "</span>
                        ";
            } else {
                // line 23
                echo "                            <span>";
                echo ($context["title"] ?? null);
                echo "</span>
                        ";
            }
            // line 25
            echo "                    </";
            echo ($context["page_header_title_tag"] ?? null);
            echo ">
                ";
        }
        // line 27
        echo "
                ";
        // line 29
        echo "                ";
        if (($context["page_header_has_description"] ?? null)) {
            // line 30
            echo "                    <div class=\"page-header-description\">";
            // line 31
            if (($context["page_header_description_text"] ?? null)) {
                // line 32
                echo ($context["page_header_description_text"] ?? null);
            } else {
                // line 34
                echo ($context["description"] ?? null);
            }
            // line 36
            echo "</div>
                ";
        }
        // line 38
        echo "
            ";
    }

    public function getTemplateName()
    {
        return "platform/partials/page-header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  120 => 38,  116 => 36,  113 => 34,  110 => 32,  108 => 31,  106 => 30,  103 => 29,  100 => 27,  94 => 25,  88 => 23,  82 => 21,  80 => 20,  75 => 19,  72 => 18,  69 => 16,  66 => 15,  60 => 40,  58 => 15,  55 => 14,  52 => 13,  46 => 12,  43 => 11,  41 => 10,  39 => 9,  37 => 8,  34 => 7,  32 => 6,  30 => 5,  28 => 4,  26 => 3,  23 => 2,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "platform/partials/page-header.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/platform/partials/page-header.html.twig");
    }
}
