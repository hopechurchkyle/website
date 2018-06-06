<?php

/* wpfc-sermon/partials/entry-notes.html.twig */
class __TwigTemplate_9a7e640f092361b9833ae95e0be8ec5368e1a7cbcd2860d4e440e874e06c82bd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'sermon_entry_notes' => array($this, 'block_sermon_entry_notes'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["sermon_entry_notes_enabled"] = (($context["sermon_entry_notes_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-notes.enabled"), 1 => "1"), "method")));
        // line 2
        $context["sermon_entry_notes_icon"] = (($context["sermon_entry_notes_icon"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-notes.icon"), 1 => "fa fa-sticky-note-o"), "method")));
        // line 3
        echo "
";
        // line 4
        $this->displayBlock('sermon_entry_notes', $context, $blocks);
    }

    public function block_sermon_entry_notes($context, array $blocks = array())
    {
        // line 5
        echo "    ";
        if ((($context["sermon_entry_notes_enabled"] ?? null) &&  !twig_test_empty(call_user_func_array($this->env->getFunction('fn')->getCallable(), array("get_wpfc_sermon_meta", "sermon_notes"))))) {
            // line 6
            echo "        <div class=\"entry-notes\">
            <a href=\"";
            // line 7
            echo call_user_func_array($this->env->getFunction('fn')->getCallable(), array("get_wpfc_sermon_meta", "sermon_notes"));
            echo "\" target=\"_blank\">
                <i class=\"";
            // line 8
            echo ($context["sermon_entry_notes_icon"] ?? null);
            echo "\"></i>
                <div>Notes</div>
            </a>
        </div>
    ";
        }
    }

    public function getTemplateName()
    {
        return "wpfc-sermon/partials/entry-notes.html.twig";
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
        return new Twig_Source("", "wpfc-sermon/partials/entry-notes.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/wpfc-sermon/partials/entry-notes.html.twig");
    }
}
