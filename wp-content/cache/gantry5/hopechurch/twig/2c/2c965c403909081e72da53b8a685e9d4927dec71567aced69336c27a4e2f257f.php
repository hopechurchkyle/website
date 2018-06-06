<?php

/* platform/content/content.html.twig */
class __TwigTemplate_78b9aabfbc375540f953a30cafccbf91c52032db225a1db276aa159e0bef599e extends Twig_Template
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
        $context["twigTemplate"] = "content.html.twig";
        // line 2
        echo "
<article class=\"";
        // line 3
        echo $this->getAttribute(($context["post"] ?? null), "class", array());
        echo " ";
        echo ($context["class_block"] ?? null);
        echo "\">
    <div class=\"";
        // line 4
        echo ($context["class_content"] ?? null);
        echo "\">
        
        ";
        // line 6
        $this->displayBlock('content', $context, $blocks);
        // line 23
        echo "        
    </div>
</article>";
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "
            ";
        // line 9
        echo "            ";
        $this->loadTemplate("platform/partials/featured-image.html.twig", "platform/content/content.html.twig", 9)->display($context);
        // line 10
        echo "
            ";
        // line 12
        echo "            <div class=\"entry-inner\">

                ";
        // line 15
        echo "                ";
        $this->loadTemplate("platform/partials/entry-header.html.twig", "platform/content/content.html.twig", 15)->display($context);
        // line 16
        echo "
                ";
        // line 18
        echo "                ";
        $this->loadTemplate("platform/partials/entry-content-pass.html.twig", "platform/content/content.html.twig", 18)->display($context);
        // line 19
        echo "
            </div>

        ";
    }

    public function getTemplateName()
    {
        return "platform/content/content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 19,  66 => 18,  63 => 16,  60 => 15,  56 => 12,  53 => 10,  50 => 9,  47 => 7,  44 => 6,  38 => 23,  36 => 6,  31 => 4,  25 => 3,  22 => 2,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "platform/content/content.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/platform/content/content.html.twig");
    }
}
