<?php

/* wpfc-sermon/meta/passage.html.twig */
class __TwigTemplate_d59a4b9803d9ff88fd922a34cccdbabab756ad7fb6a5e812d0358ed45113c8dd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'sermon_meta_passage' => array($this, 'block_sermon_meta_passage'),
            'sermon_meta_passage_content' => array($this, 'block_sermon_meta_passage_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["meta_scope"] = "meta-passage";
        // line 2
        $context["sermon_meta_passage_enabled"] = (($context["sermon_meta_passage_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (((("content." . ($context["scope"] ?? null)) . ".") . ($context["meta_scope"] ?? null)) . ".enabled"), 1 => "1"), "method")));
        // line 3
        echo "
";
        // line 4
        $this->displayBlock('sermon_meta_passage', $context, $blocks);
    }

    public function block_sermon_meta_passage($context, array $blocks = array())
    {
        // line 5
        echo "    ";
        if ((($context["sermon_meta_passage_enabled"] ?? null) && $this->getAttribute(($context["post"] ?? null), "meta", array(0 => "bible_passage"), "method"))) {
            // line 6
            echo "        <div class=\"meta-passage meta-item\">
            ";
            // line 7
            $this->displayBlock('sermon_meta_passage_content', $context, $blocks);
            // line 15
            echo "        </div>
    ";
        }
    }

    // line 7
    public function block_sermon_meta_passage_content($context, array $blocks = array())
    {
        // line 8
        echo "                ";
        $this->loadTemplate("platform/meta/icon.html.twig", "wpfc-sermon/meta/passage.html.twig", 8)->display($context);
        // line 9
        echo "                ";
        $this->loadTemplate("platform/meta/prefix.html.twig", "wpfc-sermon/meta/passage.html.twig", 9)->display($context);
        // line 10
        echo "
                <span class=\"passage\">
                    <span class=\"single-passage\">";
        // line 12
        echo call_user_func_array($this->env->getFunction('fn')->getCallable(), array("get_post_meta", $this->getAttribute(($context["post"] ?? null), "ID", array()), "bible_passage", true));
        echo "</span>
                </span>
            ";
    }

    public function getTemplateName()
    {
        return "wpfc-sermon/meta/passage.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 12,  57 => 10,  54 => 9,  51 => 8,  48 => 7,  42 => 15,  40 => 7,  37 => 6,  34 => 5,  28 => 4,  25 => 3,  23 => 2,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "wpfc-sermon/meta/passage.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/wpfc-sermon/meta/passage.html.twig");
    }
}
