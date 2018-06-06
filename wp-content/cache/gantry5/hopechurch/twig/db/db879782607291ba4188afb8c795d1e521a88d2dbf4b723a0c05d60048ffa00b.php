<?php

/* platform/partials/entry-author.html.twig */
class __TwigTemplate_72c8def24c345c709d6a528f88c8a1c573b22284d28facd7ebb116dca59ab115 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'entry_author' => array($this, 'block_entry_author'),
            'entry_author_content' => array($this, 'block_entry_author_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["entry_author_enabled"] = (($context["entry_author_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-author.enabled"), 1 => "1"), "method")));
        // line 2
        $context["entry_author_avatar_enabled"] = (($context["entry_author_avatar_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-author.avatar.enabled"), 1 => "link"), "method")));
        // line 3
        $context["entry_author_website_enabled"] = (($context["entry_author_website_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-author.website"), 1 => "show"), "method")));
        // line 4
        $context["entry_author_name_enabled"] = (($context["entry_author_name_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-author.name"), 1 => "link"), "method")));
        // line 5
        $context["entry_author_description_enabled"] = (($context["entry_author_description_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-author.description"), 1 => "show"), "method")));
        // line 6
        echo "
";
        // line 7
        $context["entry_author_count_posts_enabled"] = (($context["entry_author_count_posts_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-author.count.posts"), 1 => "link"), "method")));
        // line 8
        $context["entry_author_count_posts_nr"] = call_user_func_array($this->env->getFunction('function')->getCallable(), array("count_user_posts", $this->getAttribute(($context["author"] ?? null), "ID", array())));
        // line 9
        $context["entry_author_count_posts_label"] = (((($context["entry_author_count_posts_nr"] ?? null) > "1")) ? ((($context["entry_author_count_posts_nr"] ?? null) . " Posts")) : ((($context["entry_author_count_posts_nr"] ?? null) . " Post")));
        // line 10
        echo "
";
        // line 11
        $context["entry_author_count_comments_enabled"] = (($context["entry_author_count_comments_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-author.count.comments"), 1 => ""), "method")));
        // line 12
        echo "
