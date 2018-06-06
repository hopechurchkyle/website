<?php

/* partials/page_head.html.twig */
class __TwigTemplate_c1b902d91623f1abdc178a28338eb8c493e8e5cb0f00bdc786f07cdb8d511a8f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@nucleus/page_head.html.twig", "partials/page_head.html.twig", 1);
        $this->blocks = array(
            'head_title' => array($this, 'block_head_title'),
            'head_application' => array($this, 'block_head_application'),
            'head_platform' => array($this, 'block_head_platform'),
            'head' => array($this, 'block_head'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@nucleus/page_head.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_head_title($context, array $blocks = array())
    {
        // line 4
        echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["site"] ?? null), "charset", array()), "html", null, true);
        echo "\" />
    <link rel=\"profile\" href=\"http://gmpg.org/xfn/11\" />
    <link rel=\"pingback\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute(($context["site"] ?? null), "pingback_url", array()), "html", null, true);
        echo "\" />";
    }

    // line 9
    public function block_head_application($context, array $blocks = array())
    {
        // line 10
        echo ($context["wp_head"] ?? null);
    }

    // line 13
    public function block_head_platform($context, array $blocks = array())
    {
        // line 14
        $this->displayParentBlock("head_platform", $context, $blocks);
        echo "
    <link rel=\"stylesheet\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("gantry-engine://css-compiled/wordpress.css"), "html", null, true);
        echo "\" type=\"text/css\" />
    <link rel=\"stylesheet\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("gantry-theme://style.css"), "html", null, true);
        echo "\" type=\"text/css\" />";
    }

    // line 19
    public function block_head($context, array $blocks = array())
    {
        // line 20
        $this->displayParentBlock("head", $context, $blocks);
    }

    public function getTemplateName()
    {
        return "partials/page_head.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 20,  68 => 19,  63 => 16,  59 => 15,  55 => 14,  52 => 13,  48 => 10,  45 => 9,  40 => 6,  34 => 4,  31 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "partials/page_head.html.twig", "/var/www/html/wp-content/plugins/gantry5/engines/nucleus/views/partials/page_head.html.twig");
    }
}
