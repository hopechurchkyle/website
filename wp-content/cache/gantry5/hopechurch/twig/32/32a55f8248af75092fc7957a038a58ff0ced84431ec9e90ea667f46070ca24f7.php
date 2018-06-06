<?php

/* wpfc-sermon/partials/entry-bulletin.html.twig */
class __TwigTemplate_e09cbdf74b772b5b9b65363a7824856478dcb3f5bf8baa13a14cff9b93d14f2a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'sermon_entry_bulletin' => array($this, 'block_sermon_entry_bulletin'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["sermon_entry_bulletin_enabled"] = (($context["sermon_entry_bulletin_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-bulletin.enabled"), 1 => "1"), "method")));
        // line 2
        $context["sermon_entry_bulletin_icon"] = (($context["sermon_entry_bulletin_icon"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-bulletin.icon"), 1 => "fa fa-file-text-o"), "method")));
        // line 3
        echo "
";
        // line 4
        $this->displayBlock('sermon_entry_bulletin', $context, $blocks);
    }

    public function block_sermon_entry_bulletin($context, array $blocks = array())
    {
        // line 5
        echo "    ";
        if ((($context["sermon_entry_bulletin_enabled"] ?? null) && call_user_func_array($this->env->getFunction('fn')->getCallable(), array("get_wpfc_sermon_meta", "sermon_bulletin")))) {
            // line 6
            echo "        <div class=\"entry-bulletin\">
            <a href=\"";
            // line 7
            echo call_user_func_array($this->env->getFunction('fn')->getCallable(), array("get_wpfc_sermon_meta", "sermon_bulletin"));
            echo "\" target=\"_blank\">
                <i class=\"";
            // line 8
            echo ($context["sermon_entry_bulletin_icon"] ?? null);
            echo "\"></i>
                <div>Bulletin</div>
            </a>
        </div>
    ";
        }
    }

    public function getTemplateName()
    {
        return "wpfc-sermon/partials/entry-bulletin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 8,  39 => 7,  36 => 6,  33 => 5,  27 => 4,  24 => 3,  22 => 2,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "wpfc-sermon/partials/entry-bulletin.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/wpfc-sermon/partials/entry-bulletin.html.twig");
    }
}
