<?php

/* forms/fields/gantry/widget.html.twig */
class __TwigTemplate_90da81c54bcd2aea4bb803ad6389a456d84df3e5b74fdb8dbbefb653eda3b261 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'input' => array($this, 'block_input'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return $this->loadTemplate(((($context["default"] ?? null)) ? ("partials/field.html.twig") : ((("forms/" . ((array_key_exists("layout", $context)) ? (_twig_default_filter(($context["layout"] ?? null), "field")) : ("field"))) . ".html.twig"))), "forms/fields/gantry/widget.html.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_input($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"settings-block\"><div class=\"input-group\">
                ";
        // line 5
        $context["label"] = (($this->getAttribute(($context["field"] ?? null), "picker_label", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["field"] ?? null), "picker_label", array()), $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("Pick a Widget"))) : ($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("Pick a Widget")));
        // line 6
        echo "                ";
        $context["alt_label"] = (($this->getAttribute(($context["field"] ?? null), "picker_label_alt", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["field"] ?? null), "picker_label_alt", array()), $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("Edit Widget"))) : ($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("Edit Widget")));
        // line 7
        echo "                ";
        $context["value_array"] = (((($context["value"] ?? null) && twig_test_iterable(($context["value"] ?? null)))) ? (($context["value"] ?? null)) : ($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->jsonDecodeFilter(($context["value"] ?? null))));
        // line 8
        echo "                ";
        $context["value_json"] = (((($context["value"] ?? null) && twig_test_iterable(($context["value"] ?? null)))) ? (twig_jsonencode_filter(($context["value"] ?? null))) : (($context["value"] ?? null)));
        // line 9
        echo "                <span class=\"g-instancepicker-title\">";
        echo twig_escape_filter($this->env, (($this->getAttribute(($context["value_array"] ?? null), "title", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["value_array"] ?? null), "title", array()), "")) : ("")), "html", null, true);
        echo "</span><button class=\"button\" data-g-instancepicker=\"";
        echo twig_escape_filter($this->env, twig_jsonencode_filter(array("type" => "widget", "field" => $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->fieldNameFilter((($context["scope"] ?? null) . ($context["name"] ?? null))))), "html_attr");
        echo "\" data-g-instancepicker-text=\"";
        echo twig_escape_filter($this->env, ($context["label"] ?? null), "html", null, true);
        echo "\" data-g-instancepicker-alttext=\"";
        echo twig_escape_filter($this->env, ($context["alt_label"] ?? null), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, ((($context["value"] ?? null)) ? (($context["alt_label"] ?? null)) : (($context["label"] ?? null))), "html", null, true);
        echo "</button>
                <input
                        type=\"hidden\"
                        name=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->fieldNameFilter((($context["scope"] ?? null) . ($context["name"] ?? null))), "html", null, true);
        echo "\"
                        ";
        // line 14
        echo "                        value=\"";
        echo twig_escape_filter($this->env, ($context["value_json"] ?? null), "html_attr");
        echo "\"
                        ";
        // line 16
        echo "                        ";
        $this->displayBlock("global_attributes", $context, $blocks);
        echo "
                        ";
        // line 18
        echo "                        ";
        if (twig_in_filter($this->getAttribute(($context["field"] ?? null), "disabled", array()), array(0 => "on", 1 => "true", 2 => 1))) {
            echo "disabled=\"disabled\"";
        }
        // line 19
        echo "                        ";
        if (twig_in_filter($this->getAttribute(($context["field"] ?? null), "required", array()), array(0 => "on", 1 => "true", 2 => 1))) {
            echo "required=\"required\"";
        }
        // line 20
        echo "                        />

                <span class=\"g-reset-field\" data-g-reset-field=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->fieldNameFilter((($context["scope"] ?? null) . ($context["name"] ?? null))), "html", null, true);
        echo "\"><i class=\"fa  fa-fw fa-times-circle\" aria-hidden=\"true\"></i></span>
            </div></div>
";
    }

    public function getTemplateName()
    {
        return "forms/fields/gantry/widget.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 22,  83 => 20,  78 => 19,  73 => 18,  68 => 16,  63 => 14,  59 => 12,  44 => 9,  41 => 8,  38 => 7,  35 => 6,  33 => 5,  30 => 4,  27 => 3,  18 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "forms/fields/gantry/widget.html.twig", "/var/www/html/wp-content/plugins/gantry5/admin/templates/forms/fields/gantry/widget.html.twig");
    }
}
