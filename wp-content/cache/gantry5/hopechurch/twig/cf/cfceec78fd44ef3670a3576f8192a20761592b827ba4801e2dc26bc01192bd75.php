<?php

/* platform/partials/paged-content-pass.html.twig */
class __TwigTemplate_96a6b744af9766a478471b551a0b0a36b99f59fe647e7169c3c0c7b3f4fedd8f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'paged_content_pass' => array($this, 'block_paged_content_pass'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["twigTemplate"] = "paged-content-pass.html.twig";
        // line 2
        echo "
";
        // line 3
        $this->displayBlock('paged_content_pass', $context, $blocks);
    }

    public function block_paged_content_pass($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        // line 5
        echo "    ";
        if ( !call_user_func_array($this->env->getFunction('function')->getCallable(), array("post_password_required", $this->getAttribute(($context["post"] ?? null), "ID", array())))) {
            // line 6
            echo "        
        ";
            // line 8
            echo "        ";
            $this->loadTemplate("platform/partials/paged-content.html.twig", "platform/partials/paged-content-pass.html.twig", 8)->display($context);
            // line 9
            echo "
    ";
        } else {
            // line 11
            echo "        
        ";
            // line 13
            echo "        ";
            $this->loadTemplate("platform/partials/password-form.html.twig", "platform/partials/paged-content-pass.html.twig", 13)->display($context);
            // line 14
            echo "
    ";
        }
    }

    public function getTemplateName()
    {
        return "platform/partials/paged-content-pass.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 14,  49 => 13,  46 => 11,  42 => 9,  39 => 8,  36 => 6,  33 => 5,  31 => 4,  25 => 3,  22 => 2,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "platform/partials/paged-content-pass.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/platform/partials/paged-content-pass.html.twig");
    }
}
