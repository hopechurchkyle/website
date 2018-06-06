<?php

/* platform/partials/pagination.html.twig */
class __TwigTemplate_e5140e17e13b563646c1517ee21e3d814a392a7b2e39d27164889a8413f76a7a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'pagination' => array($this, 'block_pagination'),
            'pagination_content' => array($this, 'block_pagination_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('pagination', $context, $blocks);
    }

    public function block_pagination($context, array $blocks = array())
    {
        // line 2
        echo "    <div class=\"pagination\">  
        ";
        // line 3
        $this->displayBlock('pagination_content', $context, $blocks);
        // line 23
        echo "    </div>
";
    }

    // line 3
    public function block_pagination_content($context, array $blocks = array())
    {
        echo "   
            <div class=\"pagination-counter pull-right\">
                ";
        // line 5
        $context["current_page"] = "1";
        // line 6
        echo "                ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["pagination"] ?? null), "pages", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
            // line 7
            echo "                    ";
            if ($this->getAttribute($context["page"], "current", array())) {
                // line 8
                echo "                        ";
                $context["current_page"] = $this->getAttribute($context["page"], "title", array());
                // line 9
                echo "                    ";
            }
            // line 10
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "
                <span>";
        // line 12
        echo sprintf(call_user_func_array($this->env->getFunction('__')->getCallable(), array("Page %1\$s of %2\$s", "wpfc-core")), ($context["current_page"] ?? null), $this->getAttribute(twig_last($this->env, $this->getAttribute(($context["pagination"] ?? null), "pages", array())), "name", array()));
        echo "</span>
            </div>
            
            <div class=\"pagination-links\">
                ";
        // line 16
        $context["pagination_args"] = array("prev_text" => call_user_func_array($this->env->getFunction('__')->getCallable(), array("Previous")), "next_text" => call_user_func_array($this->env->getFunction('__')->getCallable(), array("Next")));
        // line 20
        echo "                ";
        echo call_user_func_array($this->env->getFunction('function')->getCallable(), array("paginate_links", ($context["pagination_args"] ?? null)));
        echo "
            </div>
        ";
    }

    public function getTemplateName()
    {
        return "platform/partials/pagination.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  77 => 20,  75 => 16,  68 => 12,  65 => 11,  59 => 10,  56 => 9,  53 => 8,  50 => 7,  45 => 6,  43 => 5,  37 => 3,  32 => 23,  30 => 3,  27 => 2,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "platform/partials/pagination.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/platform/partials/pagination.html.twig");
    }
}
