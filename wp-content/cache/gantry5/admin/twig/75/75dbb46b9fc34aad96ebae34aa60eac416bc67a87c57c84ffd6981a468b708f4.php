<?php

/* partials/configuration-selector.html.twig */
class __TwigTemplate_ce50cee9827852cce863d4307d2169509f5fdfe6fdc3000bc6dd1e292dcabcf0 extends Twig_Template
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
        echo "<li class=\"config-select-wrap\">
    ";
        // line 2
        $context["selected_title"] = (((($context["configuration"] ?? null) == "default")) ? ($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_BASE_OUTLINE")) : (""));
        // line 3
        echo "    ";
        $context["selected_value"] = (((($context["configuration"] ?? null) == "default")) ? ("default") : (""));
        // line 4
        echo "    ";
        $context["selected_editable"] = true;
        // line 5
        echo "    <select id=\"configuration-selector\" class=\"config-select\" data-selectize-ajaxify data-selectize=\"";
        echo twig_escape_filter($this->env, twig_jsonencode_filter(array("allowEmptyOption" => true)), "html_attr");
        echo "\">
        ";
        // line 6
        $this->loadTemplate("partials/outlines-list.html.twig", "partials/configuration-selector.html.twig", 6)->display($context);
        // line 7
        echo "    </select>

    ";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "outlines", array()), "user", array()));
        foreach ($context['_seq'] as $context["name"] => $context["title"]) {
            // line 10
            echo "        ";
            if (($context["name"] == ($context["configuration"] ?? null))) {
                // line 11
                echo "            ";
                $context["selected_title"] = $context["title"];
                // line 12
                echo "            ";
                $context["selected_value"] = $context["name"];
                // line 13
                echo "        ";
            }
            // line 14
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['name'], $context['title'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "outlines", array()), "system", array()));
        foreach ($context['_seq'] as $context["name"] => $context["title"]) {
            // line 16
            echo "        ";
            if (($context["name"] == ($context["configuration"] ?? null))) {
                // line 17
                echo "            ";
                $context["selected_title"] = $context["title"];
                // line 18
                echo "            ";
                $context["selected_value"] = $context["name"];
                // line 19
                echo "            ";
                $context["selected_editable"] = false;
                // line 20
                echo "        ";
            }
            // line 21
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['name'], $context['title'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "
    ";
        // line 23
        if (((($context["selected_editable"] ?? null) && $this->getAttribute(($context["gantry"] ?? null), "authorize", array(0 => "outline.rename"), "method")) && (($context["configuration"] ?? null) != "default"))) {
            // line 24
            echo "    <span data-title-editable=\"";
            echo twig_escape_filter($this->env, ($context["selected_title"] ?? null), "html", null, true);
            echo "\"
          data-g-config-href=\"";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute(($context["gantry"] ?? null), "route", array(0 => "configurations", 1 => ($context["selected_value"] ?? null), 2 => "rename"), "method"), "html", null, true);
            echo "\"
          class=\"title g-conf-title-edit\"
    >
        ";
            // line 28
            echo twig_escape_filter($this->env, ($context["selected_title"] ?? null), "html", null, true);
            echo "
    </span>
    <i class=\"fa fa-pencil font-small\"
       aria-hidden=\"true\"
       tabindex=\"0\"
       aria-label=\"";
            // line 33
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_EDIT_TITLE", ($context["selected_title"] ?? null)), "html", null, true);
            echo "\"
       data-title-editable=\"";
            // line 34
            echo twig_escape_filter($this->env, ($context["selected_title"] ?? null), "html", null, true);
            echo "\"
       data-title-edit=\"\"></i>
    ";
        }
        // line 37
        echo "</li>
";
    }

    public function getTemplateName()
    {
        return "partials/configuration-selector.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 37,  117 => 34,  113 => 33,  105 => 28,  99 => 25,  94 => 24,  92 => 23,  89 => 22,  83 => 21,  80 => 20,  77 => 19,  74 => 18,  71 => 17,  68 => 16,  63 => 15,  57 => 14,  54 => 13,  51 => 12,  48 => 11,  45 => 10,  41 => 9,  37 => 7,  35 => 6,  30 => 5,  27 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "partials/configuration-selector.html.twig", "/var/www/html/wp-content/plugins/gantry5/admin/templates/partials/configuration-selector.html.twig");
    }
}
