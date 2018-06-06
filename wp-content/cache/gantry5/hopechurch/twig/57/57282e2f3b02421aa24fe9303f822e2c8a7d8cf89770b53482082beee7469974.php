<?php

/* base-archive.html.twig */
class __TwigTemplate_0241446a670fa7bce0be255fec7b4fbdd809f7f1e930ea9a3d3653b652935776 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("partials/page.html.twig", "base-archive.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'header' => array($this, 'block_header'),
            'entries' => array($this, 'block_entries'),
            'pagination' => array($this, 'block_pagination'),
            'notice' => array($this, 'block_notice'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "partials/page.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["twigTemplate"] = "base-archive.html.twig";
        // line 4
        $context["platform_class"] = (($context["platform_class"]) ?? ("platform-wordpress"));
        // line 6
        $context["content"] = (($context["content"]) ?? ("content"));
        // line 7
        $context["columns"] = $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".grid.columns"), 1 => "1"), "method");
        // line 8
        $context["size"] = ("size-" . twig_replace_filter(twig_number_format_filter($this->env, (100 / ((array_key_exists("columns", $context)) ? (_twig_default_filter(($context["columns"] ?? null), "1")) : ("1"))), 1, "-"), array("-0" => "")));
        // line 9
        $context["tablet_size"] = $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".grid.tablet.columns"), 1 => "tablet-default"), "method");
        // line 10
        $context["phone_size"] = $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".grid.phone.columns"), 1 => "phone-default"), "method");
        // line 12
        $context["class_grid"] = (($context["class_grid"]) ?? ("g-grid"));
        // line 13
        $context["class_block"] = (($context["class_block"]) ?? (twig_join_filter(array(0 => "g-block equal-height", 1 => ($context["size"] ?? null), 2 => ($context["tablet_size"] ?? null), 3 => ($context["phone_size"] ?? null)), " ")));
        // line 14
        $context["class_content"] = (($context["class_content"]) ?? ("g-content"));
        // line 16
        $context["route"] = (($context["route"]) ?? ("platform"));
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 18
    public function block_content($context, array $blocks = array())
    {
        // line 19
        echo "
    <div class=\"platform-content ";
        // line 20
        echo ($context["platform_class"] ?? null);
        echo "\">
        <div class=\"";
        // line 21
        echo ($context["scope"] ?? null);
        echo "\">

            ";
        // line 24
        echo "            ";
        $this->displayBlock('header', $context, $blocks);
        // line 27
        echo "            
            ";
        // line 28
        if ( !twig_test_empty(($context["posts"] ?? null))) {
            // line 29
            echo "
                ";
            // line 31
            echo "                ";
            $this->displayBlock('entries', $context, $blocks);
            // line 42
            echo "
                ";
            // line 44
            echo "                ";
            $this->displayBlock('pagination', $context, $blocks);
            // line 49
            echo "
            ";
        } else {
            // line 51
            echo "
                ";
            // line 53
            echo "                ";
            $this->displayBlock('notice', $context, $blocks);
            // line 58
            echo "
            ";
        }
        // line 60
        echo "            
        </div>
    </div>
    
";
    }

    // line 24
    public function block_header($context, array $blocks = array())
    {
        // line 25
        echo "                ";
        $this->loadTemplate("platform/partials/page-header.html.twig", "base-archive.html.twig", 25)->display($context);
        // line 26
        echo "            ";
    }

    // line 31
    public function block_entries($context, array $blocks = array())
    {
        // line 32
        echo "                    <section class=\"entries ";
        echo ($context["class_grid"] ?? null);
        echo "\">
                        ";
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["posts"] ?? null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 34
            echo "                            ";
            $context["route_scope"] = (((($context["route"] ?? null) . "/content/content-") . ($context["scope"] ?? null)) . ".html.twig");
            // line 35
            echo "                            ";
            $context["route_format"] = (((($context["route"] ?? null) . "/content/content-") . $this->getAttribute($context["post"], "format", array())) . ".html.twig");
            // line 36
            echo "                            ";
            $context["route_default"] = (((($context["route"] ?? null) . "/content/") . ($context["content"] ?? null)) . ".html.twig");
            // line 37
            echo "
                            ";
            // line 38
            $this->loadTemplate(array(0 => ($context["route_scope"] ?? null), 1 => ($context["route_format"] ?? null), 2 => ($context["route_default"] ?? null)), "base-archive.html.twig", 38)->display($context);
            // line 39
            echo "                        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "                    </section>
                ";
    }

    // line 44
    public function block_pagination($context, array $blocks = array())
    {
        // line 45
        echo "                    ";
        if (($this->getAttribute(($context["pagination"] ?? null), "pages", array()) && (twig_length_filter($this->env, $this->getAttribute(($context["pagination"] ?? null), "pages", array())) > 1))) {
            // line 46
            echo "                        ";
            $this->loadTemplate("platform/partials/pagination.html.twig", "base-archive.html.twig", 46)->display($context);
            // line 47
            echo "                    ";
        }
        // line 48
        echo "                ";
    }

    // line 53
    public function block_notice($context, array $blocks = array())
    {
        // line 54
        echo "                    <div class=\"no-matches-notice\">
                        <h3>";
        // line 55
        echo call_user_func_array($this->env->getFunction('__')->getCallable(), array("Sorry, but there are not any posts matching your query.", "wpfc-core"));
        echo "</h3>
                    </div>
                ";
    }

    public function getTemplateName()
    {
        return "base-archive.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  202 => 55,  199 => 54,  196 => 53,  192 => 48,  189 => 47,  186 => 46,  183 => 45,  180 => 44,  175 => 40,  161 => 39,  159 => 38,  156 => 37,  153 => 36,  150 => 35,  147 => 34,  130 => 33,  125 => 32,  122 => 31,  118 => 26,  115 => 25,  112 => 24,  104 => 60,  100 => 58,  97 => 53,  94 => 51,  90 => 49,  87 => 44,  84 => 42,  81 => 31,  78 => 29,  76 => 28,  73 => 27,  70 => 24,  65 => 21,  61 => 20,  58 => 19,  55 => 18,  51 => 1,  49 => 16,  47 => 14,  45 => 13,  43 => 12,  41 => 10,  39 => 9,  37 => 8,  35 => 7,  33 => 6,  31 => 4,  29 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "base-archive.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/base-archive.html.twig");
    }
}
