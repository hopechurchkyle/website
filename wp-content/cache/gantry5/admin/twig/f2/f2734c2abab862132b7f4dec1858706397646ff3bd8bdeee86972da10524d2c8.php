<?php

/* @gantry-admin/ajax/filepicker.html.twig */
class __TwigTemplate_e5babdbc4f6aed16a28751a78cf76c1f5d10ccd1c96b4c07f734495118a547bd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["files_mode"] = _twig_default_filter($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->jsonDecodeFilter($this->env->getExtension('Gantry\Component\Twig\TwigExtension')->getCookie("g5_files_mode")), "thumbnails");
        // line 2
        echo "
<div class=\"g-particles-header filepicker-header settings-block clearfix\">
    <div class=\"float-right files-mode\">
        <div class=\"file-mode";
        // line 5
        echo (((($context["files_mode"] ?? null) == "thumbnails")) ? (" active") : (""));
        echo "\" data-files-mode=\"thumbnails\"><i class=\"fa fa-th-large\" aria-hidden=\"true\"></i></div>
        <div class=\"file-mode";
        // line 6
        echo (((($context["files_mode"] ?? null) == "list")) ? (" active") : (""));
        echo "\" data-files-mode=\"list\"><i class=\"fa fa-th-list\" aria-hidden=\"true\"></i></div>
    </div>
</div>
<div class=\"g-particles-main icons-wrapper g-grid\">
    <div class=\"folders g-block size-30\">
        <ul class=\"g-bookmarks\">
            ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["bookmarks"] ?? null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["index"] => $context["bookmark"]) {
            // line 13
            echo "                <li class=\"g-bookmark";
            echo ((twig_in_filter($context["index"], ($context["active"] ?? null))) ? (" selected") : (""));
            echo "\">
                    <span class=\"g-bookmark-title\" title=\"";
            // line 14
            echo twig_escape_filter($this->env, $context["index"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["index"], "html", null, true);
            echo " <i class=\"g-bookmark-collapse fa fa-fw fa-minus\"></i></span>
                    <ul class=\"g-folders fa-ul\">
                        ";
            // line 16
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["bookmark"]);
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["folder"]) {
                // line 17
                echo "                            <li";
                echo ((twig_in_filter($context["folder"], ($context["active"] ?? null))) ? (" class=\"selected active\"") : (""));
                echo " data-folder=\"";
                echo twig_escape_filter($this->env, twig_jsonencode_filter(array("pathname" => $context["folder"])), "html_attr");
                echo "\">
                                <i class=\"fa-li fa fa-folder-o\" aria-hidden=\"true\"></i> <span class=\"path\" title=\"";
                // line 18
                echo twig_escape_filter($this->env, $context["folder"], "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $context["folder"], "html", null, true);
                echo "</span>
                            </li>
                            ";
                // line 20
                $this->loadTemplate("ajax/filepicker/subfolders.html.twig", "@gantry-admin/ajax/filepicker.html.twig", 20)->display(array_merge($context, array("folder" => $this->getAttribute($this->getAttribute(($context["folders"] ?? null), $context["index"]), $context["folder"]), "active" => ($context["active"] ?? null))));
                // line 21
                echo "                        ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['folder'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 22
            echo "                    </ul>
                </li>
            ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['index'], $context['bookmark'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "            ";
        // line 28
        echo "        </ul>
    </div>
    <div class=\"g-files g-block g-filemode-";
        // line 30
        echo twig_escape_filter($this->env, ($context["files_mode"] ?? null), "html", null, true);
        echo "\">
        ";
        // line 31
        $this->loadTemplate("ajax/filepicker/files.html.twig", "@gantry-admin/ajax/filepicker.html.twig", 31)->display(array_merge($context, array("files" => ($context["files"] ?? null), "value" => ($context["value"] ?? null))));
        // line 32
        echo "    </div>
</div>
";
        // line 35
        echo "<div class=\"g-particles-footer settings-block clearfix\">
    <div class=\"float-left footer-upload-info font-small\">
        ";
        // line 37
        echo $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_FILEPICKER_UPLOAD_DESC");
        echo "
        <br/>
        ";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_FILEPICKER_CURRENT_FILTERS"), "html", null, true);
        echo " ";
        echo ((($context["filter"] ?? null)) ? ((("<code>" . ($context["filter"] ?? null)) . "</code>")) : ((("<strong>" . $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_FILEPICKER_NO_FILTER")) . "</strong>")));
        // line 40
        echo "
    </div>
    <div class=\"float-right\">
        <button href=\"#\" class=\"button button-primary\" data-select=\"\">";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_SELECT"), "html", null, true);
        echo "</button>
        <button href=\"#\" class=\"button g5-dialog-close\">";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_CANCEL"), "html", null, true);
        echo "</button>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@gantry-admin/ajax/filepicker.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  169 => 44,  165 => 43,  160 => 40,  156 => 39,  151 => 37,  147 => 35,  143 => 32,  141 => 31,  137 => 30,  133 => 28,  131 => 25,  115 => 22,  101 => 21,  99 => 20,  92 => 18,  85 => 17,  68 => 16,  61 => 14,  56 => 13,  39 => 12,  30 => 6,  26 => 5,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@gantry-admin/ajax/filepicker.html.twig", "/var/www/html/wp-content/plugins/gantry5/admin/templates/ajax/filepicker.html.twig");
    }
}
