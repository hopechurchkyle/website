<?php

/* forms/fields/select/select.html.twig */
class __TwigTemplate_fa0942453a2fb1ed6b4204906331a39de009bd0d004ab2685f550d8335b7c030 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'input' => array($this, 'block_input'),
            'options' => array($this, 'block_options'),
            'reset_field' => array($this, 'block_reset_field'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return $this->loadTemplate((("forms/" . ((array_key_exists("layout", $context)) ? (_twig_default_filter(($context["layout"] ?? null), "field")) : ("field"))) . ".html.twig"), "forms/fields/select/select.html.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_input($context, array $blocks = array())
    {
        // line 4
        echo "    <select
            ";
        // line 6
        echo "            name=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->fieldNameFilter((($context["scope"] ?? null) . ($context["name"] ?? null))), "html", null, true);
        echo "\"
            ";
        // line 8
        echo "            ";
        $this->displayBlock("global_attributes", $context, $blocks);
        echo "
            ";
        // line 10
        echo "            ";
        if (twig_in_filter($this->getAttribute(($context["field"] ?? null), "autofocus", array()), array(0 => "on", 1 => "true", 2 => 1))) {
            echo "autofocus=\"autofocus\"";
        }
        // line 11
        echo "            ";
        if (twig_in_filter($this->getAttribute(($context["field"] ?? null), "disabled", array()), array(0 => "on", 1 => "true", 2 => 1))) {
            echo "disabled=\"disabled\"";
        }
        // line 12
        echo "            ";
        if (twig_in_filter($this->getAttribute(($context["field"] ?? null), "multiple", array()), array(0 => "on", 1 => "true", 2 => 1))) {
            echo "multiple=\"multiple\"";
        }
        // line 13
        echo "            ";
        if (twig_in_filter($this->getAttribute(($context["field"] ?? null), "required", array()), array(0 => "on", 1 => "true", 2 => 1))) {
            echo "required=\"required\"";
        }
        // line 14
        echo "            ";
        if ($this->getAttribute(($context["field"] ?? null), "placeholder", array(), "any", true, true)) {
            echo "data-placeholder=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "placeholder", array()), "html", null, true);
            echo "\"";
        }
        // line 15
        echo "            ";
        if ($this->getAttribute(($context["field"] ?? null), "size", array(), "any", true, true)) {
            echo "size=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "size", array()), "html", null, true);
            echo "\"";
        }
        // line 16
        echo "            >

        ";
        // line 18
        $this->displayBlock('options', $context, $blocks);
        // line 30
        echo "    </select>
    ";
        // line 31
        $this->displayBlock('reset_field', $context, $blocks);
    }

    // line 18
    public function block_options($context, array $blocks = array())
    {
        // line 19
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["field"] ?? null), "options", array()));
        foreach ($context['_seq'] as $context["key"] => $context["text"]) {
            // line 20
            echo "                <option
                        ";
            // line 22
            echo "                        ";
            if ($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->is_selectedFunc($context["key"], ($context["value"] ?? null))) {
                echo "selected=\"selected\"";
            }
            // line 23
            echo "                        value=\"";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\"
                        ";
            // line 25
            echo "                        ";
            if (twig_in_filter($this->getAttribute($this->getAttribute(($context["field"] ?? null), "options", array()), "disabled", array()), array(0 => "on", 1 => "true", 2 => 1))) {
                echo "disabled=\"disabled\"";
            }
            // line 26
            echo "                        ";
            if ($this->getAttribute($this->getAttribute(($context["field"] ?? null), "options", array(), "any", false, true), "label", array(), "any", true, true)) {
                echo "label=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["field"] ?? null), "options", array()), "label", array()), "html", null, true);
                echo "\"";
            }
            // line 27
            echo "                        >";
            echo twig_escape_filter($this->env, $context["text"], "html", null, true);
            echo "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['text'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "        ";
    }

    // line 31
    public function block_reset_field($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "forms/fields/select/select.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 31,  134 => 29,  125 => 27,  118 => 26,  113 => 25,  108 => 23,  103 => 22,  100 => 20,  95 => 19,  92 => 18,  88 => 31,  85 => 30,  83 => 18,  79 => 16,  72 => 15,  65 => 14,  60 => 13,  55 => 12,  50 => 11,  45 => 10,  40 => 8,  35 => 6,  32 => 4,  29 => 3,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "forms/fields/select/select.html.twig", "/var/www/html/wp-content/plugins/gantry5/admin/templates/forms/fields/select/select.html.twig");
    }
}
