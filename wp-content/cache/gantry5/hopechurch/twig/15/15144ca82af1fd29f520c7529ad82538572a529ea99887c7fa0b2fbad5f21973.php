<?php

/* platform/meta/comments.html.twig */
class __TwigTemplate_5b15cf34354a47d947b34e66bd5301aaff1b37f9e8efe8831dd0a6d72ae08b27 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'meta_comments' => array($this, 'block_meta_comments'),
            'meta_comments_content' => array($this, 'block_meta_comments_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["meta_scope"] = "meta-comments";
        // line 2
        $context["meta_comments_enabled"] = (($context["meta_comments_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (((("content." . ($context["scope"] ?? null)) . ".") . ($context["meta_scope"] ?? null)) . ".enabled"), 1 => ""), "method")));
        // line 3
        $context["meta_comments_link"] = (($context["meta_comments_link"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (((("content." . ($context["scope"] ?? null)) . ".") . ($context["meta_scope"] ?? null)) . ".link"), 1 => "1"), "method")));
        // line 4
        echo "
";
        // line 5
        $this->displayBlock('meta_comments', $context, $blocks);
    }

    public function block_meta_comments($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        if (($context["meta_comments_enabled"] ?? null)) {
            // line 7
            echo "        <div class=\"meta-comments meta-item\">
            ";
            // line 8
            $this->displayBlock('meta_comments_content', $context, $blocks);
            // line 26
            echo "        </div>
    ";
        }
    }

    // line 8
    public function block_meta_comments_content($context, array $blocks = array())
    {
        // line 9
        echo "                ";
        if (($this->getAttribute(($context["post"] ?? null), "comment_count", array()) == "0")) {
            // line 10
            echo "                    ";
            $context["comment_count"] = call_user_func_array($this->env->getFunction('__')->getCallable(), array("No comments", "wpfc-core"));
            // line 11
            echo "                ";
        } elseif (($this->getAttribute(($context["post"] ?? null), "comment_count", array()) == "1")) {
            // line 12
            echo "                    ";
            $context["comment_count"] = (($this->getAttribute(($context["post"] ?? null), "comment_count", array()) . " ") . call_user_func_array($this->env->getFunction('__')->getCallable(), array("Comment", "wpfc-core")));
            // line 13
            echo "                ";
        } else {
            // line 14
            echo "                    ";
            $context["comment_count"] = (($this->getAttribute(($context["post"] ?? null), "comment_count", array()) . " ") . call_user_func_array($this->env->getFunction('__')->getCallable(), array("Comments", "wpfc-core")));
            // line 15
            echo "                ";
        }
        // line 16
        echo "
                ";
        // line 17
        $this->loadTemplate("platform/meta/icon.html.twig", "platform/meta/comments.html.twig", 17)->display($context);
        // line 18
        echo "                ";
        $this->loadTemplate("platform/meta/prefix.html.twig", "platform/meta/comments.html.twig", 18)->display($context);
        // line 19
        echo "
                ";
        // line 20
        if (($context["meta_comments_link"] ?? null)) {
            // line 21
            echo "                    <a href=\"";
            echo ($this->getAttribute(($context["post"] ?? null), "link", array()) . "#comments");
            echo "\" class=\"comments-count\">";
            echo ($context["comment_count"] ?? null);
            echo "</a>
                ";
        } else {
            // line 23
            echo "                    <span class=\"comments-count\">";
            echo ($context["comment_count"] ?? null);
            echo "</span>
                ";
        }
        // line 25
        echo "            ";
    }

    public function getTemplateName()
    {
        return "platform/meta/comments.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 25,  95 => 23,  87 => 21,  85 => 20,  82 => 19,  79 => 18,  77 => 17,  74 => 16,  71 => 15,  68 => 14,  65 => 13,  62 => 12,  59 => 11,  56 => 10,  53 => 9,  50 => 8,  44 => 26,  42 => 8,  39 => 7,  36 => 6,  30 => 5,  27 => 4,  25 => 3,  23 => 2,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "platform/meta/comments.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/platform/meta/comments.html.twig");
    }
}
