<?php

/* @gantry-admin/forms/fields/gantry/particle.html.twig */
class __TwigTemplate_e68f88c276ea2e84c67f6ac18a7a2189ab1db4980bf5fac3153e3dc50f1e187d extends Twig_Template
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
        return $this->loadTemplate(((($context["default"] ?? null)) ? ("partials/field.html.twig") : ((("forms/" . ((array_key_exists("layout", $context)) ? (_twig_default_filter(($context["layout"] ?? null), "field")) : ("field"))) . ".html.twig"))), "@gantry-admin/forms/fields/gantry/particle.html.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_input($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"settings-block\"><div class=\"settings-param-field\"><div class=\"input-group\">
    ";
        // line 5
        $context["label"] = (($this->getAttribute(($context["field"] ?? null), "picker_label", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["field"] ?? null), "picker_label", array()), $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_PICK_PARTICLE"))) : ($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_PICK_PARTICLE")));
        // line 6
        echo "    ";
        $context["alt_label"] = (($this->getAttribute(($context["field"] ?? null), "picker_label_alt", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["field"] ?? null), "picker_label_alt", array()), $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_EDIT_PARTICLE"))) : ($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_EDIT_PARTICLE")));
        // line 7
        echo "    <span class=\"g-instancepicker-title\" title=\"";
        echo twig_escape_filter($this->env, (($this->getAttribute(($context["value"] ?? null), "particle", array())) ? (("Particle Type: " . $this->getAttribute(($context["value"] ?? null), "particle", array()))) : ("")), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, (($this->getAttribute(($context["value"] ?? null), "title", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["value"] ?? null), "title", array()), "")) : ("")), "html", null, true);
        echo "</span><button class=\"button\" data-g-instancepicker=\"";
        echo twig_escape_filter($this->env, twig_jsonencode_filter(array("type" => "particle", "field" => twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->fieldNameFilter((($context["scope"] ?? null) . ($context["name"] ?? null)))))), "html_attr");
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
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->fieldNameFilter((($context["scope"] ?? null) . ($context["name"] ?? null))), "html", null, true);
        echo "\"
            value=\"";
        // line 11
        echo ((($context["value"] ?? null)) ? (twig_escape_filter($this->env, twig_jsonencode_filter(($context["value"] ?? null), twig_constant("JSON_UNESCAPED_UNICODE")))) : (""));
        echo "\"
            ";
        // line 13
        echo "            ";
        $this->displayBlock("global_attributes", $context, $blocks);
        echo "
            ";
        // line 15
        echo "            ";
        if (twig_in_filter($this->getAttribute(($context["field"] ?? null), "disabled", array()), array(0 => "on", 1 => "true", 2 => 1))) {
            echo "disabled=\"disabled\"";
        }
        // line 16
        echo "            ";
        if (twig_in_filter($this->getAttribute(($context["field"] ?? null), "required", array()), array(0 => "on", 1 => "true", 2 => 1))) {
            echo "required=\"required\"";
        }
        // line 17
        echo "            />

    <span class=\"g-reset-field\" data-g-reset-field=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->fieldNameFilter((($context["scope"] ?? null) . ($context["name"] ?? null))), "html", null, true);
        echo "\"><i class=\"fa  fa-fw fa-times-circle\" aria-hidden=\"true\"></i></span>
    </div></div></div>
";
    }

    public function getTemplateName()
    {
        return "@gantry-admin/forms/fields/gantry/particle.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 19,  78 => 17,  73 => 16,  68 => 15,  63 => 13,  59 => 11,  55 => 10,  38 => 7,  35 => 6,  33 => 5,  30 => 4,  27 => 3,  18 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@gantry-admin/forms/fields/gantry/particle.html.twig", "/var/www/html/wp-content/plugins/gantry5/admin/templates/forms/fields/gantry/particle.html.twig");
    }
}
