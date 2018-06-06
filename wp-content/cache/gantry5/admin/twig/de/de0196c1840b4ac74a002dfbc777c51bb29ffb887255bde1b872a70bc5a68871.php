<?php

/* partials/outlines-list.html.twig */
class __TwigTemplate_e4d830969e51d3b8fb7658b1447b45a7d6489bc8142640f2ee98b134e8f2974a extends Twig_Template
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
        echo "<optgroup label=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_GLOBAL_DEFAULTS"), "html", null, true);
        echo "\">
    <option value=\"default\"
            ";
        // line 3
        if ((($context["configuration"] ?? null) == "default")) {
            echo "selected=\"selected\"";
        }
        // line 4
        echo "            data-data=\"";
        echo twig_escape_filter($this->env, twig_jsonencode_filter(array("params" => array("navbar" => true), "url" => $this->getAttribute(($context["gantry"] ?? null), "route", array(0 => "configurations/default", 1 => ((array_key_exists("configuration_page", $context)) ? (_twig_default_filter(($context["configuration_page"] ?? null), "styles")) : ("styles"))), "method"))), "html_attr");
        echo "\">
        ";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_BASE_OUTLINE"), "html", null, true);
        echo "
    </option>
</optgroup>

";
        // line 9
        $context["user_conf"] = $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "outlines", array()), "user", array());
        // line 10
        if ($this->getAttribute(($context["user_conf"] ?? null), "count", array())) {
            // line 11
            echo "    <optgroup label=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_THEME_OUTLINES"), "html", null, true);
            echo "\">
        ";
            // line 12
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["user_conf"] ?? null));
            foreach ($context['_seq'] as $context["name"] => $context["title"]) {
                // line 13
                echo "            ";
                if (($context["name"] == ($context["configuration"] ?? null))) {
                    // line 14
                    echo "                ";
                    $context["selected_title"] = $context["title"];
                    // line 15
                    echo "                ";
                    $context["selected_value"] = $context["name"];
                    // line 16
                    echo "            ";
                }
                // line 17
                echo "            <option value=\"";
                echo twig_escape_filter($this->env, $context["name"], "html", null, true);
                echo "\"
                    ";
                // line 18
                if (($context["name"] == ($context["configuration"] ?? null))) {
                    echo "selected=\"selected\"";
                }
                // line 19
                echo "                    data-data=\"";
                echo twig_escape_filter($this->env, twig_jsonencode_filter(array("params" => array("navbar" => true), "url" => $this->getAttribute(($context["gantry"] ?? null), "route", array(0 => "configurations", 1 => twig_escape_filter($this->env, $context["name"]), 2 => ((array_key_exists("configuration_page", $context)) ? (_twig_default_filter(($context["configuration_page"] ?? null), "styles")) : ("styles"))), "method"))), "html_attr");
                echo "\"
            >
                ";
                // line 21
                echo twig_escape_filter($this->env, $context["title"], "html", null, true);
                echo "
            </option>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['title'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 24
            echo "    </optgroup>
";
        }
        // line 26
        echo "
";
        // line 27
        $context["system_conf"] = $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "outlines", array()), "system", array());
        // line 28
        if ($this->getAttribute(($context["system_conf"] ?? null), "count", array())) {
            // line 29
            echo "    <optgroup label=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_SYSTEM_OUTLINES"), "html", null, true);
            echo "\">
        ";
            // line 30
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["system_conf"] ?? null));
            foreach ($context['_seq'] as $context["name"] => $context["title"]) {
                // line 31
                echo "            ";
                if (($context["name"] == ($context["configuration"] ?? null))) {
                    // line 32
                    echo "                ";
                    $context["selected_title"] = $context["title"];
                    // line 33
                    echo "                ";
                    $context["selected_value"] = $context["name"];
                    // line 34
                    echo "                ";
                    $context["selected_editable"] = false;
                    // line 35
                    echo "            ";
                }
                // line 36
                echo "            <option value=\"";
                echo twig_escape_filter($this->env, $context["name"], "html", null, true);
                echo "\"
                    ";
                // line 37
                if (($context["name"] == ($context["configuration"] ?? null))) {
                    echo "selected=\"selected\"";
                }
                // line 38
                echo "                    data-data=\"";
                echo twig_escape_filter($this->env, twig_jsonencode_filter(array("params" => array("navbar" => true), "url" => $this->getAttribute(($context["gantry"] ?? null), "route", array(0 => "configurations", 1 => twig_escape_filter($this->env, $context["name"]), 2 => ((array_key_exists("configuration_page", $context)) ? (_twig_default_filter(($context["configuration_page"] ?? null), "styles")) : ("styles"))), "method"))), "html_attr");
                echo "\"
            >
                ";
                // line 40
                echo twig_escape_filter($this->env, $context["title"], "html", null, true);
                echo "
            </option>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['title'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 43
            echo "    </optgroup>
";
        }
    }

    public function getTemplateName()
    {
        return "partials/outlines-list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  149 => 43,  140 => 40,  134 => 38,  130 => 37,  125 => 36,  122 => 35,  119 => 34,  116 => 33,  113 => 32,  110 => 31,  106 => 30,  101 => 29,  99 => 28,  97 => 27,  94 => 26,  90 => 24,  81 => 21,  75 => 19,  71 => 18,  66 => 17,  63 => 16,  60 => 15,  57 => 14,  54 => 13,  50 => 12,  45 => 11,  43 => 10,  41 => 9,  34 => 5,  29 => 4,  25 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "partials/outlines-list.html.twig", "/var/www/html/wp-content/plugins/gantry5/admin/templates/partials/outlines-list.html.twig");
    }
}
