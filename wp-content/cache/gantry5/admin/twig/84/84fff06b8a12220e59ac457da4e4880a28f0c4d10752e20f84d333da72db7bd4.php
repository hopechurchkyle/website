<?php

/* partials/field.html.twig */
class __TwigTemplate_cb23e86672532d6996d477d1f61589a3012b91f0d6a4dd5d2b9c8612048973f2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascript' => array($this, 'block_javascript'),
            'javascript_footer' => array($this, 'block_javascript_footer'),
            'group' => array($this, 'block_group'),
            'input' => array($this, 'block_input'),
            'global_attributes' => array($this, 'block_global_attributes'),
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
        $context["name"] = (((null === ($context["name"] ?? null))) ? ($this->getAttribute(($context["field"] ?? null), "name", array())) : (($context["name"] ?? null)));
        // line 15
        $context["value"] = (((null === ($context["value"] ?? null))) ? ($this->getAttribute(($context["field"] ?? null), "default", array())) : (($context["value"] ?? null)));
        // line 17
        $this->displayBlock('group', $context, $blocks);
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

    // line 17
    public function block_group($context, array $blocks = array())
    {
        // line 18
        echo "    ";
        $this->displayBlock('input', $context, $blocks);
    }

    public function block_input($context, array $blocks = array())
    {
        // line 19
        echo "        <input
                ";
        // line 21
        echo "                name=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->fieldNameFilter((($context["scope"] ?? null) . ($context["name"] ?? null))), "html", null, true);
        echo "\"
                value=\"";
        // line 22
        echo twig_escape_filter($this->env, twig_join_filter(($context["value"] ?? null), ", "), "html", null, true);
        echo "\"
                ";
        // line 24
        echo "                ";
        $this->displayBlock('global_attributes', $context, $blocks);
        // line 32
        echo "                />
    ";
    }

    // line 24
    public function block_global_attributes($context, array $blocks = array())
    {
        // line 25
        echo "                    ";
        if ($this->getAttribute(($context["field"] ?? null), "class", array(), "any", true, true)) {
            echo " class=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "class", array()), "html", null, true);
            echo "\" ";
        }
        // line 26
        echo "                    ";
        if ($this->getAttribute(($context["field"] ?? null), "id", array(), "any", true, true)) {
            echo " id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "id", array()), "html", null, true);
            echo "\" ";
        }
        // line 27
        echo "                    ";
        if ($this->getAttribute(($context["field"] ?? null), "style", array(), "any", true, true)) {
            echo " style=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "style", array()), "html", null, true);
            echo "\" ";
        }
        // line 28
        echo "                    ";
        if ($this->getAttribute(($context["field"] ?? null), "title", array(), "any", true, true)) {
            echo " title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "title", array()), "html", null, true);
            echo "\" ";
        }
        // line 29
        echo "                    ";
        if ($this->getAttribute(($context["field"] ?? null), "override_target", array(), "any", true, true)) {
            echo " data-override-target=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "override_target", array()), "html_attr");
            echo "\" ";
        }
        // line 30
        echo "                    aria-label=\"";
        echo twig_escape_filter($this->env, twig_trim_filter(twig_title_string_filter($this->env, twig_replace_filter((($context["scope"] ?? null) . ($context["name"] ?? null)), array("." => " ")))), "html", null, true);
        echo "\"
                ";
    }

    public function getTemplateName()
    {
        return "partials/field.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  161 => 30,  154 => 29,  147 => 28,  140 => 27,  133 => 26,  126 => 25,  123 => 24,  118 => 32,  115 => 24,  111 => 22,  106 => 21,  103 => 19,  96 => 18,  93 => 17,  89 => 11,  86 => 10,  82 => 6,  79 => 5,  75 => 3,  72 => 2,  68 => 17,  66 => 15,  64 => 14,  59 => 10,  47 => 9,  43 => 5,  40 => 4,  37 => 2,  25 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "partials/field.html.twig", "/var/www/html/wp-content/plugins/gantry5/admin/templates/partials/field.html.twig");
    }
}
