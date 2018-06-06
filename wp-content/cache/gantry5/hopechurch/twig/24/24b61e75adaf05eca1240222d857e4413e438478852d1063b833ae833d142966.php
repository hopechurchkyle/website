<?php

/* wpfc-sermon/partials/entry-audio-download.html.twig */
class __TwigTemplate_85ad1c32b887900875806e32b7259b927e95bd3e4557cd6312c913a6a5483868 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'sermon_entry_audio_download' => array($this, 'block_sermon_entry_audio_download'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["sermon_entry_audio_download_enabled"] = (($context["sermon_entry_audio_download_enabled"]) ?? ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "get", array(0 => (("content." . ($context["scope"] ?? null)) . ".entry-audio-download.enabled"), 1 => "1"), "method")));
        // line 2
        echo "
";
        // line 3
        $this->displayBlock('sermon_entry_audio_download', $context, $blocks);
    }

    public function block_sermon_entry_audio_download($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        if (($context["sermon_entry_audio_download_enabled"] ?? null)) {
            // line 5
            echo "        <a class=\"entry-audio-download fa fa-download\" href=\"";
            echo call_user_func_array($this->env->getFunction('fn')->getCallable(), array("get_wpfc_sermon_meta", "sermon_audio"));
            echo "\" download=\"";
            echo call_user_func_array($this->env->getFunction('fn')->getCallable(), array("basename", call_user_func_array($this->env->getFunction('fn')->getCallable(), array("get_wpfc_sermon_meta", "sermon_audio"))));
            echo "\"></a>
    ";
        }
    }

    public function getTemplateName()
    {
        return "wpfc-sermon/partials/entry-audio-download.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 5,  31 => 4,  25 => 3,  22 => 2,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "wpfc-sermon/partials/entry-audio-download.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/views/wpfc-sermon/partials/entry-audio-download.html.twig");
    }
}
