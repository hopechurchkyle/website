<?php

/* @gantry-admin/pages/configurations/layouts/particle.html.twig */
class __TwigTemplate_6f2a4dc5f5dcd71fc722053d1eba2ef8bb048d596cb5ca90af2773fac4430eec extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'gantry' => array($this, 'block_gantry'),
            'title' => array($this, 'block_title'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return $this->loadTemplate((((($context["ajax"] ?? null) - ($context["suffix"] ?? null))) ? ("@gantry-admin/partials/ajax.html.twig") : ("@gantry-admin/partials/base.html.twig")), "@gantry-admin/pages/configurations/layouts/particle.html.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_gantry($context, array $blocks = array())
    {
        // line 4
        echo "<form method=\"post\"
      action=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute(($context["gantry"] ?? null), "route", array(0 => ($context["action"] ?? null)), "method"), "html", null, true);
        echo "\"
      data-g-inheritance-settings=\"";
        // line 6
        echo twig_escape_filter($this->env, twig_jsonencode_filter(array("id" => $this->getAttribute(($context["item"] ?? null), "id", array()), "type" => $this->getAttribute(($context["item"] ?? null), "type", array()), "subtype" => $this->getAttribute(($context["item"] ?? null), "subtype", array()))), "html_attr");
        echo "\"
>
    <div class=\"g-tabs\" role=\"tablist\">
        <ul>
            ";
        // line 11
        echo "            <li class=\"active\">
                <a href=\"#\" id=\"g-settings-particle-tab\" role=\"presentation\" aria-controls=\"g-settings-particle\" role=\"tab\" aria-expanded=\"true\">
                    ";
        // line 13
        if (($context["inheritable"] ?? null)) {
            echo "<i class=\"fa fa-fw fa-";
            echo ((($this->getAttribute(($context["item"] ?? null), "inherit", array()) && twig_in_filter("attributes", $this->getAttribute($this->getAttribute(($context["item"] ?? null), "inherit", array()), "include", array())))) ? ("lock") : ("unlock"));
            echo "\" aria-hidden=\"true\"></i>";
        }
        // line 14
        echo "                    ";
        $this->displayBlock('title', $context, $blocks);
        // line 17
        echo "                </a>
            </li>
            ";
        // line 20
        echo "            ";
        if (($context["extra"] ?? null)) {
            // line 21
            echo "            <li>
                <a href=\"#\" id=\"g-settings-block-tab\" role=\"presentation\" aria-controls=\"g-settings-block\" role=\"tab\" aria-expanded=\"false\">
                    ";
            // line 23
            if (($context["inheritable"] ?? null)) {
                echo "<i class=\"fa fa-fw fa-";
                echo ((($this->getAttribute(($context["item"] ?? null), "inherit", array()) && twig_in_filter("block", $this->getAttribute($this->getAttribute(($context["item"] ?? null), "inherit", array()), "include", array())))) ? ("lock") : ("unlock"));
                echo "\" aria-hidden=\"true\"></i>";
            }
            // line 24
            echo "                    ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_BLOCK"), "html", null, true);
            echo "
                </a>
            </li>
            ";
        }
        // line 28
        echo "            ";
        // line 29
        echo "            ";
        if (($context["inheritance"] ?? null)) {
            // line 30
            echo "            <li>
                <a href=\"#\" id=\"g-settings-inheritance-tab\" role=\"presentation\" aria-controls=\"g-settings-inheritance\" aria-expanded=\"false\">
                    ";
            // line 32
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_INHERITANCE"), "html", null, true);
            echo "
                </a>
            </li>
            ";
        }
        // line 36
        echo "        </ul>
    </div>

    <div class=\"g-panes\">
        ";
        // line 41
        echo "        <div class=\"g-pane active\" role=\"tabpanel\" id=\"g-settings-particle\" aria-labelledby=\"g-settings-particle-tab\" aria-expanded=\"true\">
            ";
        // line 42
        $this->loadTemplate("@gantry-admin/pages/configurations/layouts/particle-card.html.twig", "@gantry-admin/pages/configurations/layouts/particle.html.twig", 42)->display(array_merge($context, array("title" => $this->getAttribute(        // line 43
($context["item"] ?? null), "title", array()), "blueprints" => $this->getAttribute(        // line 44
($context["particle"] ?? null), "form", array()), "overrideable" => (        // line 45
($context["overrideable"] ?? null) && ( !$this->getAttribute($this->getAttribute(($context["particle"] ?? null), "form", array(), "any", false, true), "overrideable", array(), "any", true, true) || $this->getAttribute($this->getAttribute(($context["particle"] ?? null), "form", array()), "overrideable", array()))), "inherit" => (((twig_in_filter("attributes", $this->getAttribute($this->getAttribute(        // line 46
($context["item"] ?? null), "inherit", array()), "include", array())) && twig_in_filter($this->getAttribute($this->getAttribute(($context["item"] ?? null), "inherit", array()), "outline", array()), $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["inheritance"] ?? null), "form", array()), "fields", array()), "outline", array()), "filter", array())))) ? ($this->getAttribute($this->getAttribute(($context["item"] ?? null), "inherit", array()), "outline", array())) : (null)))));
        // line 48
        echo "        </div>

        ";
        // line 51
        echo "        ";
        if (($context["extra"] ?? null)) {
            // line 52
            echo "        <div class=\"g-pane\" role=\"tabpanel\" id=\"g-settings-block\" aria-labelledby=\"g-settings-block-tab\" aria-expanded=\"false\">
            ";
            // line 53
            $this->loadTemplate("@gantry-admin/pages/configurations/layouts/particle-card.html.twig", "@gantry-admin/pages/configurations/layouts/particle.html.twig", 53)->display(array("gantry" =>             // line 54
($context["gantry"] ?? null), "title" => $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_BLOCK"), "blueprints" => $this->getAttribute(            // line 56
($context["extra"] ?? null), "form", array()), "data" => array("block" => $this->getAttribute(            // line 57
($context["item"] ?? null), "block", array())), "prefix" => "block.", "inherit" => (((twig_in_filter("block", $this->getAttribute($this->getAttribute(            // line 59
($context["item"] ?? null), "inherit", array()), "include", array())) && twig_in_filter($this->getAttribute($this->getAttribute(($context["item"] ?? null), "inherit", array()), "outline", array()), $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["inheritance"] ?? null), "form", array()), "fields", array()), "outline", array()), "filter", array())))) ? ($this->getAttribute($this->getAttribute(($context["item"] ?? null), "inherit", array()), "outline", array())) : (null))));
            // line 61
            echo "        </div>
        ";
        }
        // line 63
        echo "
        ";
        // line 65
        echo "        ";
        if (($context["inheritance"] ?? null)) {
            // line 66
            echo "        <div class=\"g-pane\" role=\"tabpanel\" id=\"g-settings-inheritance\" aria-labelledby=\"g-settings-inheritance-tab\" aria-expanded=\"false\">
            <div class=\"card settings-block\">
                <h4>
                    ";
            // line 69
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_INHERITANCE"), "html", null, true);
            echo "
                </h4>
                <div class=\"inner-params\">
                    <input type=\"hidden\" name=\"";
            // line 72
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->fieldNameFilter("inherit.section"), "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["item"] ?? null), "id", array()), "html", null, true);
            echo "\" />
                    ";
            // line 73
            $this->loadTemplate("forms/fields.html.twig", "@gantry-admin/pages/configurations/layouts/particle.html.twig", 73)->display(array("gantry" =>             // line 74
($context["gantry"] ?? null), "blueprints" => $this->getAttribute(            // line 75
($context["inheritance"] ?? null), "form", array()), "data" => array("inherit" => $this->getAttribute(            // line 76
($context["item"] ?? null), "inherit", array())), "prefix" => "inherit."));
            // line 79
            echo "                </div>
            </div>
        </div>
        ";
        }
        // line 83
        echo "    </div>

    <div class=\"g-modal-actions\">
        <button class=\"button button-primary\" type=\"submit\">";
        // line 86
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_APPLY"), "html", null, true);
        echo "</button>
        <button class=\"button button-primary\" data-apply-and-save>";
        // line 87
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_APPLY_SAVE"), "html", null, true);
        echo "</button>
        <button class=\"button g5-dialog-close\">";
        // line 88
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_CANCEL"), "html", null, true);
        echo "</button>
    </div>
