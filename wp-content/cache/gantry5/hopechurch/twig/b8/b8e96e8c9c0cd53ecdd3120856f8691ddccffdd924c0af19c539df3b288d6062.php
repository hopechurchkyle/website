<?php

/* platform/partials/entry-content-pass.html.twig */
class __TwigTemplate_e557bd4a06953bfb0c0591603ec24c933d2b717cf967bd38fe9e054fa698aa8c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'entry_content_pass' => array($this, 'block_entry_content_pass'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('entry_content_pass', $context, $blocks);
    }

    public function block_entry_content_pass($context, array $blocks = array())
    {
        // line 2
        echo "    ";
        // line 3
        echo "    ";
        if ( !call_user_func_array($this->env->getFunction('function')->getCallable(), array("post_password_required", $this->getAttribute(($context["post"] ?? null), "ID", array())))) {
            // line 4
            echo "        
        ";
            // line 6
            echo "        ";
            $this->loadTemplate("platform/partials/entry-content-more.html.twig", "platform/partials/entry-content-pass.html.twig", 6)->display($context);
            // line 7
            echo "
    ";
        } else {
            // line 9
            echo "        
        ";
            // line 11
            echo "        ";
            $this->loadTemplate("platform/partials/password-form.html.twig", "platform/partials/entry-content-pass.html.twig", 11)->display($context);
            // line 12
            echo "
    ";
        }
    }

    public function getTemplateName()
    {
        return "platform/partials/entry-content-pass.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  47 => 12,  44 => 11,  41 => 9,  37 => 7,  34 => 6,  31 => 4,  28 => 3,  26 => 2,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "platform/partials/entry-content-pass.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/platform/partials/entry-content-pass.html.twig");
    }
}
