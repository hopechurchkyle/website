<?php

/* forms/field.html.twig */
class __TwigTemplate_ebef0920d950f25c854cc8b8669c725967b6356564b22e174949e48e7a6fea36 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascript' => array($this, 'block_javascript'),
            'javascript_footer' => array($this, 'block_javascript_footer'),
            'field' => array($this, 'block_field'),
            'overridable' => array($this, 'block_overridable'),
            'contents' => array($this, 'block_contents'),
            'label' => array($this, 'block_label'),
            'group' => array($this, 'block_group'),
            'input' => array($this, 'block_input'),
            'global_attributes' => array($this, 'block_global_attributes'),
            'reset_field' => array($this, 'block_reset_field'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $assetFunction = $this->env->getFunction('parse_assets')->getCallable();
        $assetVariables = array();
        if ($assetVariables && !is_array($assetVariables)) {
            throw new UnexpectedValueException('{% scripts with x %}: x is not an array');
        }
        $location = "head";
        if ($location && !is_string($location)) {
            throw new UnexpectedValueException('{% scripts in x %}: x is not a string');
        }
        $priority = isset($assetVariables['priority']) ? $assetVariables['priority'] : 0;
        ob_start();
        // line 2
        echo "    ";
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 4
        echo "
    ";
        // line 5
        $this->displayBlock('javascript', $context, $blocks);
        $content = ob_get_clean();
        echo $assetFunction($content, $location, $priority);
        // line 9
        $assetFunction = $this->env->getFunction('parse_assets')->getCallable();
        $assetVariables = array();
        if ($assetVariables && !is_array($assetVariables)) {
            throw new UnexpectedValueException('{% scripts with x %}: x is not an array');
        }
        $location = "footer";
        if ($location && !is_string($location)) {
            throw new UnexpectedValueException('{% scripts in x %}: x is not a string');
        }
        $priority = isset($assetVariables['priority']) ? $assetVariables['priority'] : 0;
        ob_start();
        // line 10
        echo "    ";
        $this->displayBlock('javascript_footer', $context, $blocks);
        $content = ob_get_clean();
        echo $assetFunction($content, $location, $priority);
        // line 14
        $context["name"] = (($context["name"]) ?? ($this->getAttribute(($context["field"] ?? null), "name", array())));
        // line 15
        $context["default_value"] = (($context["default_value"]) ?? ($this->getAttribute(($context["field"] ?? null), "default", array())));
        // line 16
        $context["current_value"] = (($context["current_value"]) ?? (($context["value"] ?? null)));
        // line 17
        $context["has_value"] =  !(null === ($context["current_value"] ?? null));
        // line 18
        $context["value"] = ((($context["has_value"] ?? null)) ? (($context["current_value"] ?? null)) : (($context["default_value"] ?? null)));
        // line 20
        $this->displayBlock('field', $context, $blocks);
    }

    // line 2
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 3
        echo "    ";
    }

    // line 5
    public function block_javascript($context, array $blocks = array())
    {
        // line 6
        echo "    ";
    }

    // line 10
    public function block_javascript_footer($context, array $blocks = array())
    {
        // line 11
        echo "    ";
    }

    // line 20
    public function block_field($context, array $blocks = array())
    {
        // line 21
        if (( !$this->getAttribute(($context["field"] ?? null), "isset", array()) ||  !(null === ($context["value"] ?? null)))) {
            // line 22
            echo "    <div class=\"settings-param ";
            echo twig_escape_filter($this->env, twig_replace_filter($this->getAttribute(($context["field"] ?? null), "type", array()), ".", "-"), "html", null, true);
            echo "\">
        ";
            // line 23
            $this->displayBlock('overridable', $context, $blocks);
            // line 29
            echo "        ";
            $this->displayBlock('contents', $context, $blocks);
            // line 70
            echo "    </div>
";
        }
    }

    // line 23
    public function block_overridable($context, array $blocks = array())
    {
        // line 24
        echo "        ";
        $context["field_overridable"] = ((($this->getAttribute(($context["field"] ?? null), "overridable", array(), "any", true, true) &&  !(null === $this->getAttribute(($context["field"] ?? null), "overridable", array())))) ? ($this->getAttribute(($context["field"] ?? null), "overridable", array())) : (((($this->getAttribute(($context["field"] ?? null), "overrideable", array(), "any", true, true) &&  !(null === $this->getAttribute(($context["field"] ?? null), "overrideable", array())))) ? ($this->getAttribute(($context["field"] ?? null), "overrideable", array())) : (true))));
        // line 25
        echo "        ";
        if ((($context["overrideable"] ?? null) && (($context["field_overridable"] ?? null) || ($context["has_value"] ?? null)))) {
            // line 26
            echo "            ";
            $this->loadTemplate("forms/override.html.twig", "forms/field.html.twig", 26)->display(array_merge($context, array("scope" => ($context["scope"] ?? null), "name" => ($context["name"] ?? null), "field" => ($context["field"] ?? null))));
            // line 27
            echo "        ";
        }
        // line 28
        echo "        ";
    }

    // line 29
    public function block_contents($context, array $blocks = array())
    {
        // line 30
        echo "            <span class=\"settings-param-title float-left\">
                ";
        // line 31
        $this->displayBlock('label', $context, $blocks);
        // line 42
        echo "            </span>
            <div class=\"settings-param-field\">
                ";
        // line 44
        $this->displayBlock('group', $context, $blocks);
        // line 68
        echo "            </div>
        ";
    }

    // line 31
    public function block_label($context, array $blocks = array())
    {
        // line 32
        echo "                    ";
        if ($this->getAttribute(($context["field"] ?? null), "description", array())) {
            // line 33
            echo "                        ";
            $context["description"] = $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transKeyFilter($this->getAttribute(($context["field"] ?? null), "description", array()), "GANTRY5_FORM_FIELD", ($context["scope"] ?? null), ($context["name"] ?? null), "DESC");
            // line 34
            echo "                        <span data-tip=\"";
            echo ($context["description"] ?? null);
            echo "\" data-tip-place=\"top-right\" aria-label=\"";
            echo twig_escape_filter($this->env, ($context["description"] ?? null), "html", null, true);
            echo "\" data-title=\"";
            echo twig_escape_filter($this->env, ($context["description"] ?? null), "html", null, true);
            echo "\">
                            ";
            // line 35
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transKeyFilter($this->getAttribute(($context["field"] ?? null), "label", array()), "GANTRY5_FORM_FIELD", ($context["scope"] ?? null), ($context["name"] ?? null), "LABEL"), "html", null, true);
            echo "
                        </span>
                    ";
        } else {
            // line 38
            echo "                        ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transKeyFilter($this->getAttribute(($context["field"] ?? null), "label", array()), "GANTRY5_FORM_FIELD", ($context["scope"] ?? null), ($context["name"] ?? null), "LABEL"), "html", null, true);
            echo "
                    ";
        }
        // line 40
        echo "                    ";
        echo ((twig_in_filter($this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", array()), "required", array()), array(0 => "on", 1 => "true", 2 => 1))) ? ("<span class=\"required\">*</span>") : (""));
        echo "
                ";
    }

    // line 44
    public function block_group($context, array $blocks = array())
    {
        // line 45
        echo "                    ";
        $this->displayBlock('input', $context, $blocks);
        // line 67
        echo "                ";
    }

    // line 45
    public function block_input($context, array $blocks = array())
    {
        // line 46
        echo "                        <input
                                ";
        // line 48
        echo "                                name=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->fieldNameFilter((($context["scope"] ?? null) . ($context["name"] ?? null))), "html", null, true);
        echo "\"
                                value=\"";
        // line 49
        echo twig_escape_filter($this->env, twig_join_filter(($context["value"] ?? null), ", "), "html", null, true);
        echo "\"
                                ";
        // line 51
        echo "                                ";
        $this->displayBlock('global_attributes', $context, $blocks);
        // line 59
        echo "                                />

                        ";
        // line 61
        $this->displayBlock('reset_field', $context, $blocks);
        // line 66
        echo "                    ";
    }

    // line 51
    public function block_global_attributes($context, array $blocks = array())
    {
        // line 52
        echo "                                    ";
        if ($this->getAttribute(($context["field"] ?? null), "class", array(), "any", true, true)) {
            echo " class=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "class", array()), "html", null, true);
            echo "\" ";
        }
        // line 53
        echo "                                    ";
        if ($this->getAttribute(($context["field"] ?? null), "id", array(), "any", true, true)) {
            echo " id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "id", array()), "html", null, true);
            echo "\" ";
        }
        // line 54
        echo "                                    ";
        if ($this->getAttribute(($context["field"] ?? null), "style", array(), "any", true, true)) {
            echo " style=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "style", array()), "html", null, true);
            echo "\" ";
        }
        // line 55
        echo "                                    ";
        if ($this->getAttribute(($context["field"] ?? null), "title", array(), "any", true, true)) {
            echo " title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "title", array()), "html", null, true);
            echo "\" ";
        }
        // line 56
        echo "                                    ";
        if ($this->getAttribute(($context["field"] ?? null), "override_target", array(), "any", true, true)) {
            echo " data-override-target=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "override_target", array()), "html_attr");
            echo "\" ";
        }
        // line 57
        echo "                                    aria-label=\"";
        echo twig_escape_filter($this->env, twig_trim_filter(twig_title_string_filter($this->env, twig_replace_filter((($context["scope"] ?? null) . ($context["name"] ?? null)), array("." => " ")))), "html", null, true);
        echo "\"
                                ";
    }

    // line 61
    public function block_reset_field($context, array $blocks = array())
    {
        // line 62
        if (( !$this->getAttribute(($context["field"] ?? null), "reset_field", array(), "any", true, true) || twig_in_filter($this->getAttribute(($context["field"] ?? null), "reset_field", array()), array(0 => "on", 1 => "true", 2 => 1)))) {
            // line 63
            echo "                                <span class=\"g-reset-field\" data-g-reset-field=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->fieldNameFilter((($context["scope"] ?? null) . ($context["name"] ?? null))), "html", null, true);
            echo "\"><i class=\"fa  fa-fw fa-times-circle\" aria-hidden=\"true\"></i></span>
                            ";
        }
    }

    public function getTemplateName()
    {
        return "forms/field.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  288 => 63,  286 => 62,  283 => 61,  276 => 57,  269 => 56,  262 => 55,  255 => 54,  248 => 53,  241 => 52,  238 => 51,  234 => 66,  232 => 61,  228 => 59,  225 => 51,  221 => 49,  216 => 48,  213 => 46,  210 => 45,  206 => 67,  203 => 45,  200 => 44,  193 => 40,  187 => 38,  181 => 35,  172 => 34,  169 => 33,  166 => 32,  163 => 31,  158 => 68,  156 => 44,  152 => 42,  150 => 31,  147 => 30,  144 => 29,  140 => 28,  137 => 27,  134 => 26,  131 => 25,  128 => 24,  125 => 23,  119 => 70,  116 => 29,  114 => 23,  109 => 22,  107 => 21,  104 => 20,  100 => 11,  97 => 10,  93 => 6,  90 => 5,  86 => 3,  83 => 2,  79 => 20,  77 => 18,  75 => 17,  73 => 16,  71 => 15,  69 => 14,  64 => 10,  52 => 9,  48 => 5,  45 => 4,  42 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "forms/field.html.twig", "/var/www/html/wp-content/plugins/gantry5/admin/templates/forms/field.html.twig");
    }
}
