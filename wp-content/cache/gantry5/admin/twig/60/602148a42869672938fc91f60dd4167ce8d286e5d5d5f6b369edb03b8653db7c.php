<?php

/* @gantry-admin/partials/header.html.twig */
class __TwigTemplate_2df734cd0432425ab422d877cfffd8f58bb6535a74ed85b84965561c9934ce9f extends Twig_Template
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
        echo "<div class=\"g-grid\">
    <div class=\"g-block\">
        <div class=\"g-content clearfix\">
            <span class=\"theme-title\">
                <i class=\"fa fa-tint\" aria-hidden=\"true\"></i>
                ";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_THEME"), "html", null, true);
        echo ": ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "theme", array()), "title", array()), "html", null, true);
        echo "
                <small>(v";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "theme", array()), "version", array()), "html", null, true);
        echo " / ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "theme", array()), "name", array()), "html", null, true);
        echo ")</small>
            </span>

            ";
        // line 10
        $context["settings_url"] = $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "platform", array()), "settings", array());
        // line 11
        echo "            ";
        $context["settings_key"] = $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "platform", array()), "settings_key", array());
        // line 12
        echo "            <ul class=\"float-right\">
                <li ";
        // line 13
        echo (((($context["location"] ?? null) == "configurations")) ? ("class=\"active\"") : (""));
        echo ">
                    <a data-g5-ajaxify=\"\"
                       data-g5-ajaxify-target=\"[data-g5-content]\"
                       href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute(($context["gantry"] ?? null), "route", array(0 => "configurations"), "method"), "html", null, true);
        echo "\"
                    >
                        <i class=\"fa fa-fw fa-th\" aria-hidden=\"true\"></i> ";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_OUTLINES"), "html", null, true);
        echo "
                    </a>
                </li>
                ";
        // line 22
        echo "                ";
        // line 27
        echo "                ";
        if ($this->getAttribute(($context["gantry"] ?? null), "authorize", array(0 => "menu.manage"), "method")) {
            // line 28
            echo "                <li ";
            echo (((($context["location"] ?? null) == "menu")) ? ("class=\"active\"") : (""));
            echo ">
                    <a data-g5-ajaxify=\"\" data-g5-ajaxify-target=\"[data-g5-content]\" href=\"";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute(($context["gantry"] ?? null), "route", array(0 => "menu"), "method"), "html", null, true);
            echo "\">
                        <i class=\"fa fa-fw fa-bars\" aria-hidden=\"true\"></i> <span>";
            // line 30
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_MENU"), "html", null, true);
            echo "</span>
                    </a>
                </li>
                ";
        }
        // line 34
        echo "                <li ";
        echo (((($context["location"] ?? null) == "about")) ? ("class=\"active\"") : (""));
        echo ">
                    <a data-g5-ajaxify=\"\" data-g5-ajaxify-target=\"[data-g5-content]\" href=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute(($context["gantry"] ?? null), "route", array(0 => "about"), "method"), "html", null, true);
        echo "\">
                        <i class=\"fa fa-fw fa-question-circle\" aria-hidden=\"true\"></i> <span>";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_ABOUT"), "html", null, true);
        echo "</span>
                    </a>
                </li>
                <li data-g-extras data-g-popover data-g-popover-style=\"extras\" aria-haspopup=\"true\" aria-expanded=\"false\" role=\"presentation\">
                    <a href=\"#\"><i class=\"fa fa-fw fa-cog\" aria-hidden=\"true\"></i> ";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_EXTRAS"), "html", null, true);
        echo " <i class=\"small fa fa-fw fa-chevron-down\" aria-hidden=\"true\"></i></a>
                    <ul data-popover-content class=\"hidden\" tabindex=\"0\">
                        ";
        // line 42
        $context["prod_mode"] = $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_PRODUCTION");
        // line 43
        echo "                        ";
        $context["dev_mode"] = $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_DEVELOPMENT");
        // line 44
        echo "                        <li data-g-devprod=\"";
        echo twig_escape_filter($this->env, twig_jsonencode_filter(array(0 => ($context["dev_mode"] ?? null), 1 => ($context["prod_mode"] ?? null))), "html_attr");
        echo "\">
                            <i class=\"fa fa-fw fa-wrench\" aria-hidden=\"true\"></i> <span class=\"devprod-mode\">";
        // line 45
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "global", array()), "production", array())) ? (($context["prod_mode"] ?? null)) : (($context["dev_mode"] ?? null))), "html", null, true);
        echo "</span>
                            <div class=\"float-right\">
                                <span class=\"enabler\" role=\"checkbox\" aria-checked=\"";
        // line 47
        echo (($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "global", array()), "production", array())) ? ("true") : ("false"));
        echo "\" tabindex=\"0\" aria-label=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_PRODUCTION_MODE_ARIA_LABEL"), "html", null, true);
        echo "\">
                                <input type=\"hidden\" name=\"production_mode\" value=\"";
        // line 48
        echo (($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "global", array()), "production", array())) ? (1) : (0));
        echo "\">
                                    <span class=\"toggle\"><span class=\"knob\"></span></span>
                                </span>
                            </div>
                        </li>
                        <li data-g-popover-follow>
                            <a tabindex=\"0\"
                               href=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->getAttribute(($context["gantry"] ?? null), "route", array(0 => "cache"), "method"), "html", null, true);
        echo "\"
                               data-ajax-action=\"\"
                               data-ajax-action-method=\"get\"
                               data-ajax-action-indicator=\"li[data-g-extras]\"
                            ><i class=\"fa fa-fw fa-recycle\" aria-hidden=\"true\"></i> ";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_CLEAR_CACHE"), "html", null, true);
        echo "
                            </a>
                        </li>
                        ";
        // line 62
        if (($context["settings_url"] ?? null)) {
            // line 63
            echo "                            <li>
                                <a tabindex=\"0\"
                                   href=\"";
            // line 65
            echo twig_escape_filter($this->env, ($context["settings_url"] ?? null), "html", null, true);
            echo "\"
                                   data-settings-key=\"";
            // line 66
            echo twig_escape_filter($this->env, ($context["settings_key"] ?? null), "html", null, true);
            echo "\"
                                >
                                    <i class=\"fa fa-fw fa-";
            // line 68
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "platform", array()), "name", array()), "html", null, true);
            echo "\" aria-hidden=\"true\"></i> ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_PLATFORM_SETTINGS"), "html", null, true);
            echo "
                                </a>
                            </li>
                        ";
        }
        // line 72
        echo "                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@gantry-admin/partials/header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  175 => 72,  166 => 68,  161 => 66,  157 => 65,  153 => 63,  151 => 62,  145 => 59,  138 => 55,  128 => 48,  122 => 47,  117 => 45,  112 => 44,  109 => 43,  107 => 42,  102 => 40,  95 => 36,  91 => 35,  86 => 34,  79 => 30,  75 => 29,  70 => 28,  67 => 27,  65 => 22,  59 => 18,  54 => 16,  48 => 13,  45 => 12,  42 => 11,  40 => 10,  32 => 7,  26 => 6,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@gantry-admin/partials/header.html.twig", "/var/www/html/wp-content/plugins/gantry5/admin/templates/partials/header.html.twig");
    }
}
