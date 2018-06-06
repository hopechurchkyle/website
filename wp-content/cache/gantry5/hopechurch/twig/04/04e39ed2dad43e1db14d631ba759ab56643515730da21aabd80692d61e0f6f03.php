<?php

/* @particles/custom.html.twig */
class __TwigTemplate_4820feef3a76454a3883b277bf0098daa801b1c81a19130e19bf3f8e8f5569f5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@nucleus/partials/particle.html.twig", "@particles/custom.html.twig", 1);
        $this->blocks = array(
            'particle' => array($this, 'block_particle'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@nucleus/partials/particle.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_particle($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $context["html"] = (($this->getAttribute(($context["particle"] ?? null), "twig", array())) ? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "theme", array()), "compile", array(0 => $this->getAttribute(($context["particle"] ?? null), "html", array())), "method")) : ($this->getAttribute(($context["particle"] ?? null), "html", array())));
        // line 5
        echo "    ";
        echo $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->htmlFilter((($this->getAttribute(($context["particle"] ?? null), "filter", array())) ? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "platform", array()), "filter", array(0 => ($context["html"] ?? null)), "method")) : (($context["html"] ?? null))));
        echo "
";
    }

    public function getTemplateName()
    {
        return "@particles/custom.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@particles/custom.html.twig", "/var/www/html/wp-content/plugins/gantry5/engines/nucleus/particles/custom.html.twig");
    }
}
