<?php

/* wpfc-sermon/partials/entry-content.html.twig */
class __TwigTemplate_09303d9c9abde73344b6331c5c03d1252d90faa87113f359a9b36f863a8e303e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'sermon_entry_content' => array($this, 'block_sermon_entry_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["sermon_entry_content_enabled"] = (($context["sermon_entry_content_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-content.enabled"), 1 => "1"), "method")));
        // line 2
        $context["sermon_entry_content_limit"] = ((($context["sermon_entry_content_limit"] ?? null)) ? (($context["sermon_entry_content_limit"] ?? null)) : ((($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-content.limit")), "method")) ? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-content.limit")), "method")) : ("50"))));
        // line 3
        echo "
";
        // line 4
        $this->displayBlock('sermon_entry_content', $context, $blocks);
    }

    public function block_sermon_entry_content($context, array $blocks = array())
    {
        // line 5
        echo "    ";
        if (($context["sermon_entry_content_enabled"] ?? null)) {
            // line 6
            echo "        <div class=\"entry-content\">
            ";
            // line 7
            if (call_user_func_array($this->env->getFunction('fn')->getCallable(), array("is_singular"))) {
                // line 8
                echo "                ";
                echo wpautop($this->getAttribute(($context["post"] ?? null), "meta", array(0 => "sermon_description"), "method"));
                echo "
            ";
            } else {
                // line 10
                echo "                ";
                echo wpautop(call_user_func_array($this->env->getFilter('truncate')->getCallable(), array($this->getAttribute(($context["post"] ?? null), "meta", array(0 => "sermon_description"), "method"), ($context["sermon_entry_content_limit"] ?? null))));
                echo "
            ";
            }
            // line 12
            echo "        </div>
    ";
        }
    }

    public function getTemplateName()
    {
        return "wpfc-sermon/partials/entry-content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 12,  47 => 10,  41 => 8,  39 => 7,  36 => 6,  33 => 5,  27 => 4,  24 => 3,  22 => 2,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "wpfc-sermon/partials/entry-content.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/wpfc-sermon/partials/entry-content.html.twig");
    }
}
