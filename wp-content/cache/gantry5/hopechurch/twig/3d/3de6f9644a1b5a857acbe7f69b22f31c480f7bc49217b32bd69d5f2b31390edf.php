<?php

/* @particles/wpfc-assets/common/views/meta/prefix.html.twig */
class __TwigTemplate_8caa77b11fdb063374923f077bc1398f14d0e6455cf7dc64b8f1d2a6b6cee38c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'meta_prefix' => array($this, 'block_meta_prefix'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["meta_prefix"] = (($context["meta_prefix"]) ?? ($this->getAttribute($this->getAttribute($this->getAttribute(($context["scope"] ?? null), "meta", array()), ($context["meta_scope"] ?? null), array(), "array"), "prefix", array())));
        // line 2
        echo "
";
        // line 3
        $this->displayBlock('meta_prefix', $context, $blocks);
    }

    public function block_meta_prefix($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        if (($context["meta_prefix"] ?? null)) {
            // line 5
            echo "        <div class=\"wpfc-meta-prefix\">";
            echo twig_escape_filter($this->env, ($context["meta_prefix"] ?? null), "html", null, true);
            echo "</div>
    ";
        }
    }

    public function getTemplateName()
    {
        return "@particles/wpfc-assets/common/views/meta/prefix.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 5,  31 => 4,  25 => 3,  22 => 2,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@particles/wpfc-assets/common/views/meta/prefix.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/particles/wpfc-assets/common/views/meta/prefix.html.twig");
    }
}
