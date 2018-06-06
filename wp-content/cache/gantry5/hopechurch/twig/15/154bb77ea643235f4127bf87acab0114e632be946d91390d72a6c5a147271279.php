<?php

/* @particles/wpfc-hero.html.twig */
class __TwigTemplate_1baa6db60be5007f5bc898ee6ce0165a28efe27c3b1ab2d79e891dbeacc5fdce extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@nucleus/partials/particle.html.twig", "@particles/wpfc-hero.html.twig", 1);
        $this->blocks = array(
            'particle' => array($this, 'block_particle'),
            'particle_content' => array($this, 'block_particle_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@nucleus/partials/particle.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_particle($context, array $blocks = array())
    {
        // line 4
        echo "
    ";
        // line 6
        echo "    ";
        $context["scope"] = ($context["particle"] ?? null);
        // line 7
        echo "    ";
        $context["settings"] = $this->getAttribute(($context["particle"] ?? null), "settings", array());
        // line 8
        echo "
    ";
        // line 10
        echo "    ";
        $context["post"] = $this->getAttribute(($context["wordpress"] ?? null), "call", array(0 => "Timber::get_post"), "method");
        // line 11
        echo "
    ";
        // line 13
        echo "    ";
        $context["content"] = $this->getAttribute(($context["settings"] ?? null), "style", array());
        // line 14
        echo "    ";
        $context["class_inner_wrapper"] = " wpfc-container";
        // line 15
        echo "    ";
        $context["item_height"] = (($this->getAttribute(($context["settings"] ?? null), "height", array())) ? ((("height:" . $this->getAttribute(($context["settings"] ?? null), "height", array())) . ";")) : (""));
        // line 16
        echo "    ";
        $context["item_background"] = (($this->getAttribute(($context["settings"] ?? null), "background", array())) ? ((("background-color:" . $this->getAttribute(($context["settings"] ?? null), "background", array())) . ";")) : (""));
        // line 17
        echo "    ";
        $context["item_color"] = (($this->getAttribute(($context["settings"] ?? null), "color", array())) ? ((("color:" . $this->getAttribute(($context["settings"] ?? null), "color", array())) . ";")) : (""));
        // line 18
        echo "    ";
        $context["item_inline_style"] = twig_join_filter(array(0 => ($context["item_height"] ?? null), 1 => ($context["item_background"] ?? null), 2 => ($context["item_color"] ?? null)), "");
        // line 19
        echo "    
    ";
        // line 21
        echo "    ";
        if (call_user_func_array($this->env->getFunction('function')->getCallable(), array("is_single"))) {
            // line 22
            echo "        <div class=\"";
            echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
            echo " wpfc-style-";
            echo twig_escape_filter($this->env, ($context["content"] ?? null), "html", null, true);
            echo "\">
            ";
            // line 23
            $this->displayBlock('particle_content', $context, $blocks);
            // line 28
            echo "        </div>
    ";
        }
        // line 30
        echo "
";
    }

    // line 23
    public function block_particle_content($context, array $blocks = array())
    {
        // line 24
        echo "                <div class=\"wpfc-items\">
                    ";
        // line 25
        $this->loadTemplate((("@particles/wpfc-hero/views/content/" . ($context["content"] ?? null)) . ".html.twig"), "@particles/wpfc-hero.html.twig", 25)->display($context);
        // line 26
        echo "                </div>
            ";
    }

    public function getTemplateName()
    {
        return "@particles/wpfc-hero.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  100 => 26,  98 => 25,  95 => 24,  92 => 23,  87 => 30,  83 => 28,  81 => 23,  74 => 22,  71 => 21,  68 => 19,  65 => 18,  62 => 17,  59 => 16,  56 => 15,  53 => 14,  50 => 13,  47 => 11,  44 => 10,  41 => 8,  38 => 7,  35 => 6,  32 => 4,  29 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@particles/wpfc-hero.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/particles/wpfc-hero.html.twig");
    }
}
