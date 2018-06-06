<?php

/* wpfc-sermon/partials/sermon-sorting.html.twig */
class __TwigTemplate_add5e9d5fabf06ed73c309f3b09f941db2d407005b58e2ca79f66c67f7df233b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'sermon_sorting' => array($this, 'block_sermon_sorting'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["sermon_sorting_enabled"] = (($context["sermon_sorting_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".general.sorting"), 1 => "1"), "method")));
        // line 2
        echo "
";
        // line 3
        $this->displayBlock('sermon_sorting', $context, $blocks);
    }

    public function block_sermon_sorting($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        if (($context["sermon_sorting_enabled"] ?? null)) {
            // line 5
            echo "        ";
            if (call_user_func_array($this->env->getFunction('function')->getCallable(), array("function_exists", "render_wpfc_sorting"))) {
                // line 6
                echo "            ";
                echo call_user_func_array($this->env->getFunction('function')->getCallable(), array("render_wpfc_sorting"));
                echo "
        ";
            } else {
                // line 8
                echo "            ";
                echo $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "Sermon_Manager_Template_Tags", array()), "render_wpfc_sorting", array());
                echo "
        ";
            }
            // line 10
            echo "    ";
        }
    }

    public function getTemplateName()
    {
        return "wpfc-sermon/partials/sermon-sorting.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 10,  43 => 8,  37 => 6,  34 => 5,  31 => 4,  25 => 3,  22 => 2,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "wpfc-sermon/partials/sermon-sorting.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/wpfc-sermon/partials/sermon-sorting.html.twig");
    }
}
