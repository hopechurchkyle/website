<?php

/* platform/partials/readmore.html.twig */
class __TwigTemplate_d78ddbc98b97af70b53bb6c182c2d47b03fa329e3d5962cdedab1db6f986b0f3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'readmore' => array($this, 'block_readmore'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["readmore"] = $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->pregMatch("/<!--more(.*?)?-->/", $this->getAttribute(($context["post"] ?? null), "post_content", array()));
        // line 2
        $context["readmore_mode"] = (($context["readmore_mode"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".readmore.mode"), 1 => "auto"), "method")));
        // line 3
        $context["readmore_class"] = (($context["readmore_class"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".readmore.class"), 1 => "button small"), "method")));
        // line 4
        $context["readmore_label"] = (($context["readmore_label"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".readmore.label"), 1 => "Read More"), "method")));
        // line 5
        $context["entry_content_limit"] = (($context["entry_content_limit"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-content.limit"), 1 => ""), "method")));
        // line 6
        echo "
";
        // line 7
        $this->displayBlock('readmore', $context, $blocks);
    }

    public function block_readmore($context, array $blocks = array())
    {
        echo "  
    ";
        // line 8
        if (((($context["readmore_mode"] ?? null) == "always") || ((($context["readmore_mode"] ?? null) == "auto") && ((($context["readmore"] ?? null) || $this->getAttribute(($context["post"] ?? null), "post_excerpt", array())) || ($context["entry_content_limit"] ?? null))))) {
            // line 9
            echo "        <div class=\"readmore\">     
            <a href=\"";
            // line 10
            echo $this->getAttribute(($context["post"] ?? null), "link", array());
            echo "\" class=\"";
            echo ($context["readmore_class"] ?? null);
            echo "\">";
            // line 11
            if ($this->getAttribute(($context["readmore"] ?? null), 1, array(), "array")) {
                // line 12
                echo $this->getAttribute(($context["readmore"] ?? null), 1, array(), "array");
            } else {
                // line 14
                echo ($context["readmore_label"] ?? null);
            }
            // line 16
            echo "</a>
        </div>
    ";
        }
    }

    public function getTemplateName()
    {
        return "platform/partials/readmore.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 16,  56 => 14,  53 => 12,  51 => 11,  46 => 10,  43 => 9,  41 => 8,  33 => 7,  30 => 6,  28 => 5,  26 => 4,  24 => 3,  22 => 2,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "platform/partials/readmore.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/platform/partials/readmore.html.twig");
    }
}
