<?php

/* platform/partials/searchform.html.twig */
class __TwigTemplate_b0cbf035dfcd89b99d32388bc6af1cb2907b26bc476e3a62edc6093957394c40 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'search_form' => array($this, 'block_search_form'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["scope"] = "searchform";
        // line 2
        echo "
";
        // line 3
        $this->displayBlock('search_form', $context, $blocks);
    }

    public function block_search_form($context, array $blocks = array())
    {
        // line 4
        echo "
    <form role=\"search\" method=\"get\" class=\"search-form form\" action=\"";
        // line 5
        echo $this->getAttribute(($context["site"] ?? null), "url", array());
        echo "/\">
        <label>
            <span class=\"screen-reader-text\">";
        // line 7
        echo call_user_func_array($this->env->getFunction('__')->getCallable(), array("Search for:", "wpfc-core"));
        echo "</span>
        </label>
        <input type=\"search\" class=\"search-field\" placeholder=\"";
        // line 9
        echo call_user_func_array($this->env->getFunction('__')->getCallable(), array("Search …", "wpfc-core"));
        echo "\" value=\"\" name=\"s\" title=\"";
        echo call_user_func_array($this->env->getFunction('__')->getCallable(), array("Search for:", "wpfc-core"));
        echo "\" />
        <button type=\"submit\" class=\"search-submit\"><i class=\"fa fa-search\" aria-hidden=\"true\"></i></button>
    </form>

";
    }

    public function getTemplateName()
    {
        return "platform/partials/searchform.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 9,  39 => 7,  34 => 5,  31 => 4,  25 => 3,  22 => 2,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "platform/partials/searchform.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/platform/partials/searchform.html.twig");
    }
}
