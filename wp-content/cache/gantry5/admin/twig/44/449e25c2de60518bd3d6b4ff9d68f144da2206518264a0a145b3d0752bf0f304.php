<?php

/* ajax/filepicker/files.html.twig */
class __TwigTemplate_0327826fabb02fb1ec40617b4fdacb37cb4a67cffd51f39e083025b19f697e55 extends Twig_Template
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
        // line 21
        echo "
<ul class=\"g-list-labels\">
    <li>
        <span class=\"g-file-thumb\"></span>
        <span class=\"g-file-name\">";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_NAME"), "html", null, true);
        echo "</span>
        <span class=\"g-file-size\">";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_SIZE"), "html", null, true);
        echo "</span>
        <span class=\"g-file-mtime\">";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_LATEST_MODIFIED"), "html", null, true);
        echo "</span>
    </li>
</ul>
<ul>
    ";
        // line 31
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["files"] ?? null));
        foreach ($context['_seq'] as $context["index"] => $context["file"]) {
            // line 32
            echo "        <li data-file=\"";
            echo twig_escape_filter($this->env, twig_jsonencode_filter($context["file"]), "html_attr");
            echo "\" data-file-url=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["file"], "pathname", array()), "html", null, true);
            echo "\"";
            echo ((($this->getAttribute($context["file"], "pathname", array()) == ($context["value"] ?? null))) ? (" class=\"selected\"") : (""));
            echo "
            title=\"";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($context["file"], "filename", array()), "html", null, true);
            echo " (";
            echo $this->getAttribute($this, "bytesToSize", array(0 => $this->getAttribute($context["file"], "size", array())), "method");
            echo ")\">
            ";
            // line 34
            if ($this->getAttribute($context["file"], "isInCustom", array())) {
                // line 35
                echo "                <span class=\"g-file-delete\" data-g-file-delete data-dz-remove title=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_FILE_REMOVE"), "html", null, true);
                echo "\">
                    <i class=\"fa fa-fw fa-trash-o\" aria-hidden=\"true\"></i>
                </span>
            ";
            }
            // line 39
            echo "            ";
            if ($this->getAttribute($context["file"], "isImage", array())) {
                // line 40
                echo "                <span class=\"g-file-preview\" data-g-file-preview title=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_FILE_PREVIEW"), "html", null, true);
                echo "\">
                    <i class=\"fa fa-fw fa-eye\" aria-hidden=\"true\"></i>
                </span>
                <div class=\"g-thumb g-image g-image-";
                // line 43
                echo twig_escape_filter($this->env, $this->getAttribute($context["file"], "extension", array()), "html", null, true);
                echo "\">
                    <div style=\"background-image: url('";
                // line 44
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute($context["file"], "pathname", array())), "html", null, true);
                echo "')\"></div>
                </div>
            ";
            } else {
                // line 47
                echo "                <div class=\"g-thumb\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["file"], "extension", array()), "html", null, true);
                echo "</div>
            ";
            }
            // line 49
            echo "
            <span class=\"g-file-name\">";
            // line 50
            echo twig_escape_filter($this->env, $this->getAttribute($context["file"], "filename", array()), "html", null, true);
            echo "</span>
            <span class=\"g-file-size\">";
            // line 51
            echo $this->getAttribute($this, "bytesToSize", array(0 => $this->getAttribute($context["file"], "size", array())), "method");
            echo "</span>
            <span class=\"g-file-mtime\">";
            // line 52
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["file"], "mtime", array()), "j M o"), "html", null, true);
            echo "</span>
        </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['index'], $context['file'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 55
        echo "
    ";
        // line 56
        if ((twig_length_filter($this->env, ($context["files"] ?? null)) == 0)) {
            // line 57
            echo "        <li class=\"no-files-found\"><h2>";
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_FOLDER_EMPTY"), "html", null, true);
            echo "</h2></li>
    ";
        }
        // line 59
        echo "</ul>
";
    }

    // line 1
    public function getbytesToSize($__bytes__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "bytes" => $__bytes__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            ob_start();
            // line 3
            echo "        ";
            $context["kilobyte"] = 1024;
            // line 4
            echo "        ";
            $context["megabyte"] = (($context["kilobyte"] ?? null) * 1024);
            // line 5
            echo "        ";
            $context["gigabyte"] = (($context["megabyte"] ?? null) * 1024);
            // line 6
            echo "        ";
            $context["terabyte"] = (($context["gigabyte"] ?? null) * 1024);
            // line 7
            echo "
        ";
            // line 8
            if ((($context["bytes"] ?? null) < ($context["kilobyte"] ?? null))) {
                // line 9
                echo "            ";
                echo twig_escape_filter($this->env, (($context["bytes"] ?? null) . " B"), "html", null, true);
                echo "
        ";
            } elseif ((            // line 10
($context["bytes"] ?? null) < ($context["megabyte"] ?? null))) {
                // line 11
                echo "            ";
                echo twig_escape_filter($this->env, (twig_number_format_filter($this->env, (($context["bytes"] ?? null) / ($context["kilobyte"] ?? null)), 2, ".") . " KB"), "html", null, true);
                echo "
        ";
            } elseif ((            // line 12
($context["bytes"] ?? null) < ($context["gigabyte"] ?? null))) {
                // line 13
                echo "            ";
                echo twig_escape_filter($this->env, (twig_number_format_filter($this->env, (($context["bytes"] ?? null) / ($context["megabyte"] ?? null)), 2, ".") . " MB"), "html", null, true);
                echo "
        ";
            } elseif ((            // line 14
($context["bytes"] ?? null) < ($context["terabyte"] ?? null))) {
                // line 15
                echo "            ";
                echo twig_escape_filter($this->env, (twig_number_format_filter($this->env, (($context["bytes"] ?? null) / ($context["gigabyte"] ?? null)), 2, ".") . " GB"), "html", null, true);
                echo "
        ";
            } else {
                // line 17
                echo "            ";
                echo twig_escape_filter($this->env, (twig_number_format_filter($this->env, (($context["bytes"] ?? null) / ($context["terabyte"] ?? null)), 2, ".") . " TB"), "html", null, true);
                echo "
        ";
            }
            // line 19
            echo "    ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "ajax/filepicker/files.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  195 => 19,  189 => 17,  183 => 15,  181 => 14,  176 => 13,  174 => 12,  169 => 11,  167 => 10,  162 => 9,  160 => 8,  157 => 7,  154 => 6,  151 => 5,  148 => 4,  145 => 3,  143 => 2,  131 => 1,  126 => 59,  120 => 57,  118 => 56,  115 => 55,  106 => 52,  102 => 51,  98 => 50,  95 => 49,  89 => 47,  83 => 44,  79 => 43,  72 => 40,  69 => 39,  61 => 35,  59 => 34,  53 => 33,  44 => 32,  40 => 31,  33 => 27,  29 => 26,  25 => 25,  19 => 21,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "ajax/filepicker/files.html.twig", "/var/www/html/wp-content/plugins/gantry5/admin/templates/ajax/filepicker/files.html.twig");
    }
}
