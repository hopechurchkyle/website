<?php

/* forms/fields/input/group/group.html.twig */
class __TwigTemplate_94bd527f0f3740ac45f33ed43b2cf6861867a73c4a9e62f48a8745d38a30c6f3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'group' => array($this, 'block_group'),
            'input' => array($this, 'block_input'),
            'reset_field' => array($this, 'block_reset_field'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return $this->loadTemplate(((($context["default"] ?? null)) ? ("partials/field.html.twig") : ((("forms/" . ((array_key_exists("layout", $context)) ? (_twig_default_filter(($context["layout"] ?? null), "field")) : ("field"))) . ".html.twig"))), "forms/fields/input/group/group.html.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_group($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"input-group
        ";
        // line 5
        if ($this->getAttribute(($context["field"] ?? null), "prepend", array())) {
            echo "prepend
        ";
        }
        // line 7
        echo "        ";
        if ($this->getAttribute(($context["field"] ?? null), "append", array())) {
            echo "append
        ";
        }
        // line 9
        echo "    \">


        ";
        // line 12
        if ($this->getAttribute(($context["field"] ?? null), "prepend", array())) {
            // line 13
            echo "            ";
            echo $this->getAttribute($this, "pend", array(0 => $this->getAttribute(($context["field"] ?? null), "prepend", array())), "method");
            echo "
        ";
        }
        // line 15
        echo "        ";
        $this->displayBlock('input', $context, $blocks);
        // line 17
        echo "        ";
        if ($this->getAttribute(($context["field"] ?? null), "append", array())) {
            // line 18
            echo "            ";
            echo $this->getAttribute($this, "pend", array(0 => $this->getAttribute(($context["field"] ?? null), "append", array())), "method");
            echo "
        ";
        }
        // line 20
        echo "        ";
        $this->displayBlock('reset_field', $context, $blocks);
        // line 21
        echo "    </div>
";
    }

    // line 15
    public function block_input($context, array $blocks = array())
    {
        // line 16
        echo "        ";
    }

    // line 20
    public function block_reset_field($context, array $blocks = array())
    {
        $this->displayParentBlock("reset_field", $context, $blocks);
    }

    // line 24
    public function getpend($__item__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "item" => $__item__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 25
            echo "    ";
            if (($this->getAttribute(($context["item"] ?? null), "type", array()) == "text")) {
                // line 26
                echo "        <span class=\"input-group-addon\">";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["item"] ?? null), "text", array()));
                echo "</span>
    ";
            } elseif (($this->getAttribute(            // line 27
($context["item"] ?? null), "type", array()) == "list")) {
                // line 28
                echo "        ";
                if ($this->getAttribute(($context["item"] ?? null), "options", array())) {
                    // line 29
                    echo "            ";
                    $this->loadTemplate("forms/fields/select/selectize.html.twig", "forms/fields/input/group/group.html.twig", 29)->display(array_merge($context, array("field.options" => $this->getAttribute(($context["item"] ?? null), "options", array()))));
                    // line 30
                    echo "        ";
                }
                // line 31
                echo "    ";
            } elseif (($this->getAttribute(($context["item"] ?? null), "type", array()) == "button")) {
                // line 32
                echo "        <span class=\"input-group-btn\">
            ";
                // line 33
                $this->loadTemplate("forms/fields/button", "forms/fields/input/group/group.html.twig", 33)->display($context);
                // line 34
                echo "        </span>
    ";
            } elseif (($this->getAttribute(            // line 35
($context["item"] ?? null), "type", array()) == "actions")) {
                // line 36
                echo "    ";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "forms/fields/input/group/group.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 36,  134 => 35,  131 => 34,  129 => 33,  126 => 32,  123 => 31,  120 => 30,  117 => 29,  114 => 28,  112 => 27,  107 => 26,  104 => 25,  92 => 24,  86 => 20,  82 => 16,  79 => 15,  74 => 21,  71 => 20,  65 => 18,  62 => 17,  59 => 15,  53 => 13,  51 => 12,  46 => 9,  40 => 7,  35 => 5,  32 => 4,  29 => 3,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "forms/fields/input/group/group.html.twig", "/var/www/html/wp-content/plugins/gantry5/admin/templates/forms/fields/input/group/group.html.twig");
    }
}
