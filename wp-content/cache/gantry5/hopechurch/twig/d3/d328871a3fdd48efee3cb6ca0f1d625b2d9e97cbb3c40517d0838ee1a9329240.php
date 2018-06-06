<?php

/* @nucleus/layout/offcanvas.html.twig */
class __TwigTemplate_7a3851cd765ef6d4b95bfb46d0b7e7a532cac36617c91d7e7e13161016135258 extends Twig_Template
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
        $context["attr_class"] = (($this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", array()), "class", array())) ? (((" class=\"" . twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", array()), "class", array()))) . "\"")) : (""));
        // line 2
        $context["attr_extra"] = $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->attributeArrayFilter($this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", array()), "extra", array()));
        // line 3
        echo "
";
        // line 4
        ob_start();
        // line 5
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["segment"] ?? null), "children", array()));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 6
            echo "        ";
            $this->loadTemplate((("@nucleus/layout/" . $this->getAttribute($context["child"], "type", array())) . ".html.twig"), "@nucleus/layout/offcanvas.html.twig", 6)->display(array_merge($context, array("segments" => $this->getAttribute($context["child"], "children", array()))));
            // line 7
            echo "    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        $context["offcanvas"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 10
        if (($this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", array()), "sticky", array()) || twig_trim_filter(($context["offcanvas"] ?? null)))) {
            // line 11
            echo "<div id=\"g-offcanvas\" ";
            echo ($context["attr_class"] ?? null);
            echo ($context["attr_extra"] ?? null);
            echo " data-g-offcanvas-swipe=\"";
            echo (($this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", array(), "any", false, true), "swipe", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", array(), "any", false, true), "swipe", array()), "1")) : ("1"));
            echo "\" data-g-offcanvas-css3=\"";
            echo (($this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", array(), "any", false, true), "css3animation", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", array(), "any", false, true), "css3animation", array()), "1")) : ("1"));
            echo "\">
    ";
            // line 12
            echo ($context["offcanvas"] ?? null);
            // line 13
            echo "</div>
";
        }
    }

    public function getTemplateName()
    {
        return "@nucleus/layout/offcanvas.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 13,  76 => 12,  66 => 11,  64 => 10,  49 => 7,  46 => 6,  28 => 5,  26 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@nucleus/layout/offcanvas.html.twig", "/var/www/html/wp-content/plugins/gantry5/engines/nucleus/templates/layout/offcanvas.html.twig");
    }
}
