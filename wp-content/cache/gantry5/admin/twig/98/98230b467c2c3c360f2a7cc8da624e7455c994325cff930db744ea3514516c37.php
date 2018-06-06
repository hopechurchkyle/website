<?php

/* @gantry-admin/modals/widget.html.twig */
class __TwigTemplate_946232645d5127e4514ea2da2410c8aa44abf5380eedb8d61212f372db31e246 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'gantry' => array($this, 'block_gantry'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return $this->loadTemplate((((($context["ajax"] ?? null) - ($context["suffix"] ?? null))) ? ("@gantry-admin/partials/ajax.html.twig") : ("@gantry-admin/partials/base.html.twig")), "@gantry-admin/modals/widget.html.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_gantry($context, array $blocks = array())
    {
        // line 4
        echo "<form method=\"post\" action=\"";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["gantry"] ?? null), "route", array(0 => ($context["action"] ?? null)), "method"), "html", null, true);
        echo "\">
    <div class=\"g-tabs\" role=\"tablist\">
        <ul>
            <li class=\"active\">
                <a href=\"#\" id=\"g-switcher-platforms-tab\" role=\"presentation\" aria-controls=\"g-switcher-platforms\" role=\"tab\" aria-expanded=\"true\">";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_WIDGET"), "html", null, true);
        echo "</a>
            </li>
            ";
        // line 10
        if (($context["block"] ?? null)) {
            // line 11
            echo "            <li>
                <a href=\"#\" id=\"g-settings-block-tab\" role=\"presentation\" aria-controls=\"g-settings-block\" role=\"tab\" aria-expanded=\"false\">";
            // line 12
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_BLOCK"), "html", null, true);
            echo "</a>
            </li>
            ";
        }
        // line 15
        echo "        </ul>
    </div>

    <div class=\"g-panes\">
        <div class=\"g-pane active\" role=\"tabpanel\" id=\"g-settings-particle\" aria-labelledby=\"g-settings-particle-tab\" aria-expanded=\"true\">
            <div class=\"card settings-block\">
                <h4>
                    <span data-title-editable=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute(($context["item"] ?? null), "title", array()), "html", null, true);
        echo "\" class=\"title\">";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["item"] ?? null), "title", array()), "html", null, true);
        echo "</span>
                    <i class=\"fa fa-pencil font-small\" aria-hidden=\"true\" tabindex=\"0\" aria-label=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_EDIT_TITLE", $this->getAttribute(($context["item"] ?? null), "title", array())), "html", null, true);
        echo "\" data-title-edit=\"\"></i>
                    <span class=\"badge font-small\">";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["item"] ?? null), "options", array()), "type", array()), "html", null, true);
        echo "</span>
                </h4>

                <div class=\"wp-form-params\">
                    ";
        // line 28
        echo ($context["form"] ?? null);
        echo "
                </div>
            </div>
        </div>

        ";
        // line 33
        if (($context["block"] ?? null)) {
            // line 34
            echo "        <div class=\"g-pane\" role=\"tabpanel\" id=\"g-settings-block\" aria-labelledby=\"g-settings-block-tab\" aria-expanded=\"false\">
            <div class=\"card settings-block\">
                <h4>
                    ";
            // line 37
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_BLOCK"), "html", null, true);
            echo "
                </h4>
                <div class=\"inner-params\">
                    ";
            // line 40
            $this->loadTemplate("forms/fields.html.twig", "@gantry-admin/modals/widget.html.twig", 40)->display(array_merge($context, array("blueprints" => $this->getAttribute(($context["block"] ?? null), "form", array()), "data" => $this->getAttribute(($context["item"] ?? null), "options", array()), "scope" => "block.")));
            // line 41
            echo "                </div>
            </div>
        </div>
        ";
        }
        // line 45
        echo "    </div>

    <div class=\"g-modal-actions\">
        <button class=\"button button-primary\" type=\"submit\">";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_APPLY"), "html", null, true);
        echo "</button>
        <button class=\"button button-primary\" data-apply-and-save=\"\">";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_APPLY_SAVE"), "html", null, true);
        echo "</button>
        <button class=\"button g5-dialog-close\">";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_CANCEL"), "html", null, true);
        echo "</button>
    </div>
</form>
";
    }

    public function getTemplateName()
    {
        return "@gantry-admin/modals/widget.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 50,  118 => 49,  114 => 48,  109 => 45,  103 => 41,  101 => 40,  95 => 37,  90 => 34,  88 => 33,  80 => 28,  73 => 24,  69 => 23,  63 => 22,  54 => 15,  48 => 12,  45 => 11,  43 => 10,  38 => 8,  30 => 4,  27 => 3,  18 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@gantry-admin/modals/widget.html.twig", "/var/www/html/wp-content/plugins/gantry5/admin/templates/modals/widget.html.twig");
    }
}
