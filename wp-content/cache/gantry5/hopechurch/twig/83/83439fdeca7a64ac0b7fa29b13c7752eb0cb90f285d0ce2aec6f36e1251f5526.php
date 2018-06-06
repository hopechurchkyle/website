<?php

/* @nucleus/layout/wrapper.html.twig */
class __TwigTemplate_df57b987578dc1b011348be26979e61b61fc90d47142553891ccfd6fba2bc955 extends Twig_Template
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
        ob_start();
        // line 2
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["segments"] ?? null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["segment"]) {
            // line 3
            echo "        ";
            $this->loadTemplate((("@nucleus/layout/" . $this->getAttribute($context["segment"], "type", array())) . ".html.twig"), "@nucleus/layout/wrapper.html.twig", 3)->display(array_merge($context, array("segments" => $this->getAttribute($context["segment"], "children", array()))));
            // line 4
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['segment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        $context["html"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 6
        echo "
";
        // line 7
        if (($this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", array()), "sticky", array()) || twig_trim_filter(($context["html"] ?? null)))) {
            // line 8
            echo "    ";
            $context["attr_id"] = (($this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", array(), "any", false, true), "id", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", array(), "any", false, true), "id", array()), ("g-" . $this->getAttribute(($context["segment"] ?? null), "id", array())))) : (("g-" . $this->getAttribute(($context["segment"] ?? null), "id", array()))));
            // line 9
            echo "    ";
            $context["attr_extra"] = $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->attributeArrayFilter($this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", array()), "extra", array()));
            // line 10
            echo "
    <div id=\"";
            // line 11
            echo ($context["attr_id"] ?? null);
            echo "\"";
            echo ($context["attr_extra"] ?? null);
            echo " class=\"";
            echo (($this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", array(), "any", false, true), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", array(), "any", false, true), "class", array()), ($context["attr_id"] ?? null))) : (($context["attr_id"] ?? null)));
            echo "\">
        ";
            // line 12
            echo ($context["html"] ?? null);
            echo "
    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "@nucleus/layout/wrapper.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 12,  71 => 11,  68 => 10,  65 => 9,  62 => 8,  60 => 7,  57 => 6,  42 => 4,  39 => 3,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@nucleus/layout/wrapper.html.twig", "/var/www/html/wp-content/plugins/gantry5/engines/nucleus/templates/layout/wrapper.html.twig");
    }
}