</form>
";
    }

    // line 14
    public function block_title($context, array $blocks = array())
    {
        // line 15
        echo "                    ";
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_PARTICLE"), "html", null, true);
        echo "
                    ";
    }

    public function getTemplateName()
    {
        return "@gantry-admin/pages/configurations/layouts/particle.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  192 => 15,  189 => 14,  181 => 88,  177 => 87,  173 => 86,  168 => 83,  162 => 79,  160 => 76,  159 => 75,  158 => 74,  157 => 73,  151 => 72,  145 => 69,  140 => 66,  137 => 65,  134 => 63,  130 => 61,  128 => 59,  127 => 57,  126 => 56,  125 => 54,  124 => 53,  121 => 52,  118 => 51,  114 => 48,  112 => 46,  111 => 45,  110 => 44,  109 => 43,  108 => 42,  105 => 41,  99 => 36,  92 => 32,  88 => 30,  85 => 29,  83 => 28,  75 => 24,  69 => 23,  65 => 21,  62 => 20,  58 => 17,  55 => 14,  49 => 13,  45 => 11,  38 => 6,  34 => 5,  31 => 4,  28 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@gantry-admin/pages/configurations/layouts/particle.html.twig", "/var/www/html/wp-content/plugins/gantry5/admin/templates/pages/configurations/layouts/particle.html.twig");
    }
}
