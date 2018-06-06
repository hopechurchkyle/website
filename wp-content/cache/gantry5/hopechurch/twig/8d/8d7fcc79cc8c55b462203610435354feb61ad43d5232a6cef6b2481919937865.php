<?php

/* wpfc-sermon/partials/entry-media.html.twig */
class __TwigTemplate_1c7c87b6328af45ca442062cdc4eb4fea66edde32c15d3d4f97195bc255cd85e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'sermon_entry_media' => array($this, 'block_sermon_entry_media'),
            'sermon_entry_media_content' => array($this, 'block_sermon_entry_media_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["sermon_entry_video_embed_enabled"] = (($context["sermon_entry_video_embed_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-video.embed"), 1 => "1"), "method")));
        // line 2
        $context["sermon_entry_video_link_enabled"] = (($context["sermon_entry_video_link_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-video.link"), 1 => "1"), "method")));
        // line 3
        $context["sermon_entry_audio_enabled"] = (($context["sermon_entry_audio_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-audio.enabled"), 1 => "1"), "method")));
        // line 4
        $context["sermon_entry_notes_enabled"] = (($context["sermon_entry_notes_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-notes.enabled"), 1 => "1"), "method")));
        // line 5
        $context["sermon_entry_bulletin_enabled"] = (($context["sermon_entry_bulletin_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-bulletin.enabled"), 1 => "1"), "method")));
        // line 6
        echo "
";
        // line 7
        $this->displayBlock('sermon_entry_media', $context, $blocks);
    }

    public function block_sermon_entry_media($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        if (((((($context["sermon_entry_video_embed_enabled"] ?? null) ||         // line 9
($context["sermon_entry_video_link_enabled"] ?? null)) ||         // line 10
($context["sermon_entry_audio_enabled"] ?? null)) ||         // line 11
($context["sermon_entry_bulletin_enabled"] ?? null)) ||         // line 12
($context["sermon_entry_notes_enabled"] ?? null))) {
            // line 13
            echo "        <div class=\"entry-media\">
            ";
            // line 14
            $this->displayBlock('sermon_entry_media_content', $context, $blocks);
            // line 25
            echo "        </div>
    ";
        }
    }

    // line 14
    public function block_sermon_entry_media_content($context, array $blocks = array())
    {
        // line 15
        echo "                ";
        $this->loadTemplate("wpfc-sermon/partials/entry-video.html.twig", "wpfc-sermon/partials/entry-media.html.twig", 15)->display($context);
        // line 16
        echo "                ";
        $this->loadTemplate("wpfc-sermon/partials/entry-audio.html.twig", "wpfc-sermon/partials/entry-media.html.twig", 16)->display($context);
        // line 17
        echo "
                ";
        // line 18
        if ((($context["sermon_entry_bulletin_enabled"] ?? null) || ($context["sermon_entry_notes_enabled"] ?? null))) {
            // line 19
            echo "                    <div class=\"entry-files\">
                        ";
            // line 20
            $this->loadTemplate("wpfc-sermon/partials/entry-bulletin.html.twig", "wpfc-sermon/partials/entry-media.html.twig", 20)->display($context);
            // line 21
            echo "                        ";
            $this->loadTemplate("wpfc-sermon/partials/entry-notes.html.twig", "wpfc-sermon/partials/entry-media.html.twig", 21)->display($context);
            // line 22
            echo "                    </div>
                ";
        }
        // line 24
        echo "            ";
    }

    public function getTemplateName()
    {
        return "wpfc-sermon/partials/entry-media.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 24,  80 => 22,  77 => 21,  75 => 20,  72 => 19,  70 => 18,  67 => 17,  64 => 16,  61 => 15,  58 => 14,  52 => 25,  50 => 14,  47 => 13,  45 => 12,  44 => 11,  43 => 10,  42 => 9,  40 => 8,  34 => 7,  31 => 6,  29 => 5,  27 => 4,  25 => 3,  23 => 2,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "wpfc-sermon/partials/entry-media.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/wpfc-sermon/partials/entry-media.html.twig");
    }
}
