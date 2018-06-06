<?php

/* @particles/wpfc-assets/wordpress/platform/views/meta/author.html.twig */
class __TwigTemplate_d74674a83a9a52b36d20eb1586810a5813b169e0fcc5bb2f61f46815ba3353c8 extends Twig_Template
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
        $context["meta_scope"] = (($context["meta_scope"]) ?? ("author"));
        // line 2
        $context["meta_author_enabled"] = (($context["meta_author_enabled"]) ?? ($this->getAttribute($this->getAttribute($this->getAttribute(($context["scope"] ?? null), "meta", array()), "author", array()), "enabled", array())));
        // line 3
        echo "
";
        // line 4
        $this->displayBlock('meta_author', $context, $blocks);
    }

    public function block_meta_author($context, array $blocks = array())
    {
        // line 5
        echo "    ";
        if ((($context["meta_author_enabled"] ?? null) && $this->getAttribute(($context["post"] ?? null), "authors", array()))) {
            // line 6
            echo "        <div class=\"wpfc-meta-author wpfc-meta-item\">
            ";
            // line 7
            $this->displayBlock('meta_author_content', $context, $blocks);
            // line 19
            echo "        </div>
    ";
        }
    }

    // line 7
    public function block_meta_author_content($context, array $blocks = array())
    {
        // line 8
        echo "                ";
        $this->loadTemplate("@particles/wpfc-assets/common/views/meta/icon.html.twig", "@particles/wpfc-assets/wordpress/platform/views/meta/author.html.twig", 8)->display($context);
        // line 9
        echo "                ";
        $this->loadTemplate("@particles/wpfc-assets/common/views/meta/prefix.html.twig", "@particles/wpfc-assets/wordpress/platform/views/meta/author.html.twig", 9)->display($context);
        // line 10
        echo "
                ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["post"] ?? null), "authors", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["author"]) {
            // line 12
            echo "                    ";
            if ((($context["meta_author_enabled"] ?? null) == "link")) {
                // line 13
                echo "                        <a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["author"], "link", array()), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["author"], "name", array()), "html", null, true);
                echo "\" class=\"wpfc-author\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["author"], "name", array()), "html", null, true);
                echo "</a>
                    ";
            } else {
                // line 15
                echo "                        <span class=\"wpfc-author\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["author"], "name", array()), "html", null, true);
                echo "</span>
                    ";
            }
            // line 17
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['author'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "            ";
    }

    public function getTemplateName()
    {
        return "@particles/wpfc-assets/wordpress/platform/views/meta/author.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 18,  83 => 17,  77 => 15,  67 => 13,  64 => 12,  60 => 11,  57 => 10,  54 => 9,  51 => 8,  48 => 7,  42 => 19,  40 => 7,  37 => 6,  34 => 5,  28 => 4,  25 => 3,  23 => 2,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@particles/wpfc-assets/wordpress/platform/views/meta/author.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/particles/wpfc-assets/wordpress/platform/views/meta/author.html.twig");
    }
}
