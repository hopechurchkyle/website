<?php

/* @gantry-admin/partials/ajax.html.twig */
class __TwigTemplate_0dac0b885c198ec9c589c474fa9a1ec129f10cbddab608f90e0edf471fd8af14 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'gantry_content_wrapper' => array($this, 'block_gantry_content_wrapper'),
            'gantry' => array($this, 'block_gantry'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('content', $context, $blocks);
    }

    public function block_content($context, array $blocks = array())
    {
        // line 2
        $this->displayBlock('gantry_content_wrapper', $context, $blocks);
    }

    public function block_gantry_content_wrapper($context, array $blocks = array())
    {
        // line 3
        echo "    ";
        if (($context["navbar"] ?? null)) {
            // line 4
            echo "    <div data-g5-content-wrapper=\"\">
        ";
            // line 5
            $this->loadTemplate("@gantry-admin/partials/navigation.html.twig", "@gantry-admin/partials/ajax.html.twig", 5)->display($context);
            // line 6
            echo "        <div class=\"g-grid\">
            <div class=\"g-block main-block\">
                <section id=\"g-main\">
                    <div class=\"g-content\" data-g5-content=\"\">
                        ";
            // line 10
            $this->displayBlock('gantry', $context, $blocks);
            // line 12
            echo "                    </div>
                </section>
            </div>
        </div>
    </div>
    ";
        } else {
            // line 18
            echo "        ";
            $this->displayBlock("gantry", $context, $blocks);
            echo "
    ";
        }
    }

    // line 10
    public function block_gantry($context, array $blocks = array())
    {
        // line 11
        echo "                        ";
    }

    public function getTemplateName()
    {
        return "@gantry-admin/partials/ajax.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  69 => 11,  66 => 10,  58 => 18,  50 => 12,  48 => 10,  42 => 6,  40 => 5,  37 => 4,  34 => 3,  28 => 2,  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@gantry-admin/partials/ajax.html.twig", "/var/www/html/wp-content/plugins/gantry5/admin/templates/partials/ajax.html.twig");
    }
}
