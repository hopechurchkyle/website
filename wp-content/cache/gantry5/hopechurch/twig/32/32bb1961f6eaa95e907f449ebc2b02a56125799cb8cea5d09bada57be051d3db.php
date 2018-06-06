<?php

/* @particles/wpfc-assets/wordpress/platform/views/meta/comments.html.twig */
class __TwigTemplate_b84677a2a45d4d95f0028f6146b0e068cad2874d24637bf0db6a547d24c60699 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'meta_comments' => array($this, 'block_meta_comments'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["meta_scope"] = "comments";
        // line 2
        $context["meta_comments_enabled"] = (($context["meta_comments_enabled"]) ?? ($this->getAttribute($this->getAttribute($this->getAttribute(($context["scope"] ?? null), "meta", array()), "comments", array()), "enabled", array())));
        // line 3
        echo "
";
        // line 4
        $this->displayBlock('meta_comments', $context, $blocks);
    }

    public function block_meta_comments($context, array $blocks = array())
    {
        // line 5
        echo "    ";
        if (($context["meta_comments_enabled"] ?? null)) {
            // line 6
            echo "        <div class=\"wpfc-meta-comments wpfc-meta-item\">
            ";
            // line 7
            if (($this->getAttribute(($context["post"] ?? null), "comment_count", array()) == "0")) {
                // line 8
                echo "                ";
                $context["comment_count"] = "No Comments";
                // line 9
                echo "            ";
            } elseif (($this->getAttribute(($context["post"] ?? null), "comment_count", array()) == "1")) {
                // line 10
                echo "                ";
                $context["comment_count"] = (($this->getAttribute(($context["post"] ?? null), "comment_count", array()) . " ") . "Comments");
                // line 11
                echo "            ";
            } else {
                // line 12
                echo "                ";
                $context["comment_count"] = (($this->getAttribute(($context["post"] ?? null), "comment_count", array()) . " ") . "Comments");
                // line 13
                echo "            ";
            }
            // line 14
            echo "
            ";
            // line 15
            $this->loadTemplate("@particles/wpfc-assets/common/views/meta/icon.html.twig", "@particles/wpfc-assets/wordpress/platform/views/meta/comments.html.twig", 15)->display($context);
            // line 16
            echo "            ";
            $this->loadTemplate("@particles/wpfc-assets/common/views/meta/prefix.html.twig", "@particles/wpfc-assets/wordpress/platform/views/meta/comments.html.twig", 16)->display($context);
            // line 17
            echo "
            ";
            // line 18
            if ((($context["meta_comments_enabled"] ?? null) == "link")) {
                // line 19
                echo "                <a href=\"";
                echo twig_escape_filter($this->env, ($this->getAttribute(($context["post"] ?? null), "link", array()) . "#comments"), "html", null, true);
                echo "\" class=\"wpfc-comments-count\">";
                echo twig_escape_filter($this->env, ($context["comment_count"] ?? null), "html", null, true);
                echo "</a>
            ";
            } else {
                // line 21
                echo "                <span class=\"wpfc-comments-count\">";
                echo twig_escape_filter($this->env, ($context["comment_count"] ?? null), "html", null, true);
                echo "</span>
            ";
            }
            // line 23
            echo "        </div>
    ";
        }
        // line 25
        echo "    
";
    }

    public function getTemplateName()
    {
        return "@particles/wpfc-assets/wordpress/platform/views/meta/comments.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  90 => 25,  86 => 23,  80 => 21,  72 => 19,  70 => 18,  67 => 17,  64 => 16,  62 => 15,  59 => 14,  56 => 13,  53 => 12,  50 => 11,  47 => 10,  44 => 9,  41 => 8,  39 => 7,  36 => 6,  33 => 5,  27 => 4,  24 => 3,  22 => 2,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@particles/wpfc-assets/wordpress/platform/views/meta/comments.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/particles/wpfc-assets/wordpress/platform/views/meta/comments.html.twig");
    }
}
