<?php

/* platform/partials/comments.html.twig */
class __TwigTemplate_76785f4e47005e01c8ffe75a2f994e51fab9f7b0ebee76426de3d8a3ff6ad789 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'comments' => array($this, 'block_comments'),
            'comments_content' => array($this, 'block_comments_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["comments_headline_text"] = (($context["comments_headline_text"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".comments.headline.text"), 1 => "Comments:"), "method")));
        // line 2
        $context["comments_headline_tag"] = (($context["comments_headline_tag"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".comments.headline.tag"), 1 => "h3"), "method")));
        // line 3
        $context["comments_avatar_size"] = (($context["comments_avatar_size"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".comments.avatar.size"), 1 => "42"), "method")));
        // line 4
        $context["comments_button_class"] = (($context["comments_button_class"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".comments.button.class"), 1 => "button"), "method")));
        // line 5
        echo "
";
        // line 6
        $this->displayBlock('comments', $context, $blocks);
        // line 37
        echo "
";
        // line 38
        if ((call_user_func_array($this->env->getFunction('function')->getCallable(), array("get_option", "thread_comments")) == "1")) {
            // line 39
            echo "    ";
            $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "document", array()), "addScript", array(0 => $this->getAttribute(($context["wordpress"] ?? null), "call", array(0 => "wp_enqueue_script", 1 => "comment-reply"), "method"), 1 => 10, 2 => "footer"), "method");
        }
    }

    // line 6
    public function block_comments($context, array $blocks = array())
    {
        // line 7
        echo "    ";
        if ((($this->getAttribute(($context["post"] ?? null), "comment_status", array()) == "open") && ($this->getAttribute(($context["post"] ?? null), "post_type", array()) != "product"))) {
            // line 8
            echo "        <section id=\"comments\" class=\"comments-area\">
            ";
            // line 9
            $this->displayBlock('comments_content', $context, $blocks);
            // line 34
            echo "        </section>
    ";
        }
        // line 35
        echo "   
";
    }

    // line 9
    public function block_comments_content($context, array $blocks = array())
    {
        // line 10
        echo "                ";
        if ( !twig_test_empty($this->getAttribute(($context["post"] ?? null), "comments", array()))) {
            // line 11
            echo "                    ";
            // line 12
            echo "                    ";
            if (($context["comments_headline_text"] ?? null)) {
                // line 13
                echo "                         <";
                echo ($context["comments_headline_tag"] ?? null);
                echo " class=\"comments-headline\"><span>";
                echo ($context["comments_headline_text"] ?? null);
                echo "</span></";
                echo ($context["comments_headline_tag"] ?? null);
                echo ">
                    ";
            }
            // line 15
            echo "
                    ";
            // line 17
            echo "                    ";
            $context["comments_parameters"] = array("avatar_size" => ($context["comments_avatar_size"] ?? null));
            // line 18
            echo "                    <ul class=\"comment-list\">";
            echo call_user_func_array($this->env->getFunction('function')->getCallable(), array("wp_list_comments", ($context["comments_parameters"] ?? null)));
            echo "</ul>
                ";
        }
        // line 20
        echo "
                ";
        // line 22
        echo "                ";
        $context["comment_form_parameters"] = array("class_submit" => ($context["comments_button_class"] ?? null));
        // line 23
        echo "                ";
        echo call_user_func_array($this->env->getFunction('function')->getCallable(), array("comment_form", ($context["comment_form_parameters"] ?? null)));
        echo "

                ";
        // line 26
        echo "                ";
        $context["comments_pagination_args"] = array("prev_text" => call_user_func_array($this->env->getFunction('__')->getCallable(), array("Previous")), "next_text" => call_user_func_array($this->env->getFunction('__')->getCallable(), array("Next")));
        // line 30
        echo "                <div class=\"pagination-comments\">
                    <div class=\"pagination-links\">";
        // line 31
        echo call_user_func_array($this->env->getFunction('function')->getCallable(), array("paginate_comments_links", ($context["comments_pagination_args"] ?? null)));
        echo "</div>
                </div>             
            ";
    }

    public function getTemplateName()
    {
        return "platform/partials/comments.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 31,  113 => 30,  110 => 26,  104 => 23,  101 => 22,  98 => 20,  92 => 18,  89 => 17,  86 => 15,  76 => 13,  73 => 12,  71 => 11,  68 => 10,  65 => 9,  60 => 35,  56 => 34,  54 => 9,  51 => 8,  48 => 7,  45 => 6,  39 => 39,  37 => 38,  34 => 37,  32 => 6,  29 => 5,  27 => 4,  25 => 3,  23 => 2,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "platform/partials/comments.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/platform/partials/comments.html.twig");
    }
}
