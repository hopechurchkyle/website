<?php

/* @particles/wpfc-content/views/content/content.html.twig */
class __TwigTemplate_b6571dc243bddc26586faf15d05124cc04ed8f548f4ba995e16fbad70bac514b extends Twig_Template
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
        echo "<div class=\"g-content\">

    ";
        // line 3
        $this->displayBlock('content', $context, $blocks);
        // line 26
        echo "    
</div>";
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
        ";
        // line 6
        echo "        ";
        $this->loadTemplate("@particles/wpfc-assets/wordpress/platform/views/partials/featured-image.html.twig", "@particles/wpfc-content/views/content/content.html.twig", 6)->display($context);
        // line 7
        echo "
        ";
        // line 9
        echo "        <div class=\"wpfc-inner\">

            ";
        // line 12
        echo "            ";
        $this->loadTemplate("@particles/wpfc-assets/wordpress/platform/views/partials/entry-title.html.twig", "@particles/wpfc-content/views/content/content.html.twig", 12)->display($context);
        // line 13
        echo "
            ";
        // line 15
        echo "            ";
        $this->loadTemplate("@particles/wpfc-assets/wordpress/platform/views/partials/entry-meta.html.twig", "@particles/wpfc-content/views/content/content.html.twig", 15)->display($context);
        // line 16
        echo "
            ";
        // line 18
        echo "            ";
        $this->loadTemplate("@particles/wpfc-assets/wordpress/platform/views/partials/entry-content.html.twig", "@particles/wpfc-content/views/content/content.html.twig", 18)->display($context);
        // line 19
        echo "
            ";
        // line 21
        echo "            ";
        $this->loadTemplate("@particles/wpfc-assets/wordpress/platform/views/partials/readmore.html.twig", "@particles/wpfc-content/views/content/content.html.twig", 21)->display($context);
        // line 22
        echo "            
        </div>
      
    ";
    }

    public function getTemplateName()
    {
        return "@particles/wpfc-content/views/content/content.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  68 => 22,  65 => 21,  62 => 19,  59 => 18,  56 => 16,  53 => 15,  50 => 13,  47 => 12,  43 => 9,  40 => 7,  37 => 6,  34 => 4,  31 => 3,  26 => 26,  24 => 3,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@particles/wpfc-content/views/content/content.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/particles/wpfc-content/views/content/content.html.twig");
    }
}
