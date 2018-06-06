<?php

/* wpfc-sermon/meta/service.html.twig */
class __TwigTemplate_ccf55cd21d7c89dd8c46669aed1db5537f8464709bb304f10da893b92bbb27f4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'sermon_meta_service' => array($this, 'block_sermon_meta_service'),
            'sermon_meta_service_content' => array($this, 'block_sermon_meta_service_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["meta_scope"] = "meta-service";
        // line 2
        $context["sermon_meta_service_enabled"] = (($context["sermon_meta_service"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (((("content." . ($context["scope"] ?? null)) . ".") . ($context["meta_scope"] ?? null)) . ".enabled"), 1 => "1"), "method")));
        // line 3
        $context["sermon_meta_service_link"] = (($context["sermon_meta_service_link"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (((("content." . ($context["scope"] ?? null)) . ".") . ($context["meta_scope"] ?? null)) . ".link"), 1 => "1"), "method")));
        // line 4
        echo "
";
        // line 5
        $this->displayBlock('sermon_meta_service', $context, $blocks);
    }

    public function block_sermon_meta_service($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        if ((($context["sermon_meta_service_enabled"] ?? null) && $this->getAttribute(($context["post"] ?? null), "terms", array(0 => "wpfc_service_type"), "method"))) {
            // line 7
            echo "        <div class=\"meta-service meta-item\">
            ";
            // line 8
            $this->displayBlock('sermon_meta_service_content', $context, $blocks);
            // line 22
            echo "        </div>
    ";
        }
    }

    // line 8
    public function block_sermon_meta_service_content($context, array $blocks = array())
    {
        // line 9
        echo "                ";
        $this->loadTemplate("platform/meta/icon.html.twig", "wpfc-sermon/meta/service.html.twig", 9)->display($context);
        // line 10
        echo "                ";
        $this->loadTemplate("platform/meta/prefix.html.twig", "wpfc-sermon/meta/service.html.twig", 10)->display($context);
        // line 11
        echo "                
                <span class=\"service\">
                    ";
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["post"] ?? null), "terms", array(0 => "wpfc_service_type"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["service"]) {
            // line 14
            echo "                        ";
            if (($context["sermon_meta_service_link"] ?? null)) {
                // line 15
                echo "                            <a href=\"";
                echo $this->getAttribute($context["service"], "link", array());
                echo "\" title=\"";
                echo $this->getAttribute($context["service"], "title", array());
                echo "\" class=\"single-service\">";
                echo $this->getAttribute($context["service"], "title", array());
                echo "</a>
                        ";
            } else {
                // line 17
                echo "                            <span class=\"single-service\">";
                echo $this->getAttribute($context["service"], "title", array());
                echo "</span>
                        ";
            }
            // line 19
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['service'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "                </span>
            ";
    }

    public function getTemplateName()
    {
        return "wpfc-sermon/meta/service.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 20,  86 => 19,  80 => 17,  70 => 15,  67 => 14,  63 => 13,  59 => 11,  56 => 10,  53 => 9,  50 => 8,  44 => 22,  42 => 8,  39 => 7,  36 => 6,  30 => 5,  27 => 4,  25 => 3,  23 => 2,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "wpfc-sermon/meta/service.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/wpfc-sermon/meta/service.html.twig");
    }
}
