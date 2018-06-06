<?php

/* @nucleus/content/position.html.twig */
class __TwigTemplate_200be1ed3c8a0148922cb627c74b84195b146d935f8e425199a68d0d8d238456 extends Twig_Template
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
        try {            // line 2
            echo "    ";
            if ( !($context["particle"] ?? null)) {
                // line 3
                echo "        ";
                $context["enabled"] = $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("particles." . $this->getAttribute(($context["segment"] ?? null), "type", array())) . ".enabled"), 1 => 1), "method");
                // line 4
                echo "        ";
                $context["particle"] = $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "getJoined", array(0 => ("particles." . $this->getAttribute(($context["segment"] ?? null), "type", array())), 1 => $this->getAttribute(($context["segment"] ?? null), "attributes", array())), "method");
                // line 5
                echo "    ";
            }
            // line 6
            echo "
    ";
            // line 7
            ob_start();
            // line 8
            echo "        ";
            if ((($context["enabled"] ?? null) && ((null === $this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", array()), "enabled", array())) || $this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", array()), "enabled", array())))) {
                // line 9
                echo "            ";
                $this->loadTemplate(array(0 => (("particles/" . (($this->getAttribute(($context["segment"] ?? null), "subtype", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["segment"] ?? null), "subtype", array()), "position")) : ("position"))) . ".html.twig"), 1 => (("@particles/" . (($this->getAttribute(                // line 10
($context["segment"] ?? null), "subtype", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["segment"] ?? null), "subtype", array()), "position")) : ("position"))) . ".html.twig")), "@nucleus/content/position.html.twig", 9)->display($context);
                // line 11
                echo "        ";
            }
            // line 12
            echo "    ";
            $context["html"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 14
            if (twig_trim_filter(($context["html"] ?? null))) {
                // line 15
                echo "        ";
                if (($this->getAttribute(($context["gantry"] ?? null), "debug", array()) && $this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", array()), "key", array()))) {
                    echo "<!-- START POSITION ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", array()), "key", array()), "html", null, true);
                    echo " -->";
                }
                // line 16
                echo "
        <div class=\"g-content";
                // line 17
                echo twig_escape_filter($this->env, (($this->getAttribute(($context["segment"] ?? null), "classes", array())) ? ((" " . twig_escape_filter($this->env, twig_join_filter($this->getAttribute(($context["segment"] ?? null), "classes", array()), " ")))) : ("")), "html", null, true);
                echo "\">
            ";
                // line 18
                echo ($context["html"] ?? null);
                echo "
        </div>
        ";
                // line 20
                if (($this->getAttribute(($context["gantry"] ?? null), "debug", array()) && $this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", array()), "key", array()))) {
                    echo "<!-- END POSITION ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", array()), "key", array()), "html", null, true);
                    echo " -->";
                }
                // line 21
                echo "    ";
            }
            // line 22
            echo "
";
        } catch (\Exception $e) {
            if ($context['gantry']->debug()) throw $e;
            GANTRY_DEBUGGER && method_exists('Gantry\Debugger', 'addException') && \Gantry\Debugger::addException($e);
            $context['e'] = $e;
            // line 24
            echo "    <div class=\"alert alert-error\"><strong>Error</strong> while rendering ";
            echo twig_escape_filter($this->env, (($this->getAttribute(($context["segment"] ?? null), "subtype", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["segment"] ?? null), "subtype", array()), "position")) : ("position")), "html", null, true);
            echo ".</div>
";
        }
    }

    public function getTemplateName()
    {
        return "@nucleus/content/position.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 24,  80 => 22,  77 => 21,  71 => 20,  66 => 18,  62 => 17,  59 => 16,  52 => 15,  50 => 14,  47 => 12,  44 => 11,  42 => 10,  40 => 9,  37 => 8,  35 => 7,  32 => 6,  29 => 5,  26 => 4,  23 => 3,  20 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@nucleus/content/position.html.twig", "/var/www/html/wp-content/plugins/gantry5/engines/nucleus/templates/content/position.html.twig");
    }
}
