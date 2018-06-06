<?php

/* @nucleus/page.html.twig */
class __TwigTemplate_005547a99c192151a99c5b5004469c9154622af587cfca158c7f3dda6052aad5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'page_offcanvas' => array($this, 'block_page_offcanvas'),
            'page_layout' => array($this, 'block_page_layout'),
            'page_top' => array($this, 'block_page_top'),
            'page_bottom' => array($this, 'block_page_bottom'),
            'body_top' => array($this, 'block_body_top'),
            'body_bottom' => array($this, 'block_body_bottom'),
            'page_head' => array($this, 'block_page_head'),
            'page_footer' => array($this, 'block_page_footer'),
            'page' => array($this, 'block_page'),
            'page_body' => array($this, 'block_page_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "debugger", array()), "startTimer", array(0 => "render", 1 => "Rendering page"), "method");
        // line 2
        $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "theme", array()), "setLayout", array(), "method");
        // line 3
        $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "theme", array()), "loadAtoms", array(), "method");
        // line 4
        $context["segments"] = $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "theme", array()), "segments", array(), "method");
        // line 6
        ob_start();
        // line 7
        echo "    ";
        if ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "theme", array()), "hasContent", array(), "method")) {
            // line 8
            echo "        ";
            $this->displayBlock('content', $context, $blocks);
            // line 10
            echo "    ";
        }
        $context["content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 13
        $context["offcanvas"] = null;
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["segments"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["segment"]) {
            if (($this->getAttribute($context["segment"], "type", array()) == "offcanvas")) {
                // line 15
                $context["offcanvas"] = $context["segment"];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['segment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        ob_start();
        // line 19
        echo "    ";
        $this->displayBlock('page_offcanvas', $context, $blocks);
        $context["page_offcanvas"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 26
        $context["page_offcanvas"] = ((twig_trim_filter(($context["page_offcanvas"] ?? null))) ? (twig_trim_filter(($context["page_offcanvas"] ?? null))) : (""));
        // line 27
        $context["offcanvas_position"] = ((($context["page_offcanvas"] ?? null)) ? ((($this->getAttribute($this->getAttribute(($context["offcanvas"] ?? null), "attributes", array(), "any", false, true), "position", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["offcanvas"] ?? null), "attributes", array(), "any", false, true), "position", array()), "g-offcanvas-left")) : ("g-offcanvas-left"))) : (""));
        // line 29
        ob_start();
        // line 30
        echo "    ";
        $this->displayBlock('page_layout', $context, $blocks);
        $context["page_layout"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 37
        ob_start();
        // line 38
        echo "    ";
        $this->displayBlock('page_top', $context, $blocks);
        // line 40
        echo "    ";
        echo twig_join_filter($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "document", array()), "getHtml", array(0 => "top"), "method"), "
    ");
        echo "
";
        $context["page_top"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 43
        ob_start();
        // line 44
        echo "    ";
        $this->displayBlock('page_bottom', $context, $blocks);
        // line 46
        echo "    ";
        echo twig_join_filter($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "document", array()), "getHtml", array(0 => "bottom"), "method"), "
    ");
        echo "
";
        $context["page_bottom"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 49
        ob_start();
        // line 50
        echo "    ";
        $this->displayBlock('body_top', $context, $blocks);
        // line 52
        echo "    ";
        echo twig_join_filter($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "document", array()), "getHtml", array(0 => "body_top"), "method"), "
    ");
        echo "
";
        $context["body_top"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 55
        ob_start();
        // line 56
        echo "    ";
        $this->displayBlock('body_bottom', $context, $blocks);
        // line 58
        echo "    ";
        echo twig_join_filter($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "document", array()), "getHtml", array(0 => "body_bottom"), "method"), "
    ");
        echo "
";
        $context["body_bottom"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 61
        $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "document", array()), "addScript", array(0 => $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("gantry-assets://js/main.js"), 1 => 11, 2 => "footer"), "method");
        // line 65
        ob_start();
        // line 66
        echo "    ";
        $this->displayBlock('page_head', $context, $blocks);
        $context["page_head"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 71
        ob_start();
        // line 72
        echo "    ";
        $this->displayBlock('page_footer', $context, $blocks);
        // line 76
        echo "
    ";
        // line 77
        echo $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "debugger", array()), "render", array(), "method");
        echo "
