<?php

/* @nucleus/layout/container.html.twig */
class __TwigTemplate_2fd3d799ceabdba196b23e86cc62272d1e442e88493b99a2a41d0626b39c5715 extends Twig_Template
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
            $this->loadTemplate((("@nucleus/layout/" . $this->getAttribute($context["segment"], "type", array())) . ".html.twig"), "@nucleus/layout/container.html.twig", 3)->display(array_merge($context, array("segments" => $this->getAttribute($context["segment"], "children", array()))));
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
            $context["attr_id"] = (($this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", array()), "id", array())) ? ($this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", array()), "id", array())) : (("g-" . $this->getAttribute(($context["segment"] ?? null), "id", array()))));
            // line 9
            echo "    ";
            $context["boxed"] = $this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", array()), "boxed", array());
            // line 10
            echo "    ";
            if ( !(null === ($context["boxed"] ?? null))) {
                // line 11
                echo "        ";
                $context["boxed"] = (((twig_trim_filter(($context["boxed"] ?? null)) == "")) ? ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "page", array()), "body", array()), "layout", array()), "sections", array())) : (($context["boxed"] ?? null)));
                // line 12
                echo "    ";
            }
            // line 13
            echo "    ";
            $context["class"] = ("g-wrapper" . (($this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", array()), "class", array())) ? ((" " . $this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", array()), "class", array()))) : ("")));
            // line 14
            echo "    ";
            $context["attr_extra"] = $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->attributeArrayFilter($this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", array()), "extra", array()));
            // line 15
            echo "
    ";
            // line 16
            if (( !(null === ($context["boxed"] ?? null)) && ((($context["boxed"] ?? null) == 0) || (($context["boxed"] ?? null) == 2)))) {
                // line 17
                echo "        ";
                ob_start();
                // line 18
                echo "        <div class=\"g-container";
                echo (((($context["boxed"] ?? null) == 2)) ? (" g-flushed") : (""));
                echo "\">";
                echo ($context["html"] ?? null);
                echo "</div>
        ";
                $context["html"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 20
                echo "    ";
            }
            // line 21
            echo "
    ";
            // line 22
            ob_start();
            // line 23
            echo "    <section id=\"";
            echo ($context["attr_id"] ?? null);
            echo "\" class=\"";
            echo ($context["class"] ?? null);
            echo "\"";
            echo ($context["attr_extra"] ?? null);
            echo ">
        ";
            // line 24
            echo ($context["html"] ?? null);
            echo "
    </section>
    ";
            $context["html"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 27
            echo "
    ";
            // line 28
            if ((($context["boxed"] ?? null) == 1)) {
                // line 29
                echo "        <div class=\"g-container\">";
                echo ($context["html"] ?? null);
                echo "</div>
    ";
            } else {
                // line 31
                echo "        ";
                echo ($context["html"] ?? null);
                echo "
    ";
            }
        }
    }

    public function getTemplateName()
    {
        return "@nucleus/layout/container.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  133 => 31,  127 => 29,  125 => 28,  122 => 27,  116 => 24,  107 => 23,  105 => 22,  102 => 21,  99 => 20,  91 => 18,  88 => 17,  86 => 16,  83 => 15,  80 => 14,  77 => 13,  74 => 12,  71 => 11,  68 => 10,  65 => 9,  62 => 8,  60 => 7,  57 => 6,  42 => 4,  39 => 3,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@nucleus/layout/container.html.twig", "/var/www/html/wp-content/plugins/gantry5/engines/nucleus/templates/layout/container.html.twig");
    }
}
