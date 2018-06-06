<?php

/* @particles/wpfc-assets/common/views/meta/comments-type.html.twig */
class __TwigTemplate_3ef07347651a78177ae1d03b899630e16f855a962d097d8a9804d2113d733b4b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'meta_comments_type' => array($this, 'block_meta_comments_type'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["particle_type"] = (($context["particle_type"]) ?? (""));
        // line 2
        echo "
";
        // line 3
        $this->displayBlock('meta_comments_type', $context, $blocks);
    }

    public function block_meta_comments_type($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        if ((($context["particle_type"] ?? null) == "static")) {
            // line 5
            echo "        ";
            $this->loadTemplate("@particles/wpfc-assets/common/views/meta/comments.html.twig", "@particles/wpfc-assets/common/views/meta/comments-type.html.twig", 5)->display($context);
            // line 6
            echo "    ";
        } else {
            // line 7
            echo "        ";
            $this->loadTemplate("@particles/wpfc-assets/wordpress/platform/views/meta/comments.html.twig", "@particles/wpfc-assets/common/views/meta/comments-type.html.twig", 7)->display($context);
            // line 8
            echo "    ";
        }
    }

    public function getTemplateName()
    {
        return "@particles/wpfc-assets/common/views/meta/comments-type.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 8,  40 => 7,  37 => 6,  34 => 5,  31 => 4,  25 => 3,  22 => 2,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@particles/wpfc-assets/common/views/meta/comments-type.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/particles/wpfc-assets/common/views/meta/comments-type.html.twig");
    }
}
