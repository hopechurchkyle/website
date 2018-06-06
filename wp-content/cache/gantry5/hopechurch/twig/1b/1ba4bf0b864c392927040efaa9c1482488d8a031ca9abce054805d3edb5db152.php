<?php

/* wpfc-sermon/partials/entry-video.html.twig */
class __TwigTemplate_66fd198e565d7d1fac93262bd33e8e6fe3e6212101e31a70493fbbe37302a285 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'sermon_entry_video' => array($this, 'block_sermon_entry_video'),
            'sermon_entry_video_content' => array($this, 'block_sermon_entry_video_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["sermon_entry_video_embed_enabled"] = (($context["sermon_entry_video_embed_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-video.embed"), 1 => "1"), "method")));
        // line 2
        $context["sermon_video"] = call_user_func_array($this->env->getFunction('function')->getCallable(), array("get_wpfc_sermon_meta", "sermon_video"));
        // line 3
        $context["sermon_entry_video_embed"] = call_user_func_array($this->env->getFunction('function')->getCallable(), array("do_shortcode", ($context["sermon_video"] ?? null)));
        // line 4
        $context["sermon_entry_has_video_embed"] = (((($context["sermon_entry_video_embed_enabled"] ?? null) && ($context["sermon_entry_video_embed"] ?? null))) ? ("1") : (""));
        // line 5
        echo "
";
        // line 6
        $context["sermon_entry_video_link_enabled"] = (($context["sermon_entry_video_link_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-video.link"), 1 => "1"), "method")));
        // line 7
        $context["sermon_entry_video_link"] = call_user_func_array($this->env->getFunction('function')->getCallable(), array("process_wysiwyg_output", "sermon_video_link"));
        // line 8
        $context["sermon_entry_has_video_link"] = (((($context["sermon_entry_video_link_enabled"] ?? null) && ($context["sermon_entry_video_link"] ?? null))) ? ("1") : (""));
        // line 9
        echo "
";
        // line 10
        $this->displayBlock('sermon_entry_video', $context, $blocks);
    }

    public function block_sermon_entry_video($context, array $blocks = array())
    {
        // line 11
        echo "    ";
        if ((($context["sermon_entry_has_video_embed"] ?? null) || ($context["sermon_entry_has_video_link"] ?? null))) {
            // line 12
            echo "        <div class=\"entry-video\">
            ";
            // line 13
            $this->displayBlock('sermon_entry_video_content', $context, $blocks);
            // line 28
            echo "        </div>
    ";
        }
    }

    // line 13
    public function block_sermon_entry_video_content($context, array $blocks = array())
    {
        // line 14
        echo "
                ";
        // line 15
        if (($context["sermon_entry_has_video_embed"] ?? null)) {
            // line 16
            echo "                    <div class=\"entry-video-embed\">
                        ";
            // line 17
            echo ($context["sermon_entry_video_embed"] ?? null);
            echo "
                    </div>
                ";
        }
        // line 20
        echo "
                ";
        // line 21
        if (($context["sermon_entry_has_video_link"] ?? null)) {
            // line 22
            echo "                    <div class=\"entry-video-link\">
                        ";
            // line 23
            echo ($context["sermon_entry_video_link"] ?? null);
            echo "
                    </div>
                ";
        }
        // line 26
        echo "
            ";
    }

    public function getTemplateName()
    {
        return "wpfc-sermon/partials/entry-video.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 26,  86 => 23,  83 => 22,  81 => 21,  78 => 20,  72 => 17,  69 => 16,  67 => 15,  64 => 14,  61 => 13,  55 => 28,  53 => 13,  50 => 12,  47 => 11,  41 => 10,  38 => 9,  36 => 8,  34 => 7,  32 => 6,  29 => 5,  27 => 4,  25 => 3,  23 => 2,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "wpfc-sermon/partials/entry-video.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/wpfc-sermon/partials/entry-video.html.twig");
    }
}
