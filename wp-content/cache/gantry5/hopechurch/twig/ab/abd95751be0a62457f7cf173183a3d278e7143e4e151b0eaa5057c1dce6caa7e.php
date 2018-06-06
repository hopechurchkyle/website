<?php

/* wpfc-sermon/partials/entry-preacher.html.twig */
class __TwigTemplate_9d5196cc934325f9c4cb5ccefeb2536c0a66cca493fb502317a3e906c947b204 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'sermon_entry_preacher' => array($this, 'block_sermon_entry_preacher'),
            'sermon_entry_preacher_content' => array($this, 'block_sermon_entry_preacher_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["sermon_entry_preacher_enabled"] = (($context["sermon_entry_preacher_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-preacher.enabled"), 1 => "1"), "method")));
        // line 2
        $context["sermon_entry_preacher_avatar_enabled"] = (($context["sermon_entry_preacher_avatar_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-preacher.avatar.enabled"), 1 => "show"), "method")));
        // line 3
        $context["sermon_entry_preacher_name_enabled"] = (($context["sermon_entry_preacher_name_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-preacher.name.enabled"), 1 => "show"), "method")));
        // line 4
        $context["sermon_entry_preacher_description_enabled"] = (($context["sermon_entry_preacher_description_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-preacher.description.enabled"), 1 => "show"), "method")));
        // line 5
        echo "                        
";
        // line 6
        $context["preacher_parameters"] = array("taxonomy" => "wpfc_preacher");
        // line 9
        $context["preachers"] = call_user_func_array($this->env->getFilter('apply_filters')->getCallable(), array("image", "sermon-images-get-the-terms", ($context["preacher_parameters"] ?? null)));
        // line 10
        echo "
";
        // line 11
        $context["preacher_description"] = "";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["preachers"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["preacher"]) {
            // line 13
            echo "    ";
            $context["preacher_description"] = $this->getAttribute($context["preacher"], "description", array());
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['preacher'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "
";
        // line 16
        $this->displayBlock('sermon_entry_preacher', $context, $blocks);
    }

    public function block_sermon_entry_preacher($context, array $blocks = array())
    {
        // line 17
        echo "    ";
        if ((($context["sermon_entry_preacher_enabled"] ?? null) &&  !twig_test_empty(($context["preacher_description"] ?? null)))) {
            // line 18
            echo "        <div class=\"entry-author\">
            ";
            // line 19
            $this->displayBlock('sermon_entry_preacher_content', $context, $blocks);
            // line 56
            echo "        </div>
    ";
        }
    }

    // line 19
    public function block_sermon_entry_preacher_content($context, array $blocks = array())
    {
        // line 20
        echo "                ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["preachers"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["preacher"]) {
            // line 21
            echo "                    <div class=\"entry-author-item\">     
                        ";
            // line 23
            echo "                        ";
            if (($context["sermon_entry_preacher_avatar_enabled"] ?? null)) {
                // line 24
                echo "                            <div class=\"entry-author-avatar\">
                                ";
                // line 25
                if ((($context["sermon_entry_preacher_avatar_enabled"] ?? null) == "link")) {
                    // line 26
                    echo "                                    <a href=\"";
                    echo $this->getAttribute($context["preacher"], "link", array());
                    echo "\" title=\"";
                    echo $this->getAttribute($context["preacher"], "name", array());
                    echo "\">
                                        ";
                    // line 27
                    echo call_user_func_array($this->env->getFunction('function')->getCallable(), array("wp_get_attachment_image", $this->getAttribute($context["preacher"], "image_id", array())));
                    echo "
                                    </a>
                                ";
                } else {
                    // line 30
                    echo "                                    ";
                    echo call_user_func_array($this->env->getFunction('function')->getCallable(), array("wp_get_attachment_image", $this->getAttribute($context["preacher"], "image_id", array())));
                    echo "
                                ";
                }
                // line 32
                echo "                            </div>
                        ";
            }
            // line 34
            echo "
                        ";
            // line 36
            echo "                        <div class=\"entry-author-inner\">
                            ";
            // line 38
            echo "                            ";
            if (($context["sermon_entry_preacher_name_enabled"] ?? null)) {
                // line 39
                echo "                                <h4 class=\"entry-author-name\">
                                    ";
                // line 40
                if ((($context["sermon_entry_preacher_name_enabled"] ?? null) == "link")) {
                    // line 41
                    echo "                                        <a href=\"";
                    echo $this->getAttribute($context["preacher"], "link", array());
                    echo "\" title=\"";
                    echo $this->getAttribute($context["preacher"], "name", array());
                    echo "\" class=\"entry-author-name-text\">";
                    echo $this->getAttribute($context["preacher"], "name", array());
                    echo "</a>
                                    ";
                } else {
                    // line 43
                    echo "                                        <span class=\"entry-author-name-text\">";
                    echo $this->getAttribute($context["preacher"], "name", array());
                    echo "</span>
                                    ";
                }
                // line 45
                echo "                                </h4>
                            ";
            }
            // line 47
            echo "
                            ";
            // line 49
            echo "                            ";
            if (($context["sermon_entry_preacher_description_enabled"] ?? null)) {
                // line 50
                echo "                                <div class=\"entry-author-description\">";
                echo $this->getAttribute($context["preacher"], "description", array());
                echo "</div>
                            ";
            }
            // line 52
            echo "                        </div>
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['preacher'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 55
        echo "            ";
    }

    public function getTemplateName()
    {
        return "wpfc-sermon/partials/entry-preacher.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  171 => 55,  163 => 52,  157 => 50,  154 => 49,  151 => 47,  147 => 45,  141 => 43,  131 => 41,  129 => 40,  126 => 39,  123 => 38,  120 => 36,  117 => 34,  113 => 32,  107 => 30,  101 => 27,  94 => 26,  92 => 25,  89 => 24,  86 => 23,  83 => 21,  78 => 20,  75 => 19,  69 => 56,  67 => 19,  64 => 18,  61 => 17,  55 => 16,  52 => 15,  45 => 13,  41 => 12,  39 => 11,  36 => 10,  34 => 9,  32 => 6,  29 => 5,  27 => 4,  25 => 3,  23 => 2,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "wpfc-sermon/partials/entry-preacher.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/wpfc-sermon/partials/entry-preacher.html.twig");
    }
}
