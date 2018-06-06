<?php

/* platform/partials/pagination-links.html.twig */
class __TwigTemplate_08976805c417a6fe7201b1ccbef86044e88f3a9014eab04d007fa600f376abc9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'page_links' => array($this, 'block_page_links'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('page_links', $context, $blocks);
    }

    public function block_page_links($context, array $blocks = array())
    {
        // line 2
        echo "    ";
        if ($this->getAttribute($this->getAttribute(($context["post"] ?? null), "pagination", array()), "pages", array())) {
            // line 3
            echo "        <div class=\"pagination-post\">
            <div class=\"pagination-links\">
                ";
            // line 5
            if ($this->getAttribute($this->getAttribute(($context["post"] ?? null), "pagination", array()), "prev", array())) {
                // line 6
                echo "                    <a href=\"";
                echo $this->getAttribute(($context["page"] ?? null), "link", array());
                echo "\" class=\"prev page-numbers\">Previous</a>
                ";
            }
            // line 8
            echo "
                ";
            // line 9
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["post"] ?? null), "pagination", array()), "pages", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                echo "           
                    ";
                // line 10
                if ($this->getAttribute($context["page"], "current", array())) {
                    // line 11
                    echo "                        <span class=\"page-numbers current\">";
                    echo $this->getAttribute($context["page"], "title", array());
                    echo "</span>
                    ";
                } else {
                    // line 13
                    echo "                        <a href=\"";
                    echo $this->getAttribute($context["page"], "link", array());
                    echo "\" class=\"page-numbers\">";
                    echo $this->getAttribute($context["page"], "title", array());
                    echo "</a>
                    ";
                }
                // line 15
                echo "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 16
            echo "
                ";
            // line 17
            if ($this->getAttribute($this->getAttribute(($context["post"] ?? null), "pagination", array()), "next", array())) {
                // line 18
                echo "                    <a href=\"";
                echo $this->getAttribute(($context["page"] ?? null), "link", array());
                echo "\" class=\"next page-numbers\">Next</a>
                ";
            }
            // line 20
            echo "            </div>
        </div>
    ";
        }
    }

    public function getTemplateName()
    {
        return "platform/partials/pagination-links.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  83 => 20,  77 => 18,  75 => 17,  72 => 16,  66 => 15,  58 => 13,  52 => 11,  50 => 10,  44 => 9,  41 => 8,  35 => 6,  33 => 5,  29 => 3,  26 => 2,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "platform/partials/pagination-links.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/platform/partials/pagination-links.html.twig");
    }
}
