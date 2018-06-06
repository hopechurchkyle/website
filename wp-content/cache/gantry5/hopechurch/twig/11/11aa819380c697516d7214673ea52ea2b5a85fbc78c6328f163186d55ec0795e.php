<?php

/* platform/meta/date.html.twig */
class __TwigTemplate_f374c1d09c6f7fabe8df21cf9d542df58d77fba50193e96cdcd3cacfd3073179 extends Twig_Template
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
        $context["meta_scope"] = "meta-date";
        // line 2
        $context["meta_date_enabled"] = (($context["meta_date_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (((("content." . ($context["scope"] ?? null)) . ".") . ($context["meta_scope"] ?? null)) . ".enabled"), 1 => "1"), "method")));
        // line 3
        $context["meta_date_link"] = (($context["meta_date_link"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (((("content." . ($context["scope"] ?? null)) . ".") . ($context["meta_scope"] ?? null)) . ".link"), 1 => "1"), "method")));
        // line 4
        $context["meta_date_format"] = (($context["meta_date_format"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (((("content." . ($context["scope"] ?? null)) . ".") . ($context["meta_scope"] ?? null)) . ".format"), 1 => ""), "method")));
        // line 5
        echo "
";
        // line 6
        $this->displayBlock('meta_date', $context, $blocks);
    }

    public function block_meta_date($context, array $blocks = array())
    {
        // line 7
        echo "    ";
        if (($context["meta_date_enabled"] ?? null)) {
            // line 8
            echo "        <div class=\"meta-date meta-item\">
            ";
            // line 9
            $this->displayBlock('meta_date_content', $context, $blocks);
            // line 19
            echo "        </div>
    ";
        }
    }

    // line 9
    public function block_meta_date_content($context, array $blocks = array())
    {
        // line 10
        echo "                ";
        $this->loadTemplate("platform/meta/icon.html.twig", "platform/meta/date.html.twig", 10)->display($context);
        // line 11
        echo "                ";
        $this->loadTemplate("platform/meta/prefix.html.twig", "platform/meta/date.html.twig", 11)->display($context);
        // line 12
        echo "
                ";
        // line 13
        if (($context["meta_date_link"] ?? null)) {
            // line 14
            echo "                    <a href=\"";
            echo $this->getAttribute(($context["post"] ?? null), "link", array());
            echo "\" title=\"";
            echo $this->getAttribute(($context["post"] ?? null), "title", array());
            echo "\" class=\"date\">";
            echo $this->getAttribute(($context["post"] ?? null), "date", array(0 => ($context["meta_date_format"] ?? null)), "method");
            echo "</a>
                ";
        } else {
            // line 16
            echo "                    <span class=\"date\">";
            echo $this->getAttribute(($context["post"] ?? null), "date", array(0 => ($context["meta_date_format"] ?? null)), "method");
            echo "</span>
                ";
        }
        // line 18
        echo "            ";
    }

    public function getTemplateName()
    {
        return "platform/meta/date.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 18,  76 => 16,  66 => 14,  64 => 13,  61 => 12,  58 => 11,  55 => 10,  52 => 9,  46 => 19,  44 => 9,  41 => 8,  38 => 7,  32 => 6,  29 => 5,  27 => 4,  25 => 3,  23 => 2,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "platform/meta/date.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/platform/meta/date.html.twig");
    }
}
