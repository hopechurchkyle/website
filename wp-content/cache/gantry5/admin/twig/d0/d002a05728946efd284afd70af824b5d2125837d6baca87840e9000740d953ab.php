<?php

/* forms/fields/input/colorpicker.html.twig */
class __TwigTemplate_61f62a9cb5d9a8dcf4439e4a0c755dbb476d8736dbc999e4e402067c770a88bf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("forms/fields/input/group/group.html.twig", "forms/fields/input/colorpicker.html.twig", 1);
        $this->blocks = array(
            'input' => array($this, 'block_input'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "forms/fields/input/group/group.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 9
    public function block_input($context, array $blocks = array())
    {
        // line 10
        echo "        ";
        $context["field"] = twig_array_merge(($context["field"] ?? null), array("style" => ("background-color: " . ($context["value"] ?? null)), "pattern" => "^#([a-fA-F0-9]{6})|(rgba\\(\\s*(0|[1-9]\\d?|1\\d\\d?|2[0-4]\\d|25[0-5])\\s*,\\s*(0|[1-9]\\d?|1\\d\\d?|2[0-4]\\d|25[0-5])\\s*,\\s*(0|[1-9]\\d?|1\\d\\d?|2[0-4]\\d|25[0-5])\\s*,\\s*((0.[0-9]+)|[01])\\s*\\))\$"));
        // line 11
        echo "        <div class=\"g-colorpicker ";
        echo $this->getAttribute($this, "contrast", array(0 => $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->colorContrastFunc(twig_lower_filter($this->env, ($context["value"] ?? null)))), "method");
        echo "\">
        <input
            ";
        // line 14
        echo "            type=\"text\"
            name=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->fieldNameFilter((($context["scope"] ?? null) . ($context["name"] ?? null))), "html", null, true);
        echo "\"
            value=\"";
        // line 16
        echo twig_escape_filter($this->env, twig_lower_filter($this->env, twig_join_filter(($context["value"] ?? null), ", ")), "html", null, true);
        echo "\"
            ";
        // line 18
        echo "            ";
        $this->displayBlock("global_attributes", $context, $blocks);
        echo "
            ";
        // line 20
        echo "            ";
        if (twig_in_filter($this->getAttribute(($context["field"] ?? null), "autocomplete", array()), array(0 => "on", 1 => "off"))) {
            echo "autocomplete=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "autocomplete", array()), "html", null, true);
            echo "\"";
        }
        // line 21
        echo "            ";
        if (twig_in_filter($this->getAttribute(($context["field"] ?? null), "autofocus", array()), array(0 => "on", 1 => "true", 2 => 1))) {
            echo "autofocus=\"autofocus\"";
        }
        // line 22
        echo "            ";
        if ($this->getAttribute(($context["field"] ?? null), "pattern", array(), "any", true, true)) {
            echo "pattern=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "pattern", array()), "html", null, true);
            echo "\"";
        }
        // line 23
        echo "            ";
        if (twig_in_filter($this->getAttribute(($context["field"] ?? null), "disabled", array()), array(0 => "on", 1 => "true", 2 => 1))) {
            echo "disabled=\"disabled\"";
        }
        // line 24
        echo "            ";
        if ($this->getAttribute(($context["field"] ?? null), "list", array(), "any", true, true)) {
            echo "list=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "list", array()), "html", null, true);
            echo "\"";
        }
        // line 25
        echo "            />
            <i class=\"fa fa-tint\" aria-hidden=\"true\"></i>
        </div>
";
    }

    // line 3
    public function getcontrast($__value__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "value" => $__value__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            ob_start();
            // line 4
            echo "    ";
            if ( !($context["value"] ?? null)) {
                // line 5
                echo "    light-text
    ";
            }
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "forms/fields/input/colorpicker.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 5,  107 => 4,  94 => 3,  87 => 25,  80 => 24,  75 => 23,  68 => 22,  63 => 21,  56 => 20,  51 => 18,  47 => 16,  43 => 15,  40 => 14,  34 => 11,  31 => 10,  28 => 9,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "forms/fields/input/colorpicker.html.twig", "/var/www/html/wp-content/plugins/gantry5/admin/templates/forms/fields/input/colorpicker.html.twig");
    }
}
