<?php

/* platform/partials/featured-image.html.twig */
class __TwigTemplate_785218533c6830e6a996d616bf3bd67b55fa8e87602ec80422b342f385e65cc0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'featured_image' => array($this, 'block_featured_image'),
            'featured_image_content' => array($this, 'block_featured_image_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["entry_image_enabled"] = (($context["entry_image_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".featured-image.enabled"), 1 => "1"), "method")));
        // line 2
        $context["entry_image_link"] = (($context["entry_image_link"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".featured-image.link"), 1 => ""), "method")));
        // line 3
        $context["entry_image_width"] = (($context["entry_image_width"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".featured-image.width"), 1 => "1150"), "method")));
        // line 4
        $context["entry_image_height"] = (($context["entry_image_height"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".featured-image.height"), 1 => "650"), "method")));
        // line 5
        echo "
";
        // line 6
        $this->displayBlock('featured_image', $context, $blocks);
    }

    public function block_featured_image($context, array $blocks = array())
    {
        // line 7
        echo "    ";
        if ((($context["entry_image_enabled"] ?? null) && $this->getAttribute($this->getAttribute(($context["post"] ?? null), "thumbnail", array()), "src", array()))) {
            // line 8
            echo "        <div class=\"post-thumbnail\">
            ";
            // line 9
            $this->displayBlock('featured_image_content', $context, $blocks);
            // line 18
            echo "        </div>
    ";
        }
    }

    // line 9
    public function block_featured_image_content($context, array $blocks = array())
    {
        // line 10
        echo "                ";
        if (($context["entry_image_link"] ?? null)) {
            // line 11
            echo "                    <a href=\"";
            echo $this->getAttribute(($context["post"] ?? null), "link", array());
            echo "\" title=\"";
            echo $this->getAttribute(($context["post"] ?? null), "title", array());
            echo "\">
                        <img src=\"";
            // line 12
            echo Timber\ImageHelper::resize($this->getAttribute($this->getAttribute(($context["post"] ?? null), "thumbnail", array()), "src", array()), ($context["entry_image_width"] ?? null), ($context["entry_image_height"] ?? null));
            echo "\" alt=\"";
            echo $this->getAttribute(($context["post"] ?? null), "title", array());
            echo "\">
                    </a>
                ";
        } else {
            // line 15
            echo "                    <img src=\"";
            echo Timber\ImageHelper::resize($this->getAttribute($this->getAttribute(($context["post"] ?? null), "thumbnail", array()), "src", array()), ($context["entry_image_width"] ?? null), ($context["entry_image_height"] ?? null));
            echo "\" alt=\"";
            echo $this->getAttribute(($context["post"] ?? null), "title", array());
            echo "\">
                ";
        }
        // line 17
        echo "            ";
    }

    public function getTemplateName()
    {
        return "platform/partials/featured-image.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 17,  73 => 15,  65 => 12,  58 => 11,  55 => 10,  52 => 9,  46 => 18,  44 => 9,  41 => 8,  38 => 7,  32 => 6,  29 => 5,  27 => 4,  25 => 3,  23 => 2,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "platform/partials/featured-image.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/platform/partials/featured-image.html.twig");
    }
}
