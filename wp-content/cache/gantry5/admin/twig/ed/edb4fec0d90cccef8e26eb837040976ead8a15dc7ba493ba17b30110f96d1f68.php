<?php

/* @gantry-admin/pages/configurations/page/page.html.twig */
class __TwigTemplate_8b9c614fe71bb1e38ba03bd0f98a02ba42ac795ab40f0a163944c233d785fec2 extends Twig_Template
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
        return $this->loadTemplate((((($context["ajax"] ?? null) - ($context["suffix"] ?? null))) ? ("@gantry-admin/partials/ajax.html.twig") : ("@gantry-admin/partials/base.html.twig")), "@gantry-admin/pages/configurations/page/page.html.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_gantry($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $context["stored_data"] = $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->jsonDecodeFilter(_twig_default_filter($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->getCookie("g5-collapsed"), "{}"));
        // line 5
        echo "    <div id=\"page-settings\">
        <form method=\"post\">
            <div data-set-page=\"";
        // line 7
        echo twig_escape_filter($this->env, ($context["page_id"] ?? null), "html", null, true);
        echo "\" data-set-root=\"\">
                <span class=\"float-right\">
                    <button type=\"submit\" class=\"button button-primary button-save\" data-save=\"Page Settings\">
                        <i class=\"fa fa-fw fa-check\" aria-hidden=\"true\"></i> <span>";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_SAVE_PAGESETTINGS"), "html", null, true);
        echo "</span></button>
                </span>
                ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["page"] ?? null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        foreach ($context['_seq'] as $context["group"] => $context["list"]) {
            if (($context["group"] != "hidden")) {
                // line 13
                echo "                    <h2 class=\"page-title\">
                        <span class=\"title\">";
                // line 14
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $context["group"]), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_PAGESETTINGS"), "html", null, true);
                echo "</span>
                    </h2>

                    <div class=\"g-filter-actions\">
                        <div class=\"g-panel-filters\" data-g-global-filter=\"\">
                            <div class=\"search settings-block\">
                                <input type=\"text\" data-g-collapse-filter=\"\" placeholder=\"";
                // line 20
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_FILTER"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $context["group"]), "html", null, true);
                echo "...\" aria-label=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_FILTER"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $context["group"]), "html", null, true);
                echo "...\" role=\"search\" />
                                <i class=\"fa fa-fw fa-search\" aria-hidden=\"true\"></i>
                            </div>
                            <button class=\"button\" type=\"button\" data-g-collapse-all=\"true\"><i class=\"fa fa-fw fa-toggle-up\" aria-hidden=\"true\"></i> ";
                // line 23
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_COLLAPSE_ALL"), "html", null, true);
                echo "</button>
                            <button class=\"button\" type=\"button\" data-g-collapse-all=\"false\"><i class=\"fa fa-fw fa-toggle-down\" aria-hidden=\"true\"></i> ";
                // line 24
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_EXPAND_ALL"), "html", null, true);
                echo "</button>
                        </div>
                    </div>

                    <div class=\"cards-wrapper g-grid\">
                        ";
                // line 29
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["list"]);
                $context['loop'] = array(
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                );
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["id"] => $context["particle"]) {
                    // line 30
                    echo "                            ";
                    if ( !$this->getAttribute($context["particle"], "hidden", array())) {
                        // line 31
                        echo "                                ";
                        $context["particle"] = $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "page", array()), "getBlueprintForm", array(0 => $context["id"]), "method");
                        // line 32
                        echo "                                ";
                        $context["prefix"] = (("page." . $context["id"]) . ".");
                        // line 33
                        echo "                                ";
                        $context["collapsed"] = ($this->getAttribute($this->getAttribute($context["particle"], "form", array()), "collapsed", array()) || $this->getAttribute(($context["stored_data"] ?? null), ($context["prefix"] ?? null)));
                        // line 34
                        echo "                                ";
                        $context["labels"] = array("collapse" => $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_COLLAPSE"), "expand" => $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_EXPAND"));
                        // line 35
                        echo "                                <div class=\"card settings-block";
                        echo ((($context["collapsed"] ?? null)) ? (" g-collapsed") : (""));
                        echo "\">
                                    <input type=\"hidden\" name=\"page[";
                        // line 36
                        echo twig_escape_filter($this->env, $context["id"], "html", null, true);
                        echo "]\"/>
                                    <h4 data-g-collapse=\"";
                        // line 37
                        echo twig_escape_filter($this->env, twig_jsonencode_filter(twig_array_merge(($context["labels"] ?? null), array("collapsed" => ((($context["collapsed"] ?? null)) ? (true) : (false)), "id" => ($context["prefix"] ?? null), "target" => "~ .inner-params"))), "html_attr");
                        echo "\"
                                        data-g-collapse-id=\"";
                        // line 38
                        echo twig_escape_filter($this->env, ($context["prefix"] ?? null), "html", null, true);
                        echo "\"
                                        ";
                        // line 39
                        echo ((($context["overrideable"] ?? null)) ? (" class=\"card-overrideable\"") : (""));
                        echo "
                                    >
                                        <span class=\"g-collapse\" data-title=\"";
                        // line 41
                        echo twig_escape_filter($this->env, ((($context["collapsed"] ?? null)) ? ($this->getAttribute(($context["labels"] ?? null), "expand", array())) : ($this->getAttribute(($context["labels"] ?? null), "collapse", array()))), "html", null, true);
                        echo "\" data-tip=\"";
                        echo twig_escape_filter($this->env, ((($context["collapsed"] ?? null)) ? ($this->getAttribute(($context["labels"] ?? null), "expand", array())) : ($this->getAttribute(($context["labels"] ?? null), "collapse", array()))), "html", null, true);
                        echo "\" data-tip-place=\"top-right\"><i class=\"fa fa-fw fa-caret-up\" aria-hidden=\"true\"></i></span>
                                        <span class=\"g-title\">";
                        // line 42
                        echo twig_escape_filter($this->env, $this->getAttribute($context["particle"], "name", array()), "html", null, true);
                        echo "</span>
                                        ";
                        // line 43
                        if ($this->getAttribute($this->getAttribute($this->getAttribute($context["particle"], "form", array()), "fields", array()), "enabled", array())) {
                            // line 44
                            echo "                                            ";
                            $this->loadTemplate("forms/fields/enable/enable.html.twig", "@gantry-admin/pages/configurations/page/page.html.twig", 44)->display(array_merge($context, array("default" => true, "scope" => ($context["prefix"] ?? null), "name" => "enabled", "field" => $this->getAttribute($this->getAttribute($this->getAttribute($context["particle"], "form", array()), "fields", array()), "enabled", array()), "value" => $this->getAttribute(($context["data"] ?? null), "get", array(0 => (($context["prefix"] ?? null) . "enabled")), "method"))));
                            // line 45
                            echo "
                                            ";
                            // line 46
                            if (($context["overrideable"] ?? null)) {
                                // line 47
                                echo "                                                ";
                                $this->loadTemplate("forms/override.html.twig", "@gantry-admin/pages/configurations/page/page.html.twig", 47)->display(array_merge($context, array("scope" => ($context["prefix"] ?? null), "name" => "enabled", "field" => array("label" => (("Enabled of the " . $this->getAttribute($context["particle"], "name", array())) . " Particle")))));
                                // line 48
                                echo "                                            ";
                            }
                            // line 49
                            echo "                                        ";
                        }
                        // line 50
                        echo "                                    </h4>

                                    <div class=\"inner-params\">
                                        ";
                        // line 53
                        $this->loadTemplate("forms/fields.html.twig", "@gantry-admin/pages/configurations/page/page.html.twig", 53)->display(array_merge($context, array("ignore_not_overrideable" => true, "overrideable" => ($context["overrideable"] ?? null), "blueprints" => $this->getAttribute($context["particle"], "form", array()), "skip" => array(0 => "enabled"), "prefix" => ($context["prefix"] ?? null))));
                        // line 54
                        echo "                                    </div>
                                </div>
                            ";
                    }
                    // line 57
                    echo "                        ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['id'], $context['particle'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 58
                echo "                    </div>
                ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['group'], $context['list'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        echo "
                ";
        // line 61
        $this->loadTemplate("@gantry-admin/pages/configurations/page/atoms.html.twig", "@gantry-admin/pages/configurations/page/page.html.twig", 61)->display($context);
        // line 62
        echo "
                <div class=\"g-footer-actions\">
                    <span class=\"float-right\">
                        <button type=\"submit\" class=\"button button-primary button-save\" data-save=\"Page Settings\">
                            <i class=\"fa fa-fw fa-check\" aria-hidden=\"true\"></i> <span>";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_SAVE_PAGESETTINGS"), "html", null, true);
        echo "</span></button>
                    </span>
                </div>
            </div>
        </form>
    </div>
";
    }

    public function getTemplateName()
    {
        return "@gantry-admin/pages/configurations/page/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  228 => 66,  222 => 62,  220 => 61,  217 => 60,  206 => 58,  192 => 57,  187 => 54,  185 => 53,  180 => 50,  177 => 49,  174 => 48,  171 => 47,  169 => 46,  166 => 45,  163 => 44,  161 => 43,  157 => 42,  151 => 41,  146 => 39,  142 => 38,  138 => 37,  134 => 36,  129 => 35,  126 => 34,  123 => 33,  120 => 32,  117 => 31,  114 => 30,  97 => 29,  89 => 24,  85 => 23,  73 => 20,  62 => 14,  59 => 13,  48 => 12,  43 => 10,  37 => 7,  33 => 5,  30 => 4,  27 => 3,  18 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@gantry-admin/pages/configurations/page/page.html.twig", "/var/www/html/wp-content/plugins/gantry5/admin/templates/pages/configurations/page/page.html.twig");
    }
}
