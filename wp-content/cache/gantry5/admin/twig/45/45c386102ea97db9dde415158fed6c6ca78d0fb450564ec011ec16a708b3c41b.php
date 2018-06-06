<?php

/* @gantry-admin/pages/configurations/layouts/edit.html.twig */
class __TwigTemplate_a9250c80a7fac05d434435a0918ff59bf8bcf9a8d19b99ab81649b518871cebe extends Twig_Template
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
        return $this->loadTemplate((((($context["ajax"] ?? null) - ($context["suffix"] ?? null))) ? ("@gantry-admin/partials/ajax.html.twig") : ("@gantry-admin/partials/base.html.twig")), "@gantry-admin/pages/configurations/layouts/edit.html.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_gantry($context, array $blocks = array())
    {
        // line 4
        if (((($context["configuration"] ?? null) == "default") && $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "platform", array()), "no_base_layout", array()))) {
            // line 5
            echo "
<h2 class=\"page-title\">";
            // line 6
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_LAYOUT"), "html", null, true);
            echo "</h2>
<p>";
            // line 7
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_BASE_LAYOUT_DESC"), "html", null, true);
            echo "</p>

";
        } else {
            // line 10
            echo "
<div class=\"g-grid\" data-lm-container=\"\">
    <div class=\"g-block sidebar-block particles-sidebar-block\">
        <h2 class=\"page-title\">
            <span class=\"title\">";
            // line 14
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_PARTICLES"), "html", null, true);
            echo "</span>
        </h2>
        <div class=\"g5-lm-particles-picker\">
            <div class=\"search settings-block\">
                <input type=\"text\" placeholder=\"";
            // line 18
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_FILTER_ELI"), "html", null, true);
            echo "\" aria-label=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_FILTER_ELI"), "html", null, true);
            echo "\" role=\"search\"/>
                <i class=\"fa fa-fw fa-search\" aria-hidden=\"true\"></i>
            </div>
            <div class=\"particles-container\">
                ";
            // line 22
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["particles"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["list"]) {
                // line 23
                echo "                    ";
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $context["key"]), "html", null, true);
                echo "
                    <ul>
                    ";
                // line 25
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["list"]);
                foreach ($context['_seq'] as $context["type"] => $context["particle"]) {
                    // line 26
                    echo "                        ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["particle"]);
                    foreach ($context['_seq'] as $context["item_key"] => $context["item"]) {
                        // line 27
                        echo "                            ";
                        $context["isDisabled"] =  !$this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("particles." . $context["item_key"]) . ".enabled"), 1 => true), "method");
                        // line 28
                        echo "                            <li class=\"g5-lm-particle-";
                        echo twig_escape_filter($this->env, $context["type"], "html", null, true);
                        echo "\"
                                data-lm-blocktype=\"";
                        // line 29
                        echo twig_escape_filter($this->env, $context["type"], "html", null, true);
                        echo "\"
                                data-lm-subtype=\"";
                        // line 30
                        echo twig_escape_filter($this->env, $context["item_key"], "html", null, true);
                        echo "\"
                                data-lm-icon=\"";
                        // line 31
                        echo twig_escape_filter($this->env, (($this->getAttribute($context["item"], "icon", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["item"], "icon", array()), "fa-cube")) : ("fa-cube")), "html", null, true);
                        echo "\"
                                ";
                        // line 32
                        if (($context["isDisabled"] ?? null)) {
                            // line 33
                            echo "                                data-lm-disabled=\"\"
                                data-lm-nodrag=\"\"
                                title=\"";
                            // line 35
                            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_PARTICLE_DISABLED"), "html", null, true);
                            echo "\"
                                ";
                        }
                        // line 37
                        echo "                            >
                                <span class=\"particle-icon\" ";
                        // line 38
                        echo ((($context["isDisabled"] ?? null)) ? ("data-lm-disabled data-lm-nodrag") : (""));
                        echo ">
                                    <i class=\"fa fa-fw ";
                        // line 39
                        echo twig_escape_filter($this->env, (($this->getAttribute($context["item"], "icon", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["item"], "icon", array()), "fa-cube")) : ("fa-cube")), "html", null, true);
                        echo "\" aria-hidden=\"true\" ";
                        echo ((($context["isDisabled"] ?? null)) ? ("data-lm-disabled data-lm-nodrag") : (""));
                        echo "></i>
                                </span>
                                <span class=\"particle-title\" ";
                        // line 41
                        echo ((($context["isDisabled"] ?? null)) ? ("data-lm-disabled data-lm-nodrag") : (""));
                        echo ">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
                        echo "</span>
                            </li>
                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['item_key'], $context['item'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 44
                    echo "                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['type'], $context['particle'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 45
                echo "                    </ul>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['list'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 47
            echo "            </div>
        </div>
    </div>
    <div class=\"g-block main-block\">
        <span class=\"float-right\">
            ";
            // line 54
            echo "            <button href=\"#\"
                    class=\"button\"
                    role=\"button\"
                    data-lm-switcher=\"";
            // line 57
            echo twig_escape_filter($this->env, $this->getAttribute(($context["gantry"] ?? null), "route", array(0 => ($context["switcher_url"] ?? null)), "method"), "html", null, true);
            echo "\"
                    aria-label=\"";
            // line 58
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_LM_LOAD_PRESET"), "html", null, true);
            echo "\">
                <i class=\"fa fa-fw fa-code-fork\" aria-hidden=\"true\"></i> <span>";
            // line 59
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_LOAD"), "html", null, true);
            echo "</span>
            </button>
            <div class=\"button\" data-g-popover aria-haspopup=\"true\" aria-expanded=\"false\" role=\"presentation\">
                <span><i class=\"fa fa-fw fa-trash-o\" aria-hidden=\"true\"></i> ";
            // line 62
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_CLEAR"), "html", null, true);
            echo " <i class=\"small fa fa-fw fa-chevron-down\" aria-hidden=\"true\"></i></span>
                <ul data-popover-content class=\"hidden\" tabindex=\"0\">
                    <li data-g-popover-follow>
                        <a tabindex=\"0\"
                           href=\"#\"
                           data-lm-clear=\"full\"
                           aria-label=\"";
            // line 68
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_LM_CLEAR_LAYOUT"), "html", null, true);
            echo "\"
                        ><i class=\"fa fa-fw fa-trash\" aria-hidden=\"true\"></i> ";
            // line 69
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_LM_CLEAR_FULL"), "html", null, true);
            echo "
                        </a>
                    </li>
                    <li data-g-popover-follow>
                        <a tabindex=\"0\"
                           href=\"#\"
                           data-lm-clear=\"keep-inheritance\"
                           aria-label=\"";
            // line 76
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_LM_CLEAR_LAYOUT"), "html", null, true);
            echo "\"
                        ><i class=\"fa fa-fw fa-trash-o\" aria-hidden=\"true\"></i> ";
            // line 77
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_LM_CLEAR_KEEP_INHERITANCE"), "html", null, true);
            echo "
                        </a>
                    </li>
                </ul>
            </div>
            <button href=\"#\"
                    class=\"button button-primary button-save\"
                    role=\"button\"
                    data-save=\"Layout\"
                    aria-label=\"";
            // line 86
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_SAVE_LAYOUT"), "html", null, true);
            echo "\"
            >
                <i class=\"fa fa-fw fa-check\" aria-hidden=\"true\"></i> <span>";
            // line 88
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_SAVE_LAYOUT"), "html", null, true);
            echo "</span>
            </button>
        </span>
        <h2 class=\"page-title layout-title\">
            <span class=\"title\">";
            // line 92
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_LAYOUT"), "html", null, true);
            echo " <small>(";
            echo twig_escape_filter($this->env, ((array_key_exists("preset_title", $context)) ? (_twig_default_filter(($context["preset_title"] ?? null), $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_LM_PRESET_UNKNOWN"))) : ($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_LM_PRESET_UNKNOWN"))), "html", null, true);
            echo ")</small></span>
        </h2>

        <div class=\"lm-newblocks clearfix\" data-lm-blocktypes=\"\">
            ";
            // line 97
            echo "            <span class=\"float-right\">
                <button data-lm-back=\"\" href=\"#\" class=\"button disabled\"><i class=\"fa fa-fw fa-arrow-left\" aria-hidden=\"true\"></i> ";
            // line 98
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_UNDO"), "html", null, true);
            echo "</button>
                ";
            // line 100
            echo "                <button data-lm-forward=\"\" href=\"#\" class=\"button disabled\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_REDO"), "html", null, true);
            echo " <i class=\"fa fa-fw fa-arrow-right\" aria-hidden=\"true\"></i></button>
            </span>
        </div>
        <div id=\"page\">
            <div class=\"lm-blocks\"
                 data-lm-page=\"";
            // line 105
            echo twig_escape_filter($this->env, ($context["page_id"] ?? null), "html", null, true);
            echo "\"
                 data-lm-preset=\"";
            // line 106
            echo twig_escape_filter($this->env, twig_jsonencode_filter(($context["preset"] ?? null)), "html_attr");
            echo "\"
                 data-lm-root=\"";
            // line 107
            echo twig_escape_filter($this->env, twig_jsonencode_filter(($context["layout"] ?? null)), "html_attr");
            echo "\"
            >
            </div>
            ";
            // line 110
            if (twig_test_empty(($context["layout"] ?? null))) {
                // line 111
                echo "            <div id=\"lm-no-layout\">
                <div class=\"card full-width\">
                    <h4>";
                // line 113
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_NO_LAYOUT"), "html", null, true);
                echo "</h4>
                    <div class=\"inner-params\">
                        ";
                // line 115
                echo $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_NO_LAYOUT_DESC");
                echo "
                    </div>
                </div>
            </div>
            ";
            }
            // line 120
            echo "
            <div class=\"g-footer-actions\">
            <span class=\"float-right\">
                <a href=\"#\" class=\"button\" data-lm-switcher=\"";
            // line 123
            echo twig_escape_filter($this->env, $this->getAttribute(($context["gantry"] ?? null), "route", array(0 => ($context["switcher_url"] ?? null)), "method"), "html", null, true);
            echo "\">
                    <i class=\"fa fa-fw fa-code-fork\" aria-hidden=\"true\"></i> <span>";
            // line 124
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_LOAD"), "html", null, true);
            echo "</span>
                </a>
                <div data-g-popover class=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\" role=\"presentation\">
                <span><i class=\"fa fa-fw fa-trash-o\" aria-hidden=\"true\"></i> ";
            // line 127
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_CLEAR"), "html", null, true);
            echo " <i class=\"fa fa-fw fa-chevron-down small\" aria-hidden=\"true\"></i></span>
                <ul data-popover-content class=\"hidden\" tabindex=\"0\">
                    <li data-g-popover-follow>
                        <a tabindex=\"0\"
                           href=\"#\"
                           data-lm-clear=\"full\"
                           aria-label=\"";
            // line 133
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_LM_CLEAR_LAYOUT"), "html", null, true);
            echo "\"
                        ><i class=\"fa fa-fw fa-trash\" aria-hidden=\"true\"></i> ";
            // line 134
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_LM_CLEAR_FULL"), "html", null, true);
            echo "
                        </a>
                    </li>
                    <li data-g-popover-follow>
                        <a tabindex=\"0\"
                           href=\"#\"
                           data-lm-clear=\"keep-inheritance\"
                           aria-label=\"";
            // line 141
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_LM_CLEAR_LAYOUT"), "html", null, true);
            echo "\"
                        ><i class=\"fa fa-fw fa-trash-o\" aria-hidden=\"true\"></i> ";
            // line 142
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_LM_CLEAR_KEEP_INHERITANCE"), "html", null, true);
            echo "
                        </a>
                    </li>
                </ul>
            </div>
                <a href=\"#\" class=\"button button-primary button-save\" data-save=\"Layout\">
                    <i class=\"fa fa-fw fa-check\" aria-hidden=\"true\"></i> <span>";
            // line 148
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_SAVE_LAYOUT"), "html", null, true);
            echo "</span>
                </a>
            </span>
            </div>
        </div>
    </div>

    <div id=\"trash\" data-lm-eraseblock=\"\"><div class=\"trash-zone\">&times;</div><span>";
            // line 155
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_DROP_DELETE"), "html", null, true);
            echo "</span></div>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "@gantry-admin/pages/configurations/layouts/edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  351 => 155,  341 => 148,  332 => 142,  328 => 141,  318 => 134,  314 => 133,  305 => 127,  299 => 124,  295 => 123,  290 => 120,  282 => 115,  277 => 113,  273 => 111,  271 => 110,  265 => 107,  261 => 106,  257 => 105,  248 => 100,  244 => 98,  241 => 97,  232 => 92,  225 => 88,  220 => 86,  208 => 77,  204 => 76,  194 => 69,  190 => 68,  181 => 62,  175 => 59,  171 => 58,  167 => 57,  162 => 54,  155 => 47,  148 => 45,  142 => 44,  131 => 41,  124 => 39,  120 => 38,  117 => 37,  112 => 35,  108 => 33,  106 => 32,  102 => 31,  98 => 30,  94 => 29,  89 => 28,  86 => 27,  81 => 26,  77 => 25,  71 => 23,  67 => 22,  58 => 18,  51 => 14,  45 => 10,  39 => 7,  35 => 6,  32 => 5,  30 => 4,  27 => 3,  18 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@gantry-admin/pages/configurations/layouts/edit.html.twig", "/var/www/html/wp-content/plugins/gantry5/admin/templates/pages/configurations/layouts/edit.html.twig");
    }
}