";
        $context["page_footer"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 80
        $this->displayBlock('page', $context, $blocks);
    }

    // line 8
    public function block_content($context, array $blocks = array())
    {
        // line 9
        echo "        ";
    }

    // line 19
    public function block_page_offcanvas($context, array $blocks = array())
    {
        // line 20
        echo "        ";
        if (($context["offcanvas"] ?? null)) {
            // line 21
            echo "            ";
            $this->loadTemplate((("@nucleus/layout/" . $this->getAttribute(($context["offcanvas"] ?? null), "type", array())) . ".html.twig"), "@nucleus/page.html.twig", 21)->display(array_merge($context, array("segment" => ($context["offcanvas"] ?? null))));
        }
        // line 23
        echo "    ";
    }

    // line 30
    public function block_page_layout($context, array $blocks = array())
    {
        // line 31
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["segments"] ?? null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        foreach ($context['_seq'] as $context["_key"] => $context["segment"]) {
            if (($this->getAttribute($context["segment"], "type", array()) != "offcanvas")) {
                // line 32
                echo "        ";
                $this->loadTemplate((("@nucleus/layout/" . $this->getAttribute($context["segment"], "type", array())) . ".html.twig"), "@nucleus/page.html.twig", 32)->display(array_merge($context, array("segments" => $this->getAttribute($context["segment"], "children", array()))));
                // line 33
                echo "    ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['segment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "    ";
    }

    // line 38
    public function block_page_top($context, array $blocks = array())
    {
        // line 39
        echo "    ";
    }

    // line 44
    public function block_page_bottom($context, array $blocks = array())
    {
        // line 45
        echo "    ";
    }

    // line 50
    public function block_body_top($context, array $blocks = array())
    {
        // line 51
        echo "    ";
    }

    // line 56
    public function block_body_bottom($context, array $blocks = array())
    {
        // line 57
        echo "    ";
    }

    // line 66
    public function block_page_head($context, array $blocks = array())
    {
        // line 67
        $this->loadTemplate("partials/page_head.html.twig", "@nucleus/page.html.twig", 67)->display($context);
    }

    // line 72
    public function block_page_footer($context, array $blocks = array())
    {
        // line 73
        echo "        ";
        $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "platform", array()), "finalize", array(), "method");
        // line 74
        echo twig_join_filter($this->getAttribute(($context["gantry"] ?? null), "scripts", array(0 => "footer"), "method"), "
    ");
    }

    // line 80
    public function block_page($context, array $blocks = array())
    {
        // line 81
        echo "<!DOCTYPE ";
        echo (($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array(), "any", false, true), "page", array(), "any", false, true), "doctype", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array(), "any", false, true), "page", array(), "any", false, true), "doctype", array()), "html")) : ("html"));
        echo ">
<html";
        // line 82
        echo $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "page", array()), "htmlAttributes", array());
        echo ">
    ";
        // line 83
        echo ($context["page_head"] ?? null);
        echo "
    ";
        // line 84
        $this->displayBlock('page_body', $context, $blocks);
        // line 102
        echo "
</html>
";
    }

    // line 84
    public function block_page_body($context, array $blocks = array())
    {
        // line 85
        echo "<body";
        echo $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "page", array()), "bodyAttributes", array(0 => array("class" => array(0 => ($context["offcanvas_position"] ?? null), 1 => $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "page", array()), "preset", array()), 2 => ("g-style-" . $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "theme", array()), "preset", array()))))), "method");
        echo ">
        ";
        // line 86
        echo $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "page", array()), "body", array()), "body_top", array());
        echo "
        ";
        // line 87
        echo ($context["body_top"] ?? null);
        echo "
        ";
        // line 88
        echo ($context["page_offcanvas"] ?? null);
        echo "
        <div id=\"g-page-surround\">
            ";
        // line 90
        if (twig_trim_filter(($context["page_offcanvas"] ?? null))) {
            // line 91
            echo "<div class=\"g-offcanvas-hide g-offcanvas-toggle\" data-offcanvas-toggle aria-controls=\"g-offcanvas\" aria-expanded=\"false\"><i class=\"fa fa-fw fa-bars\"></i></div>";
        }
        // line 93
        echo "            ";
        echo ($context["page_top"] ?? null);
        echo "
            ";
        // line 94
        echo ($context["page_layout"] ?? null);
        echo "
            ";
        // line 95
        echo ($context["page_bottom"] ?? null);
        echo "
        </div>
        ";
        // line 97
        echo ($context["body_bottom"] ?? null);
        echo "
        ";
        // line 98
        echo ($context["page_footer"] ?? null);
        echo "
        ";
        // line 99
        echo $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", array()), "page", array()), "body", array()), "body_bottom", array());
        echo "
    </body>";
    }

    public function getTemplateName()
    {
        return "@nucleus/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  324 => 99,  320 => 98,  316 => 97,  311 => 95,  307 => 94,  302 => 93,  299 => 91,  297 => 90,  292 => 88,  288 => 87,  284 => 86,  279 => 85,  276 => 84,  270 => 102,  268 => 84,  264 => 83,  260 => 82,  255 => 81,  252 => 80,  247 => 74,  244 => 73,  241 => 72,  237 => 67,  234 => 66,  230 => 57,  227 => 56,  223 => 51,  220 => 50,  216 => 45,  213 => 44,  209 => 39,  206 => 38,  202 => 34,  192 => 33,  189 => 32,  177 => 31,  174 => 30,  170 => 23,  166 => 21,  163 => 20,  160 => 19,  156 => 9,  153 => 8,  149 => 80,  144 => 77,  141 => 76,  138 => 72,  136 => 71,  132 => 66,  130 => 65,  128 => 61,  121 => 58,  118 => 56,  116 => 55,  109 => 52,  106 => 50,  104 => 49,  97 => 46,  94 => 44,  92 => 43,  85 => 40,  82 => 38,  80 => 37,  76 => 30,  74 => 29,  72 => 27,  70 => 26,  66 => 19,  64 => 18,  57 => 15,  52 => 14,  50 => 13,  46 => 10,  43 => 8,  40 => 7,  38 => 6,  36 => 4,  34 => 3,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@nucleus/page.html.twig", "/var/www/html/wp-content/plugins/gantry5/engines/nucleus/templates/page.html.twig");
    }
}
