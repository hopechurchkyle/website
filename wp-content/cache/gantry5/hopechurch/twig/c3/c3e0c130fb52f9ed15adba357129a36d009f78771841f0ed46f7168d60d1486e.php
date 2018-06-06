<?php

/* wpfc-sermon/meta/avatar.html.twig */
class __TwigTemplate_3118dcb2cfd23459cef6a52833aa643fb90927f7977ada9c550f201c27b839ac extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'sermon_meta_avatar' => array($this, 'block_sermon_meta_avatar'),
            'sermon_meta_avatar_content' => array($this, 'block_sermon_meta_avatar_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["meta_scope"] = "meta-avatar";
        // line 2
        $context["sermon_meta_avatar_enabled"] = $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (((("content." . ($context["scope"] ?? null)) . ".") . ($context["meta_scope"] ?? null)) . ".enabled"), 1 => "1"), "method");
        // line 3
        $context["sermon_meta_avatar_link"] = $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (((("content." . ($context["scope"] ?? null)) . ".") . ($context["meta_scope"] ?? null)) . ".link"), 1 => "1"), "method");
        // line 4
        echo "
";
        // line 5
        $context["preacher_parameters"] = array("taxonomy" => "wpfc_preacher", "post_id" => $this->getAttribute(        // line 7
($context["post"] ?? null), "ID", array()));
        // line 9
        $context["preachers"] = call_user_func_array($this->env->getFilter('apply_filters')->getCallable(), array("image", "sermon-images-get-the-terms", ($context["preacher_parameters"] ?? null)));
        // line 10
        echo "
";
        // line 11
        $this->displayBlock('sermon_meta_avatar', $context, $blocks);
    }

    public function block_sermon_meta_avatar($context, array $blocks = array())
    {
        // line 12
        echo "    ";
        if (($context["sermon_meta_avatar_enabled"] ?? null)) {
            // line 13
            echo "        <div class=\"meta-avatar meta-item\">
            ";
            // line 14
            $this->displayBlock('sermon_meta_avatar_content', $context, $blocks);
            // line 25
            echo "        </div>
    ";
        }
    }

    // line 14
    public function block_sermon_meta_avatar_content($context, array $blocks = array())
    {
        // line 15
        echo "                ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["preachers"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["preacher"]) {
            // line 16
            echo "                    ";
            if (($context["sermon_meta_avatar_link"] ?? null)) {
                // line 17
                echo "                        <a href=\"";
                echo call_user_func_array($this->env->getFunction('function')->getCallable(), array("get_term_link", $this->getAttribute($context["preacher"], "term_id", array())));
                echo "\" title=\"";
                echo $this->getAttribute($context["preacher"], "name", array());
                echo "\">
                            ";
                // line 18
                echo call_user_func_array($this->env->getFunction('function')->getCallable(), array("wp_get_attachment_image", $this->getAttribute($context["preacher"], "image_id", array())));
                echo "
                        </a>
                    ";
            } else {
                // line 21
                echo "                        ";
                echo call_user_func_array($this->env->getFunction('function')->getCallable(), array("wp_get_attachment_image", $this->getAttribute($context["preacher"], "image_id", array())));
                echo "
                    ";
            }
            // line 23
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['preacher'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "            ";
    }

    public function getTemplateName()
    {
        return "wpfc-sermon/meta/avatar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 24,  88 => 23,  82 => 21,  76 => 18,  69 => 17,  66 => 16,  61 => 15,  58 => 14,  52 => 25,  50 => 14,  47 => 13,  44 => 12,  38 => 11,  35 => 10,  33 => 9,  31 => 7,  30 => 5,  27 => 4,  25 => 3,  23 => 2,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "wpfc-sermon/meta/avatar.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/wpfc-sermon/meta/avatar.html.twig");
    }
}
