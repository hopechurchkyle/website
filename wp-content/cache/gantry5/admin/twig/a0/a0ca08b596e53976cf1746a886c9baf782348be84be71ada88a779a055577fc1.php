<?php

/* @gantry-admin/partials/php_unsupported.html.twig */
class __TwigTemplate_fb4f8782cfa2d53c96a1cb131cbc7dcc6229a45e61b21865f9b16ce7a0809410 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["php_version"] = twig_constant("PHP_VERSION");
        // line 2
        echo "
";
        // line 3
        if ((is_string($__internal_dc35860300db5145b6c2c0079cce81bb24775b60ff2c9cf3b4a2f4cdd7eb070b = ($context["php_version"] ?? null)) && is_string($__internal_6ed393368206bb6c545fb7ac79aa12fb6896ec15d9b004aae068e318592e0727 = "5.4") && ('' === $__internal_6ed393368206bb6c545fb7ac79aa12fb6896ec15d9b004aae068e318592e0727 || 0 === strpos($__internal_dc35860300db5145b6c2c0079cce81bb24775b60ff2c9cf3b4a2f4cdd7eb070b, $__internal_6ed393368206bb6c545fb7ac79aa12fb6896ec15d9b004aae068e318592e0727)))) {
            // line 4
            echo "<div class=\"g-grid\">
    <div class=\"g-block alert alert-warning g-php-outdated\">
        ";
            // line 6
            echo $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_PHP54_WARNING", ($context["php_version"] ?? null));
            echo "
    </div>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "@gantry-admin/partials/php_unsupported.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 6,  26 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@gantry-admin/partials/php_unsupported.html.twig", "/var/www/html/wp-content/plugins/gantry5/admin/templates/partials/php_unsupported.html.twig");
    }
}
