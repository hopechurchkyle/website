<?php

/* @particles/wpfc-assets/wordpress/platform/views/partials/background-image.html.twig */
class __TwigTemplate_88e43e4ea4d9e1590026ce3cb52968b21e7b9614bebe96fd64a4ec75d56589ac extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'background_image' => array($this, 'block_background_image'),
            'background_image_content' => array($this, 'block_background_image_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["background_image_enabled"] = (($context["background_image_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["scope"] ?? null), "image", array()), "enabled", array())));
        // line 2
        $context["background_get_image"] = ((($this->getAttribute($this->getAttribute(($context["post"] ?? null), "thumbnail", array(), "any", false, true), "src", array(), "any", true, true) &&  !(null === $this->getAttribute($this->getAttribute(($context["post"] ?? null), "thumbnail", array(), "any", false, true), "src", array())))) ? ($this->getAttribute($this->getAttribute(($context["post"] ?? null), "thumbnail", array(), "any", false, true), "src", array())) : ($this->getAttribute($this->getAttribute(($context["scope"] ?? null), "image", array()), "fallback", array())));
        // line 3
        $context["background_image"] = (("background-image: url(" . ($context["background_get_image"] ?? null)) . ");");
        // line 4
        $context["background_size"] = (($this->getAttribute($this->getAttribute($this->getAttribute(($context["scope"] ?? null), "image", array()), "background", array()), "size", array())) ? ((("background-size:" . $this->getAttribute($this->getAttribute($this->getAttribute(($context["scope"] ?? null), "image", array()), "background", array()), "size", array())) . ";")) : (""));
        // line 5
        $context["background_repeat"] = (($this->getAttribute($this->getAttribute($this->getAttribute(($context["scope"] ?? null), "image", array()), "background", array()), "repeat", array())) ? ((("background-repeat:" . $this->getAttribute($this->getAttribute($this->getAttribute(($context["scope"] ?? null), "image", array()), "background", array()), "repeat", array())) . ";")) : (""));
        // line 6
        $context["background_position"] = (($this->getAttribute($this->getAttribute($this->getAttribute(($context["scope"] ?? null), "image", array()), "background", array()), "position", array())) ? ((("background-position:" . $this->getAttribute($this->getAttribute($this->getAttribute(($context["scope"] ?? null), "image", array()), "background", array()), "position", array())) . ";")) : (""));
        // line 7
        $context["background_inline_style"] = twig_join_filter(array(0 => ($context["background_image"] ?? null), 1 => ($context["background_size"] ?? null), 2 => ($context["background_repeat"] ?? null), 3 => ($context["background_position"] ?? null)), "");
        // line 8
        $context["background_overlay_enabled"] = (($context["background_overlay_enabled"]) ?? ($this->getAttribute($this->getAttribute($this->getAttribute(($context["scope"] ?? null), "image", array()), "overlay", array()), "enabled", array())));
        // line 9
        echo "
";
        // line 10
        $this->displayBlock('background_image', $context, $blocks);
    }

    public function block_background_image($context, array $blocks = array())
    {
        // line 11
        echo "    ";
        if ((($context["background_image_enabled"] ?? null) && ($context["background_image"] ?? null))) {
            // line 12
            echo "        <div class=\"wpfc-post-thumbnail\">
            ";
            // line 13
            $this->displayBlock('background_image_content', $context, $blocks);
            // line 24
            echo "        </div>
    ";
        }
    }

    // line 13
    public function block_background_image_content($context, array $blocks = array())
    {
        // line 14
        echo "                ";
        if ((($context["background_image_enabled"] ?? null) == "link")) {
            // line 15
            echo "                    <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["post"] ?? null), "link", array()), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["post"] ?? null), "title", array()), "html", null, true);
            echo "\">
                        <div class=\"wpfc-background-image\" style=\"";
            // line 16
            echo twig_escape_filter($this->env, ($context["background_inline_style"] ?? null), "html", null, true);
            echo "\"></div>
                        ";
            // line 17
            if (($context["background_overlay_enabled"] ?? null)) {
                echo "<div class=\"wpfc-background-overlay\"></div>";
            }
            // line 18
            echo "                    </a>
                ";
        } else {
            // line 20
            echo "                    <div class=\"wpfc-background-image\" style=\"";
            echo twig_escape_filter($this->env, ($context["background_inline_style"] ?? null), "html", null, true);
            echo "\"></div>
                    ";
            // line 21
            if (($context["background_overlay_enabled"] ?? null)) {
                echo "<div class=\"wpfc-background-overlay\"></div>";
            }
            // line 22
            echo "                ";
        }
        // line 23
        echo "            ";
    }

    public function getTemplateName()
    {
        return "@particles/wpfc-assets/wordpress/platform/views/partials/background-image.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 23,  94 => 22,  90 => 21,  85 => 20,  81 => 18,  77 => 17,  73 => 16,  66 => 15,  63 => 14,  60 => 13,  54 => 24,  52 => 13,  49 => 12,  46 => 11,  40 => 10,  37 => 9,  35 => 8,  33 => 7,  31 => 6,  29 => 5,  27 => 4,  25 => 3,  23 => 2,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@particles/wpfc-assets/wordpress/platform/views/partials/background-image.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/particles/wpfc-assets/wordpress/platform/views/partials/background-image.html.twig");
    }
}
