<?php

/* platform/content/content-page.html.twig */
class __TwigTemplate_04152d0594da40b19fd52db87c393b01696d6282c4b6fcc6600b7b6c28e0e114 extends Twig_Template
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
        $context["twigTemplate"] = "content-page.html.twig";
        // line 2
        echo "
<article class=\"";
        // line 3
        echo $this->getAttribute(($context["post"] ?? null), "class", array());
        echo "\">

    ";
        // line 5
        $this->displayBlock('content', $context, $blocks);
        // line 35
        echo "    
</article>";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "        
        ";
        // line 8
        echo "        <div class=\"entry-wrapper\">

            ";
        // line 11
        echo "            ";
        $this->loadTemplate("platform/partials/featured-image.html.twig", "platform/content/content-page.html.twig", 11)->display($context);
        // line 12
        echo "
            ";
        // line 14
        echo "            <div class=\"entry-inner\">
        
                ";
        // line 17
        echo "                ";
        $this->loadTemplate("platform/partials/entry-header.html.twig", "platform/content/content-page.html.twig", 17)->display($context);
        // line 18
        echo "
                ";
        // line 20
        echo "                ";
        $this->loadTemplate("platform/partials/paged-content-pass.html.twig", "platform/content/content-page.html.twig", 20)->display($context);
        // line 21
        echo "
            </div>
            ";
        // line 24
        echo "
        </div>
        ";
        // line 27
        echo "
        ";
        // line 29
        echo "        ";
        $this->loadTemplate("platform/partials/entry-author.html.twig", "platform/content/content-page.html.twig", 29)->display($context);
        // line 30
        echo "
        ";
        // line 32
        echo "        ";
        $this->loadTemplate("platform/partials/entry-nav.html.twig", "platform/content/content-page.html.twig", 32)->display($context);
        // line 33
        echo "
    ";
    }

    public function getTemplateName()
    {
        return "platform/content/content-page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 33,  83 => 32,  80 => 30,  77 => 29,  74 => 27,  70 => 24,  66 => 21,  63 => 20,  60 => 18,  57 => 17,  53 => 14,  50 => 12,  47 => 11,  43 => 8,  40 => 6,  37 => 5,  32 => 35,  30 => 5,  25 => 3,  22 => 2,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "platform/content/content-page.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/platform/content/content-page.html.twig");
    }
}