";
        // line 13
        $this->displayBlock('entry_author', $context, $blocks);
    }

    public function block_entry_author($context, array $blocks = array())
    {
        // line 14
        echo "    ";
        if ((($context["entry_author_enabled"] ?? null) && $this->getAttribute(($context["post"] ?? null), "authors", array()))) {
            // line 15
            echo "        <div class=\"entry-author entry-author-singular\">
            ";
            // line 16
            $this->displayBlock('entry_author_content', $context, $blocks);
            // line 89
            echo "        </div>
    ";
        }
    }

    // line 16
    public function block_entry_author_content($context, array $blocks = array())
    {
        // line 17
        echo "                ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["post"] ?? null), "authors", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["author"]) {
            // line 18
            echo "                    <div class=\"entry-author-item\">
                        ";
            // line 20
            echo "                        ";
            if ((($context["entry_author_avatar_enabled"] ?? null) && $this->getAttribute($context["author"], "avatar", array()))) {
                echo " 
                            <div class=\"entry-author-avatar\">
                                ";
                // line 22
                if ((($context["entry_author_avatar_enabled"] ?? null) == "link")) {
                    // line 23
                    echo "                                    <a href=\"";
                    echo $this->getAttribute($context["author"], "link", array());
                    echo "\" title=\"";
                    echo $this->getAttribute($context["author"], "name", array());
                    echo "\">
                                        <img src=\"";
                    // line 24
                    echo $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute($context["author"], "avatar", array()));
                    echo "\" alt=\"";
                    echo $this->getAttribute($context["author"], "name", array());
                    echo "\">
                                    </a>
                                ";
                } else {
                    // line 27
                    echo "                                    <img src=\"";
                    echo $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute($context["author"], "avatar", array()));
                    echo "\" alt=\"";
                    echo $this->getAttribute($context["author"], "name", array());
                    echo "\">
                                ";
                }
                // line 29
                echo "                            </div>
                        ";
            }
            // line 31
            echo "
                        ";
            // line 33
            echo "                        <div class=\"entry-author-inner\">
                            ";
            // line 35
            echo "                            ";
            if (($context["entry_author_name_enabled"] ?? null)) {
                // line 36
                echo "                                <h4 class=\"entry-author-name\">
                                    ";
                // line 37
                if ((($context["entry_author_name_enabled"] ?? null) == "link")) {
                    // line 38
                    echo "                                        <a href=\"";
                    echo $this->getAttribute($context["author"], "link", array());
                    echo "\" title=\"";
                    echo $this->getAttribute($context["author"], "name", array());
                    echo "\" class=\"entry-author-name-text\">";
                    echo $this->getAttribute($context["author"], "name", array());
                    echo "</a>
                                    ";
                } else {
                    // line 40
                    echo "                                        <span class=\"entry-author-name-text\">";
                    echo $this->getAttribute($context["author"], "name", array());
                    echo "</span>
                                    ";
                }
                // line 42
                echo "                                </h4>
                            ";
            }
            // line 44
            echo "
                            ";
            // line 46
            echo "                            ";
            if (($context["entry_author_website_enabled"] ?? null)) {
                // line 47
                echo "                                <div class=\"entry-author-website\">
                                    <a href=\"";
                // line 48
                echo $this->getAttribute($context["author"], "user_url", array());
                echo "\">";
                echo $this->getAttribute($context["author"], "user_url", array());
                echo "</a>
                                </div>
                            ";
            }
            // line 51
            echo "
                            ";
            // line 53
            echo "                            ";
            if (($context["entry_author_description_enabled"] ?? null)) {
                // line 54
                echo "                                <div class=\"entry-author-description\">";
                echo $this->getAttribute($context["author"], "description", array());
                echo "</div>
                            ";
            }
            // line 56
            echo "
                            ";
            // line 57
            if ((($context["entry_author_count_posts_enabled"] ?? null) || ($context["entry_author_count_comments_enabled"] ?? null))) {
                // line 58
                echo "                                <div class=\"entry-author-counters\">
                                    ";
                // line 60
                echo "                                    ";
                if (($context["entry_author_count_posts_enabled"] ?? null)) {
                    // line 61
                    echo "                                        <div class=\"entry-author-posts\">
                                            ";
                    // line 62
                    if ((($context["entry_author_count_posts_enabled"] ?? null) == "link")) {
                        // line 63
                        echo "                                                <a href=\"";
                        echo $this->getAttribute($context["author"], "link", array());
                        echo "\" title=\"";
                        echo $this->getAttribute($context["author"], "name", array());
                        echo "\" class=\"entry-author-posts-text\">";
                        // line 64
                        echo ($context["entry_author_count_posts_label"] ?? null);
                        // line 65
                        echo "</a>
                                            ";
                    } else {
                        // line 67
                        echo "                                                <span class=\"entry-author-posts-text\">";
                        echo ($context["entry_author_count_posts_label"] ?? null);
                        echo "</span>
                                            ";
                    }
                    // line 69
                    echo "                                        </div>
                                    ";
                }
                // line 71
                echo "
                                    ";
                // line 73
                echo "                                    ";
                if (($context["entry_author_count_comments_enabled"] ?? null)) {
                    // line 74
                    echo "                                        <div class=\"entry-author-comments\">
                                            ";
                    // line 75
                    if ((($context["entry_author_count_comments_enabled"] ?? null) == "link")) {
                        // line 76
                        echo "                                                <a href=\"";
                        echo $this->getAttribute($context["author"], "link", array());
                        echo "\" title=\"";
                        echo $this->getAttribute($context["author"], "name", array());
                        echo "\" class=\"entry-author-comments-text\"></a>
                                            ";
                    } else {
                        // line 78
                        echo "                                                <span class=\"entry-author-comments-text\"></span>
                                            ";
                    }
                    // line 80
                    echo "                                        </div>
                                    ";
                }
                // line 82
                echo "                                </div>
                            ";
            }
            // line 84
            echo "
                        </div>
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['author'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 88
        echo "            ";
    }

    public function getTemplateName()
    {
        return "platform/partials/entry-author.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  255 => 88,  246 => 84,  242 => 82,  238 => 80,  234 => 78,  226 => 76,  224 => 75,  221 => 74,  218 => 73,  215 => 71,  211 => 69,  205 => 67,  201 => 65,  199 => 64,  193 => 63,  191 => 62,  188 => 61,  185 => 60,  182 => 58,  180 => 57,  177 => 56,  171 => 54,  168 => 53,  165 => 51,  157 => 48,  154 => 47,  151 => 46,  148 => 44,  144 => 42,  138 => 40,  128 => 38,  126 => 37,  123 => 36,  120 => 35,  117 => 33,  114 => 31,  110 => 29,  102 => 27,  94 => 24,  87 => 23,  85 => 22,  79 => 20,  76 => 18,  71 => 17,  68 => 16,  62 => 89,  60 => 16,  57 => 15,  54 => 14,  48 => 13,  45 => 12,  43 => 11,  40 => 10,  38 => 9,  36 => 8,  34 => 7,  31 => 6,  29 => 5,  27 => 4,  25 => 3,  23 => 2,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "platform/partials/entry-author.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/platform/partials/entry-author.html.twig");
    }
}
