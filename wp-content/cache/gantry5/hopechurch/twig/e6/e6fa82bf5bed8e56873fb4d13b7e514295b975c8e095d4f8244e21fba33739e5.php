<?php

/* @nucleus/content/system.html.twig */
class __TwigTemplate_9ffd4ea022b2aa331d3b73213d95e57dc52959be4979e038aaff6b8a5c584f6d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["subtype"] = (($this->getAttribute(($context["segment"] ?? null), "subtype", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["segment"] ?? null), "subtype", array()), $this->getAttribute(($context["segment"] ?? null), "type", array()))) : ($this->getAttribute(($context["segment"] ?? null), "type", array())));
        // line 2
        $context["enabled"] = $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("particles." . ($context["subtype"] ?? null)) . ".enabled"), 1 => 1), "method");
        // line 3
        echo "
";
        // line 4
        ob_start();
        // line 5
        echo "    ";
        if ((($context["enabled"] ?? null) && ((null === $this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", array()), "enabled", array())) || $this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", array()), "enabled", array())))) {
            // line 6
            echo "        ";
            if ((($context["subtype"] ?? null) == "content")) {
                // line 7
                echo "            ";
                $context["class"] = "g-content";
                // line 8
                echo "            ";
                echo ($context["content"] ?? null);
                echo "
        ";
            } elseif ((            // line 9
($context["subtype"] ?? null) == "messages")) {
                // line 10
                echo "            ";
                $context["class"] = "g-system-messages";
                // line 11
                echo "            ";
                echo $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "platform", array()), "displaySystemMessages", array(), "method");
                echo "
        ";
            }
            // line 13
            echo "    ";
        }
        $context["html"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 15
        echo "
";
        // line 16
        if (twig_trim_filter(($context["html"] ?? null))) {
            // line 17
            echo "    <div class=\"";
            echo (($context["class"] ?? null) . (($this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", array()), "class", array())) ? ((" " . twig_join_filter($this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", array()), "class", array()), " "))) : ("")));
            echo "\">
        ";
            // line 18
            echo ($context["html"] ?? null);
            echo "
    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "@nucleus/content/system.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 18,  62 => 17,  60 => 16,  57 => 15,  53 => 13,  47 => 11,  44 => 10,  42 => 9,  37 => 8,  34 => 7,  31 => 6,  28 => 5,  26 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@nucleus/content/system.html.twig", "/var/www/html/wp-content/plugins/gantry5/engines/nucleus/templates/content/system.html.twig");
    }
}
