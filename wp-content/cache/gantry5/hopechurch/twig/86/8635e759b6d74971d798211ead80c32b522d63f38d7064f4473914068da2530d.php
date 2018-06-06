<?php

/* platform/meta/author.html.twig */
class __TwigTemplate_5bb41948b84e6883273ea7d8bae6ac5b0dcc104e2fc694a075eee9d71238152c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'meta_author' => array($this, 'block_meta_author'),
            'meta_author_content' => array($this, 'block_meta_author_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["meta_scope"] = "meta-author";
        // line 2
        $context["meta_author_enabled"] = (($context["meta_author_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (((("content." . ($context["scope"] ?? null)) . ".") . ($context["meta_scope"] ?? null)) . ".enabled"), 1 => "1"), "method")));
        // line 3
        $context["meta_author_link"] = (($context["meta_author_link"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (((("content." . ($context["scope"] ?? null)) . ".") . ($context["meta_scope"] ?? null)) . ".link"), 1 => "1"), "method")));
        // line 4
        echo "
";
        // line 5
        $this->displayBlock('meta_author', $context, $blocks);
    }

    public function block_meta_author($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        if (($context["meta_author_enabled"] ?? null)) {
            // line 7
            echo "        <div class=\"meta-author meta-item\">
            ";
            // line 8
            $this->displayBlock('meta_author_content', $context, $blocks);
            // line 21
            echo "        </div>
    ";
        }
    }

    // line 8
    public function block_meta_author_content($context, array $blocks = array())
    {
        // line 9
        echo "                ";
        $this->loadTemplate("platform/meta/icon.html.twig", "platform/meta/author.html.twig", 9)->display($context);
        // line 10
        echo "                ";
        $this->loadTemplate("platform/meta/prefix.html.twig", "platform/meta/author.html.twig", 10)->display($context);
        // line 11
        echo "
                ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["post"] ?? null), "authors", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["author"]) {
            // line 13
            echo "                    ";
            if (($context["meta_author_link"] ?? null)) {
                // line 14
                echo "                        <a href=\"";
                echo $this->getAttribute($context["author"], "link", array());
                echo "\" title=\"";
                echo $this->getAttribute($context["author"], "name", array());
                echo "\" class=\"author\">";
                echo $this->getAttribute($context["author"], "name", array());
                echo "</a>
                    ";
            } else {
                // line 16
                echo "                        <span class=\"author\">";
                echo $this->getAttribute($context["author"], "name", array());
                echo "</span>
                    ";
            }
            // line 18
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['author'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "
            ";
    }

    public function getTemplateName()
    {
        return "platform/meta/author.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 19,  85 => 18,  79 => 16,  69 => 14,  66 => 13,  62 => 12,  59 => 11,  56 => 10,  53 => 9,  50 => 8,  44 => 21,  42 => 8,  39 => 7,  36 => 6,  30 => 5,  27 => 4,  25 => 3,  23 => 2,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "platform/meta/author.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/platform/meta/author.html.twig");
    }
}
