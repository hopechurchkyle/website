<?php

/* @particles/wpfc-assets/wordpress/platform/views/partials/featured-image.html.twig */
class __TwigTemplate_3afa5f89bc70858e29c80d2eebe8748ea656a0bd9c83338252fc4f37573abcbd extends Twig_Template
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
        $context["featured_image_enabled"] = (($context["featured_image_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["scope"] ?? null), "image", array()), "enabled", array())));
        // line 2
        $context["featured_image_width"] = (($context["featured_image_width"]) ?? ($this->getAttribute($this->getAttribute(($context["scope"] ?? null), "image", array()), "width", array())));
        // line 3
        $context["featured_image_height"] = (($context["featured_image_height"]) ?? ($this->getAttribute($this->getAttribute(($context["scope"] ?? null), "image", array()), "height", array())));
        // line 4
        $context["background_overlay_enabled"] = (($context["background_overlay_enabled"]) ?? ($this->getAttribute($this->getAttribute($this->getAttribute(($context["scope"] ?? null), "image", array()), "overlay", array()), "enabled", array())));
        // line 5
        echo "
";
        // line 6
        $context["width"] = ((($context["featured_image_width"] ?? null)) ? ((("width:" . ($context["featured_image_width"] ?? null)) . "px;")) : (""));
        // line 7
        $context["height"] = ((($context["featured_image_height"] ?? null)) ? ((("height:" . ($context["featured_image_height"] ?? null)) . "px;")) : (""));
        // line 8
        echo "
";
        // line 9
        $this->displayBlock('featured_image', $context, $blocks);
    }

    public function block_featured_image($context, array $blocks = array())
    {
        // line 10
        echo "    ";
        if ((($context["featured_image_enabled"] ?? null) && $this->getAttribute($this->getAttribute(($context["post"] ?? null), "thumbnail", array()), "src", array()))) {
            // line 11
            echo "        <div class=\"wpfc-post-thumbnail\">
            ";
            // line 12
            $this->displayBlock('featured_image_content', $context, $blocks);
            // line 23
            echo "        </div>
    ";
        }
    }

    // line 12
    public function block_featured_image_content($context, array $blocks = array())
    {
        // line 13
        echo "                ";
        if ((($context["featured_image_enabled"] ?? null) == "link")) {
            // line 14
            echo "                    <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["post"] ?? null), "link", array()), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["post"] ?? null), "title", array()), "html", null, true);
            echo "\">
                        <img src=\"";
            // line 15
            echo twig_escape_filter($this->env, Timber\ImageHelper::resize($this->getAttribute($this->getAttribute(($context["post"] ?? null), "thumbnail", array()), "src", array()), ($context["featured_image_width"] ?? null), ($context["featured_image_height"] ?? null)), "html", null, true);
            echo "\">
                        ";
            // line 16
            if (($context["background_overlay_enabled"] ?? null)) {
                echo "<div class=\"wpfc-background-overlay\"></div>";
            }
            // line 17
            echo "                    </a>
                ";
        } else {
            // line 19
            echo "                    <img src=\"";
            echo twig_escape_filter($this->env, Timber\ImageHelper::resize($this->getAttribute($this->getAttribute(($context["post"] ?? null), "thumbnail", array()), "src", array()), ($context["featured_image_width"] ?? null), ($context["featured_image_height"] ?? null)), "html", null, true);
            echo "\">
                    ";
            // line 20
            if (($context["background_overlay_enabled"] ?? null)) {
                echo "<div class=\"wpfc-background-overlay\"></div>";
            }
            // line 21
            echo "                ";
        }
        // line 22
        echo "            ";
    }

    public function getTemplateName()
    {
        return "@particles/wpfc-assets/wordpress/platform/views/partials/featured-image.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  96 => 22,  93 => 21,  89 => 20,  84 => 19,  80 => 17,  76 => 16,  72 => 15,  65 => 14,  62 => 13,  59 => 12,  53 => 23,  51 => 12,  48 => 11,  45 => 10,  39 => 9,  36 => 8,  34 => 7,  32 => 6,  29 => 5,  27 => 4,  25 => 3,  23 => 2,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@particles/wpfc-assets/wordpress/platform/views/partials/featured-image.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/particles/wpfc-assets/wordpress/platform/views/partials/featured-image.html.twig");
    }
}
