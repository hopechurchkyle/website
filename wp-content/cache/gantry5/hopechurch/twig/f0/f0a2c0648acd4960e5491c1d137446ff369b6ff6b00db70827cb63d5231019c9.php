<?php

/* @particles/wpfc-hero/views/content/content.html.twig */
class __TwigTemplate_89a92bae1047fb48b69ad7c2b0a2b88cfb172e394d9abe826901e4f87ed881a2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
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
        echo "    <div class=\"wpfc-item\" style=\"";
        echo twig_escape_filter($this->env, ($context["item_inline_style"] ?? null), "html", null, true);
        echo "\">

        ";
        // line 5
        echo "        ";
        $this->loadTemplate("@particles/wpfc-assets/wordpress/platform/views/partials/background-image.html.twig", "@particles/wpfc-hero/views/content/content.html.twig", 5)->display($context);
        // line 6
        echo "
        ";
        // line 8
        echo "        <div class=\"wpfc-inner-wrapper";
        echo twig_escape_filter($this->env, ($context["class_inner_wrapper"] ?? null), "html", null, true);
        echo "\">
            <div class=\"wpfc-inner\">

                ";
        // line 12
        echo "                ";
        $this->loadTemplate("@particles/wpfc-assets/wordpress/platform/views/partials/entry-title.html.twig", "@particles/wpfc-hero/views/content/content.html.twig", 12)->display($context);
        // line 13
        echo "
                ";
        // line 15
        echo "                ";
        $this->loadTemplate("@particles/wpfc-assets/wordpress/platform/views/partials/entry-meta.html.twig", "@particles/wpfc-hero/views/content/content.html.twig", 15)->display($context);
        // line 16
        echo "
                ";
        // line 18
        echo "                ";
        $this->loadTemplate("@particles/wpfc-assets/wordpress/platform/views/partials/entry-content.html.twig", "@particles/wpfc-hero/views/content/content.html.twig", 18)->display($context);
        // line 19
        echo "
                ";
        // line 21
        echo "                ";
        $this->loadTemplate("@particles/wpfc-assets/wordpress/platform/views/partials/readmore.html.twig", "@particles/wpfc-hero/views/content/content.html.twig", 21)->display($context);
        // line 22
        echo "                
            </div>
        </div>

    </div>
";
    }

    public function getTemplateName()
    {
        return "@particles/wpfc-hero/views/content/content.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  66 => 22,  63 => 21,  60 => 19,  57 => 18,  54 => 16,  51 => 15,  48 => 13,  45 => 12,  38 => 8,  35 => 6,  32 => 5,  26 => 2,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@particles/wpfc-hero/views/content/content.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/particles/wpfc-hero/views/content/content.html.twig");
    }
}
