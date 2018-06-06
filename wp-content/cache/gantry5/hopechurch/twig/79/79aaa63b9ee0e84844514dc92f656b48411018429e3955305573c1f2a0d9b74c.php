<?php

/* platform/partials/entry-content.html.twig */
class __TwigTemplate_7bdaf9be17d594aa035fee1f5bf9fd27555d94088de0d4fc8355b8d8d28f48a0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'entry_content' => array($this, 'block_entry_content'),
            'entry_content_inner' => array($this, 'block_entry_content_inner'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["entry_content_enabled"] = (($context["entry_content_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-content.enabled"), 1 => "1"), "method")));
        // line 2
        $context["entry_content_type"] = (($context["entry_content_type"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-content.type"), 1 => "content"), "method")));
        // line 3
        $context["entry_content_limit"] = (($context["entry_content_limit"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-content.limit"), 1 => ""), "method")));
        // line 4
        $context["readmore"] = $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->pregMatch("/<!--more(.*?)?-->/", $this->getAttribute(($context["post"] ?? null), "post_content", array()));
        // line 5
        echo "
";
        // line 6
        $this->displayBlock('entry_content', $context, $blocks);
    }

    public function block_entry_content($context, array $blocks = array())
    {
        // line 7
        echo "    ";
        if (($context["entry_content_enabled"] ?? null)) {
            // line 8
            echo "        <div class=\"entry-content\">        
            ";
            // line 9
            $this->displayBlock('entry_content_inner', $context, $blocks);
            // line 30
            echo "        </div>
    ";
        }
        // line 32
        echo "    
";
    }

    // line 9
    public function block_entry_content_inner($context, array $blocks = array())
    {
        echo "       
                ";
        // line 10
        if (((($context["entry_content_type"] ?? null) == "excerpt") && $this->getAttribute(($context["post"] ?? null), "post_excerpt", array()))) {
            // line 11
            echo "                    ";
            // line 12
            echo "                    <div class=\"post-excerpt\">";
            echo call_user_func_array($this->env->getFilter('apply_filters')->getCallable(), array($this->getAttribute(($context["post"] ?? null), "post_excerpt", array()), "the_excerpt"));
            echo "</div>
                ";
        } else {
            // line 14
            echo "                    ";
            // line 15
            echo "                    <div class=\"post-content\">
                        ";
            // line 16
            if ( !twig_test_empty(($context["readmore"] ?? null))) {
                // line 17
                echo "                            ";
                $context["split_content"] = twig_split_filter($this->env, $this->getAttribute(($context["post"] ?? null), "post_content", array()), $this->getAttribute(($context["readmore"] ?? null), 0, array(), "array"), 2);
                // line 18
                echo "                            ";
                echo call_user_func_array($this->env->getFilter('apply_filters')->getCallable(), array($this->getAttribute(($context["split_content"] ?? null), 0, array(), "array"), "the_content"));
                echo "
                        ";
            } elseif (twig_in_filter("<!--nextpage-->", $this->getAttribute(            // line 19
($context["post"] ?? null), "post_content", array()))) {
                // line 20
                echo "                            ";
                $context["split_content"] = twig_split_filter($this->env, $this->getAttribute(($context["post"] ?? null), "post_content", array()), "<!--nextpage-->", 2);
                // line 21
                echo "                            ";
                echo call_user_func_array($this->env->getFilter('apply_filters')->getCallable(), array($this->getAttribute(($context["split_content"] ?? null), 0, array(), "array"), "the_content"));
                echo "
                        ";
            } elseif (            // line 22
($context["entry_content_limit"] ?? null)) {
                // line 23
                echo "                            ";
                echo $this->getAttribute(($context["post"] ?? null), "content", array(0 => "", 1 => ($context["entry_content_limit"] ?? null)), "method");
                echo "
                        ";
            } else {
                // line 25
                echo "                            ";
                echo $this->getAttribute(($context["post"] ?? null), "content", array());
                echo "
                        ";
            }
            // line 27
            echo "                    </div>               
                ";
        }
        // line 29
        echo "            ";
    }

    public function getTemplateName()
    {
        return "platform/partials/entry-content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 29,  109 => 27,  103 => 25,  97 => 23,  95 => 22,  90 => 21,  87 => 20,  85 => 19,  80 => 18,  77 => 17,  75 => 16,  72 => 15,  70 => 14,  64 => 12,  62 => 11,  60 => 10,  55 => 9,  50 => 32,  46 => 30,  44 => 9,  41 => 8,  38 => 7,  32 => 6,  29 => 5,  27 => 4,  25 => 3,  23 => 2,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "platform/partials/entry-content.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/platform/partials/entry-content.html.twig");
    }
}
