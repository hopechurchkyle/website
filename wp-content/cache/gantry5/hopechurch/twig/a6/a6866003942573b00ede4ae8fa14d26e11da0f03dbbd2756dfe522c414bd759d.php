<?php

/* wpfc-sermon/partials/entry-audio.html.twig */
class __TwigTemplate_50002b3d8a3b83f03a7db43c29fb981651618bfc65cb17f8ac56ad57eab07b87 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'sermon_entry_audio' => array($this, 'block_sermon_entry_audio'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["sermon_entry_audio_enabled"] = (($context["sermon_entry_audio_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-audio.enabled"), 1 => "1"), "method")));
        // line 2
        echo "
";
        // line 3
        if (((($context["sermon_entry_audio_enabled"] ?? null) && call_user_func_array($this->env->getFunction('fn')->getCallable(), array("is_archive"))) && (call_user_func_array($this->env->getFunction('fn')->getCallable(), array("get_option", "sermonmanager_archive_player")) == "yes"))) {
            // line 4
            echo "    ";
            $context["is_enabled"] = "true";
        } elseif ((        // line 5
($context["sermon_entry_audio_enabled"] ?? null) &&  !call_user_func_array($this->env->getFunction('fn')->getCallable(), array("is_archive")))) {
            // line 6
            echo "    ";
            $context["is_enabled"] = "true";
        }
        // line 8
        echo "
";
        // line 9
        $this->displayBlock('sermon_entry_audio', $context, $blocks);
    }

    public function block_sermon_entry_audio($context, array $blocks = array())
    {
        // line 10
        echo "    ";
        if (($context["is_enabled"] ?? null)) {
            // line 11
            echo "        <div class=\"entry-audio\">
            ";
            // line 12
            echo call_user_func_array($this->env->getFunction('function')->getCallable(), array("wpfc_render_audio", $this->getAttribute(($context["post"] ?? null), "meta", array(0 => "sermon_audio"), "method")));
            echo "
            ";
            // line 13
            $this->loadTemplate("wpfc-sermon/partials/entry-audio-download.html.twig", "wpfc-sermon/partials/entry-audio.html.twig", 13)->display($context);
            // line 14
            echo "        </div>
    ";
        }
    }

    public function getTemplateName()
    {
        return "wpfc-sermon/partials/entry-audio.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 14,  55 => 13,  51 => 12,  48 => 11,  45 => 10,  39 => 9,  36 => 8,  32 => 6,  30 => 5,  27 => 4,  25 => 3,  22 => 2,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "wpfc-sermon/partials/entry-audio.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/wpfc-sermon/partials/entry-audio.html.twig");
    }
}
