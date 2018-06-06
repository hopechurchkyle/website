<?php

/* platform/partials/entry-nav.html.twig */
class __TwigTemplate_c20a54a556494919a20a4c0b57900fe5864c212485be67709ce6d3fd5cb82dfd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'entry_nav' => array($this, 'block_entry_nav'),
            'entry_nav_content' => array($this, 'block_entry_nav_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["entry_nav_enabled"] = (($context["entry_nav_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-nav.enabled"), 1 => "1"), "method")));
        // line 2
        $context["entry_nav_title"] = (($context["entry_nav_title"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-nav.title"), 1 => "1"), "method")));
        // line 3
        $context["entry_nav_icon"] = (($context["entry_nav_icon"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-nav.icon"), 1 => "1"), "method")));
        // line 4
        echo "
";
        // line 5
        $context["entry_nav_image"] = (($context["entry_nav_image"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-nav.image.enabled"), 1 => "1"), "method")));
        // line 6
        $context["entry_nav_image_width"] = (($context["entry_nav_image_width"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-nav.image.width"), 1 => "100"), "method")));
        // line 7
        $context["entry_nav_image_height"] = (($context["entry_nav_image_height"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-nav.image.height"), 1 => "120"), "method")));
        // line 8
        echo "
";
        // line 9
        $context["entry_nav_prev_prefix"] = (($context["entry_nav_prev_prefix"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-nav.prev.prefix"), 1 => "Previous Post"), "method")));
        // line 10
        $context["entry_nav_next_prefix"] = (($context["entry_nav_next_prefix"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-nav.next.prefix"), 1 => "Next Post"), "method")));
        // line 11
        $context["entry_nav_same"] = (($context["entry_nav_same"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-nav.same"), 1 => true), "method")));
        // line 12
        echo "
";
        // line 13
        $this->displayBlock('entry_nav', $context, $blocks);
    }

    public function block_entry_nav($context, array $blocks = array())
    {
        // line 14
        echo "    ";
        if ((($context["entry_nav_enabled"] ?? null) && ($this->getAttribute(($context["post"] ?? null), "prev", array()) || $this->getAttribute(($context["post"] ?? null), "next", array())))) {
            // line 15
            echo "        <div class=\"entry-nav\">
            ";
            // line 16
            $this->displayBlock('entry_nav_content', $context, $blocks);
            // line 37
            echo "        </div>
    ";
        }
    }

    // line 16
    public function block_entry_nav_content($context, array $blocks = array())
    {
        // line 17
        echo "                ";
        // line 18
        echo "                ";
        if ($this->getAttribute(($context["post"] ?? null), "prev", array())) {
            // line 19
            echo "                    <div class=\"entry-nav-prev entry-nav-item\">
                        <div class=\"entry-nav-prefix\">";
            // line 20
            echo ($context["entry_nav_prev_prefix"] ?? null);
            echo "</div>
                        <h4 class=\"entry-nav-title\">
                            <a href=\"";
            // line 22
            echo $this->getAttribute($this->getAttribute(($context["post"] ?? null), "prev", array()), "link", array(0 => ($context["entry_nav_same"] ?? null)), "method");
            echo "\" title=\"";
            echo $this->getAttribute($this->getAttribute(($context["post"] ?? null), "prev", array()), "title", array(0 => ($context["entry_nav_same"] ?? null)), "method");
            echo "\">";
            echo $this->getAttribute($this->getAttribute(($context["post"] ?? null), "prev", array()), "title", array(0 => ($context["entry_nav_same"] ?? null)), "method");
            echo "</a>
                        </h4>
                    </div>
                ";
        }
        // line 26
        echo "
                ";
        // line 28
        echo "                ";
        if ($this->getAttribute(($context["post"] ?? null), "next", array())) {
            // line 29
            echo "                    <div class=\"entry-nav-next entry-nav-item\">
                        <div class=\"entry-nav-prefix\">";
            // line 30
            echo ($context["entry_nav_next_prefix"] ?? null);
            echo "</div>
                        <h4 class=\"entry-nav-title\">
                            <a href=\"";
            // line 32
            echo $this->getAttribute($this->getAttribute(($context["post"] ?? null), "next", array()), "link", array(0 => ($context["entry_nav_same"] ?? null)), "method");
            echo "\" title=\"";
            echo $this->getAttribute($this->getAttribute(($context["post"] ?? null), "next", array()), "title", array(0 => ($context["entry_nav_same"] ?? null)), "method");
            echo "\">";
            echo $this->getAttribute($this->getAttribute(($context["post"] ?? null), "next", array()), "title", array(0 => ($context["entry_nav_same"] ?? null)), "method");
            echo "</a>
                        </h4>
                    </div>
                ";
        }
        // line 36
        echo "            ";
    }

    public function getTemplateName()
    {
        return "platform/partials/entry-nav.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  120 => 36,  109 => 32,  104 => 30,  101 => 29,  98 => 28,  95 => 26,  84 => 22,  79 => 20,  76 => 19,  73 => 18,  71 => 17,  68 => 16,  62 => 37,  60 => 16,  57 => 15,  54 => 14,  48 => 13,  45 => 12,  43 => 11,  41 => 10,  39 => 9,  36 => 8,  34 => 7,  32 => 6,  30 => 5,  27 => 4,  25 => 3,  23 => 2,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "platform/partials/entry-nav.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/platform/partials/entry-nav.html.twig");
    }
}
