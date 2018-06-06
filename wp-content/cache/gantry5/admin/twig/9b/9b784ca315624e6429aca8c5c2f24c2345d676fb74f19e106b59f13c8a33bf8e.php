<?php

/* forms/fields/wordpress/categories.html.twig */
class __TwigTemplate_855fd21f69293b3513da322967f68d54be44d1343c71bad32307891e65eeea57 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("forms/fields/input/selectize.html.twig", "forms/fields/wordpress/categories.html.twig", 1);
        $this->blocks = array(
            'global_attributes' => array($this, 'block_global_attributes'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "forms/fields/input/selectize.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_global_attributes($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $context["taxonomy"] = (($this->getAttribute(($context["field"] ?? null), "taxonomy", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["field"] ?? null), "taxonomy", array()), "category")) : ("category"));
        // line 5
        echo "    ";
        $context["hide_empty"] = (($this->getAttribute(($context["field"] ?? null), "hide_empty", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["field"] ?? null), "hide_empty", array()), "false")) : ("false"));
        // line 6
        echo "    ";
        $context["query_parameters"] = array("taxonomy" =>         // line 7
($context["taxonomy"] ?? null), "hide_empty" =>         // line 8
($context["hide_empty"] ?? null));
        // line 10
        echo "    ";
        $context["categories"] = $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "platform", array()), "getCategories", array(0 => ($context["query_parameters"] ?? null)), "method");
        // line 11
        echo "    ";
        $context["Options"] = $this->getAttribute($this->getAttribute(($context["field"] ?? null), "selectize", array()), "Options", array());
        // line 12
        echo "    ";
        $context["options"] = array();
        // line 13
        echo "    ";
        if (($context["categories"] ?? null)) {
            // line 14
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
            foreach ($context['_seq'] as $context["id"] => $context["category"]) {
                // line 15
                echo "            ";
                $context["options"] = twig_array_merge(($context["options"] ?? null), array(0 => array("value" => $context["id"], "text" => $context["category"])));
                // line 16
                echo "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['id'], $context['category'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 17
            echo "
        ";
            // line 18
            $context["field"] = twig_array_merge(twig_array_merge(($context["field"] ?? null), (($this->getAttribute($this->getAttribute(($context["field"] ?? null), "selectize", array(), "any", false, true), "Options", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["field"] ?? null), "selectize", array(), "any", false, true), "Options", array()), array())) : (array()))), array("selectize" => array("Options" => ($context["options"] ?? null))));
            // line 19
            echo "    ";
        }
        // line 20
        echo "
    data-selectize=\"";
        // line 21
        echo (($this->getAttribute(($context["field"] ?? null), "selectize", array(), "any", true, true)) ? (twig_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute(($context["field"] ?? null), "selectize", array())), "html_attr")) : (""));
        echo "\"
    ";
        // line 22
        $this->displayParentBlock("global_attributes", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "forms/fields/wordpress/categories.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 22,  79 => 21,  76 => 20,  73 => 19,  71 => 18,  68 => 17,  62 => 16,  59 => 15,  54 => 14,  51 => 13,  48 => 12,  45 => 11,  42 => 10,  40 => 8,  39 => 7,  37 => 6,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "forms/fields/wordpress/categories.html.twig", "/var/www/html/wp-content/plugins/gantry5/admin/templates/forms/fields/wordpress/categories.html.twig");
    }
}
