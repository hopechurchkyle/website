<?php

/* forms/fields/collection/keyvalue.html.twig */
class __TwigTemplate_dd57fd6b206a270e2b466981636a99e7553beeca136ffeed410afcc9ddbc6ea8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'input' => array($this, 'block_input'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return $this->loadTemplate((("forms/" . ((array_key_exists("layout", $context)) ? (_twig_default_filter(($context["layout"] ?? null), "field")) : ("field"))) . ".html.twig"), "forms/fields/collection/keyvalue.html.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_input($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"g-keyvalue-field";
        if ($this->getAttribute(($context["field"] ?? null), "size", array())) {
            echo " g-keyvalue-";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "size", array()), "html", null, true);
        }
        echo "\">
        <ul>";
        // line 6
        if (($context["value"] ?? null)) {
            // line 7
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["value"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
                // line 8
                echo "            ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["data"]);
                foreach ($context['_seq'] as $context["key"] => $context["val"]) {
                    // line 9
                    echo "            <li data-keyvalue-item=\"\">
                <i class=\"fa fa-reorder font-small item-reorder\" aria-hidden=\"true\"></i>
                <div class=\"g-keyvalue-wrapper\">
                    <input class=\"g-keyvalue-input-key\" type=\"text\" data-keyvalue-key=\"";
                    // line 12
                    echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                    echo "\" value=\"";
                    echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                    echo "\" ";
                    if ($this->getAttribute(($context["field"] ?? null), "key_placeholder", array(), "any", true, true)) {
                        echo "placeholder=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "key_placeholder", array()), "html", null, true);
                        echo "\"";
                    }
                    echo " />
                    <i class=\"g-keyvalue-sep fa fa-fw fa-arrow-right\"></i>
                    <input class=\"g-keyvalue-input-value\" type=\"text\" data-keyvalue-value=\"\" value=\"";
                    // line 14
                    echo twig_escape_filter($this->env, $context["val"], "html", null, true);
                    echo "\" ";
                    if ($this->getAttribute(($context["field"] ?? null), "value_placeholder", array(), "any", true, true)) {
                        echo "placeholder=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "value_placeholder", array()), "html", null, true);
                        echo "\"";
                    }
                    echo " />
                </div>
                <i class=\"fa fa-fw fa-trash font-small\" aria-hidden=\"true\" data-keyvalue-remove=\"\"></i>
            </li>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['val'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 19
                echo "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 20
            echo "        ";
        }
        // line 21
        echo "</ul>

        <span class=\"button button-simple\" data-keyvalue-addnew=\"\" title=\"Add new item\"><i class=\"fa fa-plus font-small\" aria-hidden=\"true\"></i></span>
    </div>
    <ul style=\"display: none\">
        <li data-keyvalue-nosort=\"\" data-keyvalue-template=\"\">
            <i class=\"fa fa-reorder font-small item-reorder\" aria-hidden=\"true\"></i>
            <div class=\"g-keyvalue-wrapper\">
                <input class=\"g-keyvalue-input-key\" type=\"text\" data-keyvalue-key=\"\" value=\"\" ";
        // line 29
        if ($this->getAttribute(($context["field"] ?? null), "key_placeholder", array(), "any", true, true)) {
            echo "placeholder=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "key_placeholder", array()), "html", null, true);
            echo "\"";
        }
        echo " />
                <i class=\"g-keyvalue-sep fa fa-fw fa-arrow-right\"></i>
                <input class=\"g-keyvalue-input-value\" type=\"text\" data-keyvalue-value=\"\" value=\"\" ";
        // line 31
        if ($this->getAttribute(($context["field"] ?? null), "value_placeholder", array(), "any", true, true)) {
            echo "placeholder=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "value_placeholder", array()), "html", null, true);
            echo "\"";
        }
        echo " />
            </div>
            <i class=\"fa fa-fw fa-trash font-small\" aria-hidden=\"true\" data-keyvalue-remove=\"\"></i>
        </li>
    </ul>
    <input type=\"hidden\" data-keyvalue-data=\"\" data-keyvalue-exclude=\"";
        // line 36
        echo twig_escape_filter($this->env, twig_jsonencode_filter((($this->getAttribute(($context["field"] ?? null), "exclude", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["field"] ?? null), "exclude", array()), array())) : (array()))), "html_attr");
        echo "\" name=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->fieldNameFilter(((($context["scope"] ?? null) . ($context["name"] ?? null)) . "._json")), "html", null, true);
        echo "\" value=\"";
        echo twig_escape_filter($this->env, twig_jsonencode_filter(((array_key_exists("value", $context)) ? (_twig_default_filter(($context["value"] ?? null), array())) : (array())), twig_constant("JSON_UNESCAPED_SLASHES")), "html_attr");
        echo "\" />
";
    }

    public function getTemplateName()
    {
        return "forms/fields/collection/keyvalue.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 36,  113 => 31,  104 => 29,  94 => 21,  91 => 20,  85 => 19,  68 => 14,  55 => 12,  50 => 9,  45 => 8,  40 => 7,  38 => 6,  30 => 4,  27 => 3,  18 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "forms/fields/collection/keyvalue.html.twig", "/var/www/html/wp-content/plugins/gantry5/admin/templates/forms/fields/collection/keyvalue.html.twig");
    }
}
