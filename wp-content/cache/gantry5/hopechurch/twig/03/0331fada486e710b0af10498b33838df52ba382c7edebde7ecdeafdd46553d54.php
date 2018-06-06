<?php

/* wpfc-sermon/partials/featured-image.html.twig */
class __TwigTemplate_12038b57ae1c553deb3d183c9d275708c4b4eb73259b4f12f49a5a98b61cbf5b extends Twig_Template
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
        $context["sermon_image_args"] = array("image_size" => "full", "post_id" => $this->getAttribute(        // line 8
($context["post"] ?? null), "ID", array()));
        // line 10
        $context["sermon_images"] = call_user_func_array($this->env->getFilter('apply_filters')->getCallable(), array(($context["image"] ?? null), "sermon-images-get-the-terms", ($context["sermon_image_args"] ?? null)));
        // line 11
        $context["entry_image"] = ((($this->getAttribute($this->getAttribute(($context["post"] ?? null), "thumbnail", array(), "any", false, true), "src", array(), "any", true, true) &&  !(null === $this->getAttribute($this->getAttribute(($context["post"] ?? null), "thumbnail", array(), "any", false, true), "src", array())))) ? ($this->getAttribute($this->getAttribute(($context["post"] ?? null), "thumbnail", array(), "any", false, true), "src", array())) : ($this->getAttribute(call_user_func_array($this->env->getFunction('TimberImage')->getCallable(), array($this->getAttribute($this->getAttribute(($context["sermon_images"] ?? null), 0, array()), "image_id", array()))), "src", array())));
        // line 12
        echo "
";
        // line 13
        $this->displayBlock('featured_image', $context, $blocks);
    }

    public function block_featured_image($context, array $blocks = array())
    {
        // line 14
        echo "    ";
        if ((($context["entry_image_enabled"] ?? null) && ($context["entry_image"] ?? null))) {
            // line 15
            echo "        <div class=\"post-thumbnail\">
            ";
            // line 16
            $this->displayBlock('featured_image_content', $context, $blocks);
            // line 25
            echo "        </div>
    ";
        }
    }

    // line 16
    public function block_featured_image_content($context, array $blocks = array())
    {
        // line 17
        echo "                ";
        if (($context["entry_image_link"] ?? null)) {
            // line 18
            echo "                    <a href=\"";
            echo $this->getAttribute(($context["post"] ?? null), "link", array());
            echo "\" title=\"";
            echo $this->getAttribute(($context["post"] ?? null), "title", array());
            echo "\">
                        <img src=\"";
            // line 19
            echo Timber\ImageHelper::resize(($context["entry_image"] ?? null), ($context["entry_image_width"] ?? null), ($context["entry_image_height"] ?? null));
            echo "\" alt=\"";
            echo $this->getAttribute(($context["post"] ?? null), "title", array());
            echo "\">
                    </a>
                ";
        } else {
            // line 22
            echo "                    <img src=\"";
            echo Timber\ImageHelper::resize(($context["entry_image"] ?? null), ($context["entry_image_width"] ?? null), ($context["entry_image_height"] ?? null));
            echo "\" alt=\"";
            echo $this->getAttribute(($context["post"] ?? null), "title", array());
            echo "\">
                ";
        }
        // line 24
        echo "            ";
    }

    public function getTemplateName()
    {
        return "wpfc-sermon/partials/featured-image.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 24,  83 => 22,  75 => 19,  68 => 18,  65 => 17,  62 => 16,  56 => 25,  54 => 16,  51 => 15,  48 => 14,  42 => 13,  39 => 12,  37 => 11,  35 => 10,  33 => 8,  32 => 6,  29 => 5,  27 => 4,  25 => 3,  23 => 2,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "wpfc-sermon/partials/featured-image.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/wpfc-sermon/partials/featured-image.html.twig");
    }
}
