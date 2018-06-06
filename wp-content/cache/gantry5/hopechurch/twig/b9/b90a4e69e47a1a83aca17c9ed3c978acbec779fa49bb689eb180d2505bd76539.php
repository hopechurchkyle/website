<?php

/* @particles/wpfc-content-grid.html.twig */
class __TwigTemplate_479b167a8404acc09c50450f59309f40c1fea10923a0ae73089171e892c61d01 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@nucleus/partials/particle.html.twig", "@particles/wpfc-content-grid.html.twig", 1);
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
        $context["query"] = $this->getAttribute(($context["particle"] ?? null), "query", array());
        // line 8
        echo "    ";
        $context["sort"] = $this->getAttribute(($context["particle"] ?? null), "sort", array());
        // line 9
        echo "    ";
        $context["grid"] = $this->getAttribute(($context["particle"] ?? null), "grid", array());
        // line 10
        echo "    ";
        $context["settings"] = $this->getAttribute(($context["particle"] ?? null), "settings", array());
        // line 11
        echo "
    ";
        // line 13
        echo "    ";
        $context["query_parameters"] = array("post_status" => "publish", "posts_per_page" => $this->getAttribute(        // line 15
($context["query"] ?? null), "posts", array()), "offset" => $this->getAttribute(        // line 16
($context["query"] ?? null), "offset", array()), "orderby" => $this->getAttribute(        // line 17
($context["sort"] ?? null), "orderby", array()), "order" => $this->getAttribute(        // line 18
($context["sort"] ?? null), "ordering", array()), "cat" => twig_replace_filter($this->getAttribute(        // line 19
($context["query"] ?? null), "categories", array()), " ", ","), "tag_id" => twig_replace_filter($this->getAttribute(        // line 20
($context["query"] ?? null), "tags", array()), " ", ","), "ignore_sticky_posts" => (($this->getAttribute(        // line 21
($context["query"] ?? null), "sticky", array())) ? (true) : (false)));
        // line 23
        echo "
    ";
        // line 25
        echo "    ";
        $context["posts"] = $this->getAttribute(($context["wordpress"] ?? null), "call", array(0 => "Timber::get_posts", 1 => ($context["query_parameters"] ?? null)), "method");
        // line 26
        echo "
    ";
        // line 28
        echo "    ";
        $context["content"] = $this->getAttribute(($context["settings"] ?? null), "style", array());
        // line 29
        echo "    ";
        $context["size"] = ("size-" . twig_replace_filter(twig_number_format_filter($this->env, (100 / $this->getAttribute(($context["grid"] ?? null), "columns", array())), 1, "-"), array("-0" => "")));
        // line 30
        echo "    ";
        $context["tablet_size"] = ("wpfc-" . $this->getAttribute($this->getAttribute(($context["grid"] ?? null), "tablet", array()), "columns", array()));
        // line 31
        echo "    ";
        $context["phone_size"] = ("wpfc-" . $this->getAttribute($this->getAttribute(($context["grid"] ?? null), "phone", array()), "columns", array()));
        // line 32
        echo "    ";
        $context["class_block"] = twig_join_filter(array(0 => ($context["size"] ?? null), 1 => ($context["tablet_size"] ?? null), 2 => ($context["phone_size"] ?? null)), " ");
        // line 33
        echo "
    ";
        // line 35
        echo "    ";
        if ( !twig_test_empty(($context["posts"] ?? null))) {
            // line 36
            echo "        <div class=\"";
            echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
            echo " wpfc-style-";
            echo twig_escape_filter($this->env, ($context["content"] ?? null), "html", null, true);
            echo "\">
            ";
            // line 37
            $this->displayBlock('particle_content', $context, $blocks);
            // line 49
            echo "        </div>
    ";
        }
        // line 51
        echo "
";
    }

    // line 37
    public function block_particle_content($context, array $blocks = array())
    {
        // line 38
        echo "                ";
        // line 39
        echo "                ";
        $this->loadTemplate("@particles/wpfc-assets/common/views/partials/particle-header.html.twig", "@particles/wpfc-content-grid.html.twig", 39)->display($context);
        // line 40
        echo "
                <div class=\"g-grid\">
                    ";
        // line 42
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
            // line 43
            echo "                        <div class=\"g-block equal-height ";
            echo twig_escape_filter($this->env, ($context["class_block"] ?? null), "html", null, true);
            echo "\">
                            ";
            // line 44
            $this->loadTemplate((("@particles/wpfc-content/views/content/" . ($context["content"] ?? null)) . ".html.twig"), "@particles/wpfc-content-grid.html.twig", 44)->display($context);
            // line 45
            echo "                        </div>
                    ";
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
        // line 47
        echo "                </div>
            ";
    }

    public function getTemplateName()
    {
        return "@particles/wpfc-content-grid.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  162 => 47,  147 => 45,  145 => 44,  140 => 43,  123 => 42,  119 => 40,  116 => 39,  114 => 38,  111 => 37,  106 => 51,  102 => 49,  100 => 37,  93 => 36,  90 => 35,  87 => 33,  84 => 32,  81 => 31,  78 => 30,  75 => 29,  72 => 28,  69 => 26,  66 => 25,  63 => 23,  61 => 21,  60 => 20,  59 => 19,  58 => 18,  57 => 17,  56 => 16,  55 => 15,  53 => 13,  50 => 11,  47 => 10,  44 => 9,  41 => 8,  38 => 7,  35 => 6,  32 => 4,  29 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@particles/wpfc-content-grid.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/particles/wpfc-content-grid.html.twig");
    }
}
