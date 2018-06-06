<?php

/* @particles/wpfc-assets/common/views/meta/icon.html.twig */
class __TwigTemplate_e194c035c6db1c8ddbfeadd3b17eefa8a131110f8b557a0eaa59a8a7e2ced498 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'meta_icon' => array($this, 'block_meta_icon'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["meta_icon"] = (($context["meta_icon"]) ?? ($this->getAttribute($this->getAttribute($this->getAttribute(($context["scope"] ?? null), "meta", array()), ($context["meta_scope"] ?? null), array(), "array"), "icon", array())));
        // line 2
        echo "
";
        // line 3
        $this->displayBlock('meta_icon', $context, $blocks);
    }

    public function block_meta_icon($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        if (($context["meta_icon"] ?? null)) {
            // line 5
            echo "        <span class=\"wpfc-meta-icon\">
            <i class=\"";
            // line 6
            echo twig_escape_filter($this->env, ($context["meta_icon"] ?? null), "html", null, true);
            echo "\"></i>
        </span>
    ";
        }
    }

    public function getTemplateName()
    {
        return "@particles/wpfc-assets/common/views/meta/icon.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 6,  34 => 5,  31 => 4,  25 => 3,  22 => 2,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@particles/wpfc-assets/common/views/meta/icon.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/particles/wpfc-assets/common/views/meta/icon.html.twig");
    }
}
