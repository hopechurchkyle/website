<?php

/* wpfc-sermon/content/content.html.twig */
class __TwigTemplate_cacb66dc953eea94ad58ab76dfa72538ae9e57ff8c8688a7a9aac90644d05bc7 extends Twig_Template
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
        echo "<article class=\"";
        echo $this->getAttribute(($context["post"] ?? null), "class", array());
        echo " ";
        echo ($context["class_block"] ?? null);
        echo "\">
    <div class=\"";
        // line 2
        echo ($context["class_content"] ?? null);
        echo "\">
        
        ";
        // line 4
        $this->displayBlock('content', $context, $blocks);
        // line 32
        echo "        
    </div>
</article>";
    }

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "
            ";
        // line 7
        echo "            ";
        $this->loadTemplate("wpfc-sermon/partials/featured-image.html.twig", "wpfc-sermon/content/content.html.twig", 7)->display($context);
        // line 8
        echo "
            ";
        // line 10
        echo "            <div class=\"entry-inner\">

                ";
        // line 13
        echo "                ";
        $this->loadTemplate("wpfc-sermon/meta/avatar.html.twig", "wpfc-sermon/content/content.html.twig", 13)->display($context);
        // line 14
        echo "
                ";
        // line 16
        echo "                ";
        $this->loadTemplate("wpfc-sermon/meta/date.html.twig", "wpfc-sermon/content/content.html.twig", 16)->display($context);
        // line 17
        echo "
                ";
        // line 19
        echo "                ";
        $this->loadTemplate("platform/partials/entry-title.html.twig", "wpfc-sermon/content/content.html.twig", 19)->display($context);
        // line 20
        echo "
                ";
        // line 22
        echo "                ";
        $this->loadTemplate("wpfc-sermon/meta/preacher.html.twig", "wpfc-sermon/content/content.html.twig", 22)->display($context);
        // line 23
        echo "                ";
        $this->loadTemplate("wpfc-sermon/meta/series.html.twig", "wpfc-sermon/content/content.html.twig", 23)->display($context);
        // line 24
        echo "                ";
        $this->loadTemplate("wpfc-sermon/meta/book.html.twig", "wpfc-sermon/content/content.html.twig", 24)->display($context);
        // line 25
        echo "                ";
        $this->loadTemplate("wpfc-sermon/meta/service.html.twig", "wpfc-sermon/content/content.html.twig", 25)->display($context);
        // line 26
        echo "                ";
        $this->loadTemplate("wpfc-sermon/meta/topics.html.twig", "wpfc-sermon/content/content.html.twig", 26)->display($context);
        // line 27
        echo "                ";
        $this->loadTemplate("wpfc-sermon/meta/passage.html.twig", "wpfc-sermon/content/content.html.twig", 27)->display($context);
        // line 28
        echo "
            </div>
            
        ";
    }

    public function getTemplateName()
    {
        return "wpfc-sermon/content/content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 28,  89 => 27,  86 => 26,  83 => 25,  80 => 24,  77 => 23,  74 => 22,  71 => 20,  68 => 19,  65 => 17,  62 => 16,  59 => 14,  56 => 13,  52 => 10,  49 => 8,  46 => 7,  43 => 5,  40 => 4,  34 => 32,  32 => 4,  27 => 2,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "wpfc-sermon/content/content.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/wpfc-sermon/content/content.html.twig");
    }
}
