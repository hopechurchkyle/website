<?php

/* @particles/wpfc-assets/common/views/partials/particle-header.html.twig */
class __TwigTemplate_3cbfd08641dfea9f2e1210cc908a1f85cae0b0fb6d54c22970a6e61b3159f35a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'particle_header' => array($this, 'block_particle_header'),
            'particle_header_content' => array($this, 'block_particle_header_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["particle_header_image"] = (($context["particle_header_image"]) ?? ($this->getAttribute($this->getAttribute(($context["scope"] ?? null), "header", array()), "image", array())));
        // line 2
        $context["particle_header_title_text"] = (($context["particle_header_title_text"]) ?? ($this->getAttribute($this->getAttribute($this->getAttribute(($context["scope"] ?? null), "header", array()), "title", array()), "text", array())));
        // line 3
        $context["particle_header_title_tag"] = (($context["particle_header_title_tag"]) ?? ((($this->getAttribute($this->getAttribute($this->getAttribute(($context["scope"] ?? null), "header", array(), "any", false, true), "title", array(), "any", false, true), "tag", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["scope"] ?? null), "header", array(), "any", false, true), "title", array(), "any", false, true), "tag", array()), "h4")) : ("h4"))));
        // line 4
        $context["particle_header_description_text"] = (($context["particle_header_description_text"]) ?? ($this->getAttribute($this->getAttribute($this->getAttribute(($context["scope"] ?? null), "header", array()), "description", array()), "text", array())));
        // line 5
        echo "
";
        // line 6
        $this->displayBlock('particle_header', $context, $blocks);
    }

    public function block_particle_header($context, array $blocks = array())
    {
        // line 7
        echo "    ";
        if ((($context["particle_header_title_text"] ?? null) || ($context["particle_header_description_text"] ?? null))) {
            // line 8
            echo "        <div class=\"wpfc-particle-header\">
            ";
            // line 9
            $this->displayBlock('particle_header_content', $context, $blocks);
            // line 28
            echo "        </div>
    ";
        }
    }

    // line 9
    public function block_particle_header_content($context, array $blocks = array())
    {
        // line 10
        echo "               ";
        if (($context["particle_header_image"] ?? null)) {
            // line 11
            echo "                   <div class=\"wpfc-image\">
                       <img src=\"";
            // line 12
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc(($context["particle_header_image"] ?? null)), "html", null, true);
            echo "\">
                   </div>
               ";
        }
        // line 15
        echo "               
                ";
        // line 17
        echo "                ";
        if (($context["particle_header_title_text"] ?? null)) {
            // line 18
            echo "                    <";
            echo twig_escape_filter($this->env, ($context["particle_header_title_tag"] ?? null), "html", null, true);
            echo " class=\"wpfc-widget-title\">
                        <span>";
            // line 19
            echo ($context["particle_header_title_text"] ?? null);
            echo "</span>
                    </";
            // line 20
            echo twig_escape_filter($this->env, ($context["particle_header_title_tag"] ?? null), "html", null, true);
            echo ">
                ";
        }
        // line 22
        echo "
                ";
        // line 24
        echo "                ";
        if (($context["particle_header_description_text"] ?? null)) {
            // line 25
            echo "                    <div class=\"wpfc-description\">";
            echo ($context["particle_header_description_text"] ?? null);
            echo "</div>
                ";
        }
        // line 27
        echo "            ";
    }

    public function getTemplateName()
    {
        return "@particles/wpfc-assets/common/views/partials/particle-header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 27,  93 => 25,  90 => 24,  87 => 22,  82 => 20,  78 => 19,  73 => 18,  70 => 17,  67 => 15,  61 => 12,  58 => 11,  55 => 10,  52 => 9,  46 => 28,  44 => 9,  41 => 8,  38 => 7,  32 => 6,  29 => 5,  27 => 4,  25 => 3,  23 => 2,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@particles/wpfc-assets/common/views/partials/particle-header.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/particles/wpfc-assets/common/views/partials/particle-header.html.twig");
    }
}
