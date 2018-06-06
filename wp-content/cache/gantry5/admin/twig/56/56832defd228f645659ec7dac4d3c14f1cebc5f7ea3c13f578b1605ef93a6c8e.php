<?php

/* @gantry-admin/pages/configurations/layouts/particle-card.html.twig */
class __TwigTemplate_9ca9fa91cd82b15d5eb7be9dcab22d2b9c9bd2001813e54b6588a92175a4fa59 extends Twig_Template
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
        echo "<div class=\"card settings-block\">
    <h4>
        ";
        // line 3
        if (($context["editable"] ?? null)) {
            // line 4
            echo "            <span data-title-editable=\"";
            echo twig_escape_filter($this->env, twig_trim_filter($this->getAttribute(($context["item"] ?? null), "title", array())), "html", null, true);
            echo "\" class=\"title\">";
            echo twig_escape_filter($this->env, twig_trim_filter($this->getAttribute(($context["item"] ?? null), "title", array())), "html", null, true);
            echo "</span>
            <i class=\"fa fa-pencil font-small\" aria-hidden=\"true\" tabindex=\"0\" aria-label=\"";
            // line 5
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_EDIT_TITLE", twig_trim_filter($this->getAttribute(($context["item"] ?? null), "title", array()))), "html", null, true);
            echo "\" data-title-edit=\"\"></i>
        ";
        } else {
            // line 7
            echo "            ";
            echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
            echo "
        ";
        }
        // line 9
        echo "
        ";
        // line 10
        if (($context["item"] ?? null)) {
            // line 11
            echo "            ";
            $context["item_type"] = (($this->getAttribute(($context["item"] ?? null), "subtype", array())) ? ($this->getAttribute(($context["item"] ?? null), "subtype", array())) : ($this->getAttribute(($context["item"] ?? null), "type", array())));
            // line 12
            echo "            ";
            $context["item_disabled"] =  !$this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("particles." . ($context["item_type"] ?? null)) . ".enabled"), 1 => true), "method");
            // line 13
            echo "            <span class=\"badge font-small\">";
            echo twig_escape_filter($this->env, ($context["item_type"] ?? null), "html", null, true);
            echo "</span>
            ";
            // line 14
            if ($this->getAttribute($this->getAttribute(($context["blueprints"] ?? null), "fields", array()), "enabled", array())) {
                // line 15
                echo "                ";
                $this->loadTemplate("forms/fields/enable/enable.html.twig", "@gantry-admin/pages/configurations/layouts/particle-card.html.twig", 15)->display(array_merge($context, array("name" => (("particles." . ($context["item_type"] ?? null)) . ".enabled"), "field" => $this->getAttribute($this->getAttribute(($context["blueprints"] ?? null), "fields", array()), "enabled", array()), "value" => $this->getAttribute($this->getAttribute(($context["item"] ?? null), "attributes", array()), "enabled", array()), "default" => 1, "turned_off" => ($context["item_disabled"] ?? null))));
                // line 16
                echo "            ";
            }
            // line 17
            echo "        ";
        }
        // line 18
        echo "    </h4>

    <div class=\"inner-params\">
        ";
        // line 21
        $this->loadTemplate("forms/fields.html.twig", "@gantry-admin/pages/configurations/layouts/particle-card.html.twig", 21)->display($context);
        // line 22
        echo "    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@gantry-admin/pages/configurations/layouts/particle-card.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 22,  75 => 21,  70 => 18,  67 => 17,  64 => 16,  61 => 15,  59 => 14,  54 => 13,  51 => 12,  48 => 11,  46 => 10,  43 => 9,  37 => 7,  32 => 5,  25 => 4,  23 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@gantry-admin/pages/configurations/layouts/particle-card.html.twig", "/var/www/html/wp-content/plugins/gantry5/admin/templates/pages/configurations/layouts/particle-card.html.twig");
    }
}
