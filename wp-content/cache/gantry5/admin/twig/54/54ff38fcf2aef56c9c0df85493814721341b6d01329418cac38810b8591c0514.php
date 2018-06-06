<?php

/* forms/fields/input/block-variations.html.twig */
class __TwigTemplate_df4725f7f42bf9b1f9e9372d93f6f46e2fb649190e7310d8beb7340a78431f14 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("forms/fields/input/selectize.html.twig", "forms/fields/input/block-variations.html.twig", 1);
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
        $context["variations"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "theme", array()), "details", array()), "configuration", array()), "block-variations", array(), "array");
        // line 5
        echo "    ";
        $context["Options"] = $this->getAttribute($this->getAttribute(($context["field"] ?? null), "selectize", array()), "Options", array());
        // line 6
        echo "    ";
        $context["Optgroups"] = $this->getAttribute($this->getAttribute(($context["field"] ?? null), "selectize", array()), "Optgroups", array());
        // line 7
        echo "    ";
        $context["options"] = array();
        // line 8
        echo "    ";
        $context["optgroups"] = array();
        // line 9
        echo "    ";
        if (($context["variations"] ?? null)) {
            // line 10
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["variations"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["text"]) {
                // line 11
                echo "            ";
                if (twig_test_iterable($context["text"])) {
                    // line 12
                    echo "                ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["text"]);
                    foreach ($context['_seq'] as $context["item_key"] => $context["item_text"]) {
                        // line 13
                        echo "                    ";
                        $context["options"] = twig_array_merge(($context["options"] ?? null), array(0 => array("optgroup" => $context["key"], "value" => $context["item_key"], "text" => $context["item_text"])));
                        // line 14
                        echo "                    ";
                        if (!twig_in_filter($context["key"], ($context["optgroups"] ?? null))) {
                            $context["optgroups"] = twig_array_merge(($context["optgroups"] ?? null), array(0 => array("value" => $context["key"], "label" => $context["key"])));
                        }
                        // line 15
                        echo "                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['item_key'], $context['item_text'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 16
                    echo "            ";
                } else {
                    // line 17
                    echo "                ";
                    $context["options"] = twig_array_merge(($context["options"] ?? null), array(0 => array("value" => $context["key"], "text" => $context["text"])));
                    // line 18
                    echo "            ";
                }
                // line 19
                echo "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['text'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 20
            echo "

        ";
            // line 22
            $context["field"] = twig_array_merge(twig_array_merge(twig_array_merge(($context["field"] ?? null), (($this->getAttribute($this->getAttribute(($context["field"] ?? null), "selectize", array(), "any", false, true), "Options", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["field"] ?? null), "selectize", array(), "any", false, true), "Options", array()), array())) : (array()))), (($this->getAttribute($this->getAttribute(($context["field"] ?? null), "selectize", array(), "any", false, true), "Optgroups", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["field"] ?? null), "selectize", array(), "any", false, true), "Optgroups", array()), array())) : (array()))), array("selectize" => array("Options" => ($context["options"] ?? null), "Optgroups" => ($context["optgroups"] ?? null), "Subtitles" => true)));
            // line 23
            echo "    ";
        }
        // line 24
        echo "
    data-selectize=\"";
        // line 25
        echo (($this->getAttribute(($context["field"] ?? null), "selectize", array(), "any", true, true)) ? (twig_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute(($context["field"] ?? null), "selectize", array())), "html_attr")) : (""));
        echo "\"
    ";
        // line 26
        $this->displayParentBlock("global_attributes", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "forms/fields/input/block-variations.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 26,  103 => 25,  100 => 24,  97 => 23,  95 => 22,  91 => 20,  85 => 19,  82 => 18,  79 => 17,  76 => 16,  70 => 15,  65 => 14,  62 => 13,  57 => 12,  54 => 11,  49 => 10,  46 => 9,  43 => 8,  40 => 7,  37 => 6,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "forms/fields/input/block-variations.html.twig", "/var/www/html/wp-content/plugins/gantry5/admin/templates/forms/fields/input/block-variations.html.twig");
    }
}
