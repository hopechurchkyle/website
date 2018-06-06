<?php

/* forms/fields/menu/item.html.twig */
class __TwigTemplate_3ffd7cecdb09f4349eb56a8d01bfcd80a4c4bc17abc4df33fa2203c7c3e6de82 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("forms/fields/select/selectize.html.twig", "forms/fields/menu/item.html.twig", 1);
        $this->blocks = array(
            'options' => array($this, 'block_options'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "forms/fields/select/selectize.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_options($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $this->displayParentBlock("options", $context, $blocks);
        echo "
    ";
        // line 5
        if ( !(null === $this->getAttribute(($context["gantry"] ?? null), "menu", array()))) {
            // line 6
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "menu", array()), "getGroupedItems", array(), "method"));
            foreach ($context['_seq'] as $context["group"] => $context["items"]) {
                // line 7
                echo "            ";
                if (twig_length_filter($this->env, $context["items"])) {
                    // line 8
                    echo "            <optgroup label=\"";
                    echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $context["group"]), "html", null, true);
                    echo "\">
            ";
                    // line 9
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["items"]);
                    foreach ($context['_seq'] as $context["key"] => $context["item"]) {
                        // line 10
                        echo "            <option
                    ";
                        // line 12
                        echo "                    ";
                        if (($context["key"] == ($context["value"] ?? null))) {
                            echo "selected=\"selected\"";
                        }
                        // line 13
                        echo "                    value=\"";
                        echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                        echo "\"
                    ";
                        // line 15
                        echo "                    ";
                        if (twig_in_filter($this->getAttribute($this->getAttribute(($context["field"] ?? null), "options", array()), "disabled", array()), array(0 => "on", 1 => "true", 2 => 1))) {
                            echo "disabled=\"disabled\"";
                        }
                        // line 16
                        echo "                    >";
                        echo $this->getAttribute($context["item"], "spacing", array());
                        echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "label", array()), "html", null, true);
                        echo "</option>
            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 18
                    echo "            </optgroup>
            ";
                }
                // line 20
                echo "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['group'], $context['items'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 21
            echo "    ";
        }
    }

    public function getTemplateName()
    {
        return "forms/fields/menu/item.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 21,  87 => 20,  83 => 18,  73 => 16,  68 => 15,  63 => 13,  58 => 12,  55 => 10,  51 => 9,  46 => 8,  43 => 7,  38 => 6,  36 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "forms/fields/menu/item.html.twig", "/var/www/html/wp-content/plugins/gantry5/admin/templates/forms/fields/menu/item.html.twig");
    }
}
