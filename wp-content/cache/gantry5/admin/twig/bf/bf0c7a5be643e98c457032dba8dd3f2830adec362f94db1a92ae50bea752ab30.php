<?php

/* forms/fields/collection/list.html.twig */
class __TwigTemplate_a71ab72497fb83c115bf1eab53c853a7b40ea8b20dfc5be996597d5b94ac0315 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'field' => array($this, 'block_field'),
            'contents' => array($this, 'block_contents'),
            'label' => array($this, 'block_label'),
            'input' => array($this, 'block_input'),
            'collection_fields' => array($this, 'block_collection_fields'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return $this->loadTemplate((("forms/" . ((array_key_exists("layout", $context)) ? (_twig_default_filter(($context["layout"] ?? null), "field")) : ("field"))) . ".html.twig"), "forms/fields/collection/list.html.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 4
        $context["value"] = (((( !$this->getAttribute(($context["field"] ?? null), "key", array()) && twig_test_iterable(($context["value"] ?? null))) && twig_length_filter($this->env, ($context["value"] ?? null)))) ? ($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->valuesFilter(($context["value"] ?? null))) : (($context["value"] ?? null)));
        // line 1
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 6
    public function block_field($context, array $blocks = array())
    {
        // line 7
        echo "    ";
        if ($this->getAttribute(($context["field"] ?? null), "is_current", array())) {
            // line 8
            echo "        ";
            // line 9
            echo "        ";
            $context["name"] = "";
            // line 10
            echo "        <div class=\"g-filter-actions\">
            <div class=\"g-panel-filters\" data-g-global-filter=\"\">
                <div class=\"search settings-block\">
                    ";
            // line 13
            $context["filter"] = array("element" => ".settings-param", "title" => ".settings-param-title, h4 .g-title", "fallback" => true);
            // line 14
            echo "                    <input type=\"text\" data-g-collapse-filter=\"";
            echo twig_escape_filter($this->env, twig_jsonencode_filter(($context["filter"] ?? null)), "html_attr");
            echo "\" placeholder=\"";
            echo twig_escape_filter($this->env, (($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_FILTER") . " ") . twig_capitalize_string_filter($this->env, ($context["group"] ?? null))), "html", null, true);
            echo "...\" aria-label=\"";
            echo twig_escape_filter($this->env, (($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_FILTER") . " ") . twig_capitalize_string_filter($this->env, ($context["group"] ?? null))), "html", null, true);
            echo "...\" role=\"search\">
                    <i class=\"fa fa-fw fa-search\" aria-hidden=\"true\"></i>
                </div>
                <button class=\"button\" type=\"button\" data-g-collapse-all=\"true\"><i class=\"fa fa-fw fa-toggle-up\" aria-hidden=\"true\"></i> ";
            // line 17
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_COLLAPSE_ALL"), "html", null, true);
            echo "</button>
                <button class=\"button\" type=\"button\" data-g-collapse-all=\"false\"><i class=\"fa fa-fw fa-toggle-down\" aria-hidden=\"true\"></i> ";
            // line 18
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_EXPAND_ALL"), "html", null, true);
            echo "</button>
            </div>
        </div>
        <div class=\"cards-wrapper g-grid\">
            ";
            // line 22
            $context["labels"] = array("collapse" => $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_COLLAPSE"), "expand" => $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_EXPAND"));
            // line 23
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["value"] ?? null));
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
            foreach ($context['_seq'] as $context["key"] => $context["val"]) {
                // line 24
                echo "                ";
                $context["title"] = ((($this->getAttribute(($context["field"] ?? null), "value", array()) == $this->getAttribute(($context["field"] ?? null), "key", array()))) ? ($context["key"]) : ($this->getAttribute($context["val"], $this->getAttribute(($context["field"] ?? null), "value", array()), array(), "array")));
                // line 25
                echo "                ";
                $context["id"] = ((((($context["route"] ?? null) . ".") . $context["key"]) . ".") . $this->getAttribute(($context["field"] ?? null), "value", array()));
                // line 26
                echo "                <div class=\"card settings-block\">
                    <h4
                        data-g-collapse=\"";
                // line 28
                echo twig_escape_filter($this->env, twig_jsonencode_filter(twig_array_merge(($context["labels"] ?? null), array("collapsed" => false, "id" => ($context["id"] ?? null), "store" => false, "target" => "~ .inner-params"))), "html_attr");
                echo "\"
                    >
                        <span class=\"g-collapse\" data-title=\"";
                // line 30
                echo twig_escape_filter($this->env, $this->getAttribute(($context["labels"] ?? null), "collapse", array()), "html", null, true);
                echo "\" data-tip=\"";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["labels"] ?? null), "collapse", array()), "html", null, true);
                echo "\" data-tip-place=\"top-right\"><i class=\"fa fa-fw fa-caret-up\" aria-hidden=\"true\"></i></span>
                        <span data-title-editable=\"";
                // line 31
                echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
                echo "\" data-collection-key=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->fieldNameFilter(((((($context["scope"] ?? null) . ".") . $context["key"]) . ".") . $this->getAttribute(($context["field"] ?? null), "value", array()))), "html", null, true);
                echo "\" class=\"g-title\">";
                echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
                echo "</span>
                        <i class=\"fa fa-pencil font-small\" aria-hidden=\"true\"  tabindex=\"0\" aria-label=\"";
                // line 32
                echo twig_escape_filter($this->env, twig_replace_filter($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_EDIT_TITLE"), array("%s" => ($context["title"] ?? null))), "html", null, true);
                echo "\" data-title-edit=\"\"></i>
                    </h4>
                    <div class=\"inner-params\">
                        ";
                // line 35
                $this->displayBlock("collection_fields", $context, $blocks);
                echo "
                    </div>
                </div>
            ";
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
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['val'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 39
            echo "        </div>
    ";
        } else {
            // line 41
            echo "
        ";
            // line 42
            $context["can_reorder"] = ((($this->getAttribute(($context["field"] ?? null), "reorder", array(), "any", true, true) &&  !(null === $this->getAttribute(($context["field"] ?? null), "reorder", array())))) ? ($this->getAttribute(($context["field"] ?? null), "reorder", array())) : (true));
            // line 43
            echo "        ";
            $context["can_remove"] = ((($this->getAttribute(($context["field"] ?? null), "deletion", array(), "any", true, true) &&  !(null === $this->getAttribute(($context["field"] ?? null), "deletion", array())))) ? ($this->getAttribute(($context["field"] ?? null), "deletion", array())) : (true));
            // line 44
            echo "        ";
            $context["can_addnew"] = ((($this->getAttribute(($context["field"] ?? null), "add_new", array(), "any", true, true) &&  !(null === $this->getAttribute(($context["field"] ?? null), "add_new", array())))) ? ($this->getAttribute(($context["field"] ?? null), "add_new", array())) : (true));
            // line 45
            echo "        <div class=\"settings-param ";
            echo twig_escape_filter($this->env, twig_replace_filter($this->getAttribute(($context["field"] ?? null), "type", array()), ".", "-"), "html", null, true);
            echo "\">
            ";
            // line 46
            if (((($context["overrideable"] ?? null) && (( !$this->getAttribute(($context["field"] ?? null), "overridable", array(), "any", true, true) || ($this->getAttribute(($context["field"] ?? null), "overridable", array()) == true)) || ($context["has_value"] ?? null))) && ($this->getAttribute(($context["field"] ?? null), "type", array()) != "container.set"))) {
                // line 47
                echo "                ";
                $this->loadTemplate("forms/override.html.twig", "forms/fields/collection/list.html.twig", 47)->display(array_merge($context, array("scope" => ($context["scope"] ?? null), "name" => ($context["name"] ?? null), "field" => ($context["field"] ?? null))));
                // line 48
                echo "            ";
            }
            // line 49
            echo "            ";
            $this->displayBlock('contents', $context, $blocks);
            // line 127
            echo "        </div>
    ";
        }
    }

    // line 49
    public function block_contents($context, array $blocks = array())
    {
        // line 50
        echo "                ";
        $context["field_route"] = twig_replace_filter((((($context["route"] ?? null) . ".") . ((($context["prefix"] ?? null)) ? ((($context["prefix"] ?? null) . ".")) : (""))) . ($context["name"] ?? null)), ".", "/");
        // line 51
        echo "                <span class=\"settings-param-title float-left\">
                    ";
        // line 52
        $this->displayBlock('label', $context, $blocks);
        // line 61
        echo "                </span>
                <div class=\"settings-param-field\" data-field-name=\"";
        // line 62
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "\">
                    ";
        // line 63
        $this->displayBlock('input', $context, $blocks);
        // line 125
        echo "                </div>
            ";
    }

    // line 52
    public function block_label($context, array $blocks = array())
    {
        // line 53
        echo "                        ";
        if ($this->getAttribute(($context["field"] ?? null), "description", array())) {
            // line 54
            echo "                            ";
            $context["description"] = $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transKeyFilter($this->getAttribute(($context["field"] ?? null), "description", array()), "GANTRY5_FORM_FIELD", ($context["scope"] ?? null), ($context["name"] ?? null), "DESC");
            // line 55
            echo "                            <span aria-label=\"";
            echo twig_escape_filter($this->env, ($context["description"] ?? null), "html", null, true);
            echo "\" data-tip=\"";
            echo ($context["description"] ?? null);
            echo "\" data-tip-place=\"top-right\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transKeyFilter($this->getAttribute(($context["field"] ?? null), "label", array()), "GANTRY5_FORM_FIELD", ($context["scope"] ?? null), ($context["name"] ?? null), "LABEL"), "html", null, true);
            echo "</span>
                        ";
        } else {
            // line 57
            echo "                            ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transKeyFilter($this->getAttribute(($context["field"] ?? null), "label", array()), "GANTRY5_FORM_FIELD", ($context["scope"] ?? null), ($context["name"] ?? null), "LABEL"), "html", null, true);
            echo "
                        ";
        }
        // line 59
        echo "                        ";
        echo ((twig_in_filter($this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", array()), "required", array()), array(0 => "on", 1 => "true", 2 => 1))) ? ("<span class=\"required\">*</span>") : (""));
        echo "
                    ";
    }

    // line 63
    public function block_input($context, array $blocks = array())
    {
        // line 64
        echo "<div class=\"g5-collection-wrapper\">
                        <ul>";
        // line 66
        if ($this->getAttribute(($context["field"] ?? null), "fields", array())) {
            // line 67
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["value"] ?? null));
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
            foreach ($context['_seq'] as $context["key"] => $context["val"]) {
                // line 68
                echo "                                    ";
                if (($this->getAttribute(($context["field"] ?? null), "ajax", array()) == true)) {
                    // line 69
                    echo "                                        <li data-collection-item=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "value", array()), "html", null, true);
                    echo "\">
                                            ";
                    // line 70
                    $context["itemValue"] = ((($this->getAttribute(($context["field"] ?? null), "value", array()) == $this->getAttribute(($context["field"] ?? null), "key", array()))) ? ($context["key"]) : ($this->getAttribute($context["val"], $this->getAttribute(($context["field"] ?? null), "value", array()), array(), "array")));
                    // line 71
                    echo "                                            ";
                    if (($context["can_reorder"] ?? null)) {
                        echo "<i class=\"fa fa-reorder font-small item-reorder\" aria-hidden=\"true\"></i>";
                    }
                    // line 72
                    echo "                                            <a class=\"config-cog\" href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["gantry"] ?? null), "route", array(0 => ((($context["field_route"] ?? null) . "/") . $context["key"])), "method"), "html", null, true);
                    echo "\"><span data-title-editable=\"";
                    echo twig_escape_filter($this->env, ($context["itemValue"] ?? null), "html", null, true);
                    echo "\" class=\"g-title\">";
                    echo twig_escape_filter($this->env, ($context["itemValue"] ?? null), "html", null, true);
                    echo "</span></a>
                                            ";
                    // line 73
                    if (($context["can_remove"] ?? null)) {
                        echo "<i class=\"fa fa-fw fa-trash font-small\" aria-hidden=\"true\" data-collection-remove=\"\"></i>";
                    }
                    // line 74
                    echo "                                            ";
                    if (($context["can_addnew"] ?? null)) {
                        echo "<i class=\"fa fa-files-o font-small\" aria-hidden=\"true\" data-collection-duplicate=\"\"></i>";
                    }
                    // line 75
                    echo "                                            <i class=\"fa fa-fw fa-pencil font-small\" aria-hidden=\"true\" tabindex=\"0\" aria-label=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_EDIT_TITLE", ($context["itemValue"] ?? null)), "html", null, true);
                    echo "\" data-title-edit=\"\"></i>
                                        </li>
                                    ";
                } else {
                    // line 78
                    echo "                                        ";
                    $this->displayBlock('collection_fields', $context, $blocks);
                    // line 105
                    echo "                                    ";
                }
                // line 106
                echo "                                ";
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
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['val'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 108
        echo "</ul>
                    </div>
                    <div>
                        <ul style=\"display: none\">
                            <li data-collection-nosort=\"\" data-collection-template=\"";
        // line 112
        echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "value", array()), "html", null, true);
        echo "\" style=\"display: none;\">
                                ";
        // line 113
        if (($context["can_reorder"] ?? null)) {
            echo "<i class=\"fa fa-reorder font-small item-reorder\" aria-hidden=\"true\"></i>";
        }
        // line 114
        echo "                                <a class=\"config-cog\" href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["gantry"] ?? null), "route", array(0 => (($context["field_route"] ?? null) . "/%id%")), "method"), "html", null, true);
        echo "\"><span data-title-editable=\"New item\" class=\"title\">New item</span></a>
                                ";
        // line 115
        if (($context["can_remove"] ?? null)) {
            echo "<i class=\"fa fa-fw fa-trash font-small\" aria-hidden=\"true\" data-collection-remove=\"\"></i>";
        }
        // line 116
        echo "                                ";
        if (($context["can_addnew"] ?? null)) {
            echo "<i class=\"fa fa-files-o font-small\" aria-hidden=\"true\" data-collection-duplicate=\"\"></i>";
        }
        // line 117
        echo "                                <i class=\"fa fa-fw fa-pencil font-small\" aria-hidden=\"true\" data-title-edit=\"\"></i>
                            </li>
                        </ul>
                        ";
        // line 120
        if (($context["can_addnew"] ?? null)) {
            echo "<span class=\"collection-addnew button button-simple\" data-collection-addnew=\"\" title=\"Add new item\"><i class=\"fa fa-plus font-small\" aria-hidden=\"true\"></i></span>";
        }
        // line 121
        echo "                        <a href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["gantry"] ?? null), "route", array(0 => ($context["field_route"] ?? null)), "method"), "html", null, true);
        echo "\" class=\"collection-editall button button-simple\" data-collection-editall=\"\" title=\"Edit all items\" ";
        if ((twig_length_filter($this->env, ($context["value"] ?? null)) <= 1)) {
            echo "style=\"display: none;\"";
        }
        echo "><i class=\"fa fa-th-large font-small\" aria-hidden=\"true\"></i></a>
                    </div>
                    <input data-collection-data=\"\" name=\"";
        // line 123
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->fieldNameFilter(((($context["scope"] ?? null) . ($context["name"] ?? null)) . "._json")), "html", null, true);
        echo "\" type=\"hidden\" value=\"";
        echo twig_escape_filter($this->env, twig_jsonencode_filter(((array_key_exists("value", $context)) ? (_twig_default_filter(($context["value"] ?? null), array())) : (array())), twig_constant("JSON_UNESCAPED_SLASHES")), "html_attr");
        echo "\"/>
                    ";
    }

    // line 78
    public function block_collection_fields($context, array $blocks = array())
    {
        // line 79
        echo "                                            <div data-g5-collections=\"\">
                                                ";
        // line 80
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["field"] ?? null), "fields", array()));
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
        foreach ($context['_seq'] as $context["childName"] => $context["child"]) {
            // line 81
            echo "                                                    ";
            $context["container"] = (is_string($__internal_6b1f1f8ba9cf3f379d9ac9b2487c6e53a5322307ebeac05f01106961b20f25b5 = $this->getAttribute($context["child"], "type", array())) && is_string($__internal_429b669f98173041ede89d120c5c60fcbabbc263c93c14e21b92ba51e58b292a = "container.") && ('' === $__internal_429b669f98173041ede89d120c5c60fcbabbc263c93c14e21b92ba51e58b292a || 0 === strpos($__internal_6b1f1f8ba9cf3f379d9ac9b2487c6e53a5322307ebeac05f01106961b20f25b5, $__internal_429b669f98173041ede89d120c5c60fcbabbc263c93c14e21b92ba51e58b292a)));
            // line 82
            echo "                                                    ";
            if ((is_string($__internal_ed40595b8a39691fb6ab6f7bf6304bd870a863c2fad9a64aac8c508d9adf4140 = $context["childName"]) && is_string($__internal_9ad250fc75fac5177178e2bb693f90e2b50c2cb33f77f4f3f5c391d2804ea151 = ".") && ('' === $__internal_9ad250fc75fac5177178e2bb693f90e2b50c2cb33f77f4f3f5c391d2804ea151 || 0 === strpos($__internal_ed40595b8a39691fb6ab6f7bf6304bd870a863c2fad9a64aac8c508d9adf4140, $__internal_9ad250fc75fac5177178e2bb693f90e2b50c2cb33f77f4f3f5c391d2804ea151)))) {
                // line 83
                echo "                                                        ";
                $context["childKey"] = twig_trim_filter($context["childName"], ".");
                // line 84
                echo "                                                        ";
                $context["childValue"] = ((($context["container"] ?? null)) ? (($context["val"] ?? null)) : ($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->nestedFunc(($context["val"] ?? null), ($context["childKey"] ?? null))));
                // line 85
                echo "                                                        ";
                $context["childName"] = (((($context["name"] ?? null) . ".") . ($context["key"] ?? null)) . $context["childName"]);
                // line 86
                echo "                                                    ";
            } else {
                // line 87
                echo "                                                        ";
                $context["childKey"] = $context["childName"];
                // line 88
                echo "                                                        ";
                $context["childValue"] = ((($context["container"] ?? null)) ? (($context["val"] ?? null)) : ($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->nestedFunc(($context["data"] ?? null), (($context["scope"] ?? null) . ($context["childKey"] ?? null)))));
                // line 89
                echo "                                                        ";
                $context["childName"] = twig_replace_filter($context["childName"], array("*" => ($context["key"] ?? null)));
                // line 90
                echo "                                                        ";
                $context["childParent"] = ((($context["childName"] == ($context["childKey"] ?? null))) ? ((("." . ($context["key"] ?? null)) . ".")) : (""));
                // line 91
                echo "                                                    ";
            }
            // line 92
            echo "
                                                    ";
            // line 93
            if (((!twig_in_filter($context["childName"], ($context["skip"] ?? null)) &&  !$this->getAttribute($context["child"], "skip", array())) && ($this->getAttribute(($context["field"] ?? null), "value", array()) != ($context["childKey"] ?? null)))) {
                // line 94
                echo "                                                         ";
                if (($this->getAttribute($context["child"], "type", array()) == "key")) {
                    // line 95
                    echo "                                                             ";
                    $this->loadTemplate("forms/fields/key/key.html.twig", "forms/fields/collection/list.html.twig", 95)->display(array_merge($context, array("name" =>                     // line 96
$context["childName"], "field" => $context["child"], "value" => ($context["key"] ?? null), "current_value" => null, "default_value" => null, "parent" => ($context["childParent"] ?? null))));
                    // line 97
                    echo "                                                         ";
                } elseif ($this->getAttribute($context["child"], "type", array())) {
                    // line 98
                    echo "                                                             ";
                    $this->loadTemplate(array(0 => (("forms/fields/" . twig_replace_filter($this->getAttribute($context["child"], "type", array()), ".", "/")) . ".html.twig"), 1 => "forms/fields/unknown/unknown.html.twig"), "forms/fields/collection/list.html.twig", 98)->display(array_merge($context, array("name" =>                     // line 99
$context["childName"], "field" => $context["child"], "value" => null, "current_value" => ($context["childValue"] ?? null), "default_value" => null, "parent_field" => ($context["childParent"] ?? null))));
                    // line 100
                    echo "                                                        ";
                }
                // line 101
                echo "                                                    ";
            }
            // line 102
            echo "                                                ";
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
        unset($context['_seq'], $context['_iterated'], $context['childName'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 103
        echo "                                            </div>
                                        ";
    }

    public function getTemplateName()
    {
        return "forms/fields/collection/list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  477 => 103,  463 => 102,  460 => 101,  457 => 100,  455 => 99,  453 => 98,  450 => 97,  448 => 96,  446 => 95,  443 => 94,  441 => 93,  438 => 92,  435 => 91,  432 => 90,  429 => 89,  426 => 88,  423 => 87,  420 => 86,  417 => 85,  414 => 84,  411 => 83,  408 => 82,  405 => 81,  388 => 80,  385 => 79,  382 => 78,  374 => 123,  364 => 121,  360 => 120,  355 => 117,  350 => 116,  346 => 115,  341 => 114,  337 => 113,  333 => 112,  327 => 108,  312 => 106,  309 => 105,  306 => 78,  299 => 75,  294 => 74,  290 => 73,  281 => 72,  276 => 71,  274 => 70,  269 => 69,  266 => 68,  249 => 67,  247 => 66,  244 => 64,  241 => 63,  234 => 59,  228 => 57,  218 => 55,  215 => 54,  212 => 53,  209 => 52,  204 => 125,  202 => 63,  198 => 62,  195 => 61,  193 => 52,  190 => 51,  187 => 50,  184 => 49,  178 => 127,  175 => 49,  172 => 48,  169 => 47,  167 => 46,  162 => 45,  159 => 44,  156 => 43,  154 => 42,  151 => 41,  147 => 39,  129 => 35,  123 => 32,  115 => 31,  109 => 30,  104 => 28,  100 => 26,  97 => 25,  94 => 24,  76 => 23,  74 => 22,  67 => 18,  63 => 17,  52 => 14,  50 => 13,  45 => 10,  42 => 9,  40 => 8,  37 => 7,  34 => 6,  30 => 1,  28 => 4,  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "forms/fields/collection/list.html.twig", "/var/www/html/wp-content/plugins/gantry5/admin/templates/forms/fields/collection/list.html.twig");
    }
}
