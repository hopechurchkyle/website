<?php

/* @particles/wpfc-list.html.twig */
class __TwigTemplate_8611227a8ff2431ce4db2474b99f9fc3dea2d47dca262936bde5ef943cd0be75 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@nucleus/partials/particle.html.twig", "@particles/wpfc-list.html.twig", 1);
        $this->blocks = array(
            'particle' => array($this, 'block_particle'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@nucleus/partials/particle.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_particle($context, array $blocks = array())
    {
        // line 4
        echo "    
    ";
        // line 6
        echo "    ";
        $context["scope"] = ($context["particle"] ?? null);
        // line 7
        echo "    ";
        $context["grid"] = $this->getAttribute(($context["particle"] ?? null), "grid", array());
        // line 8
        echo "
    ";
        // line 10
        echo "    ";
        $context["size"] = ("size-" . twig_replace_filter(twig_number_format_filter($this->env, (100 / $this->getAttribute(($context["grid"] ?? null), "columns", array())), 1, "-"), array("-0" => "")));
        // line 11
        echo "    ";
        $context["tablet_size"] = ("wpfc-" . $this->getAttribute($this->getAttribute(($context["grid"] ?? null), "tablet", array()), "columns", array()));
        // line 12
        echo "    ";
        $context["phone_size"] = ("wpfc-" . $this->getAttribute($this->getAttribute(($context["grid"] ?? null), "phone", array()), "columns", array()));
        // line 13
        echo "    ";
        $context["class_block"] = twig_join_filter(array(0 => ($context["size"] ?? null), 1 => ($context["tablet_size"] ?? null), 2 => ($context["phone_size"] ?? null)), " ");
        // line 14
        echo "
    ";
        // line 16
        echo "    <div class=\"";
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "\">
        ";
        // line 18
        echo "        ";
        $this->loadTemplate("@particles/wpfc-assets/common/views/partials/particle-header.html.twig", "@particles/wpfc-list.html.twig", 18)->display($context);
        // line 19
        echo "
        ";
        // line 20
        if ($this->getAttribute(($context["particle"] ?? null), "items", array())) {
            // line 21
            echo "            <ul class=\"g-grid\">
                ";
            // line 22
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["particle"] ?? null), "items", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 23
                echo "                    <li class=\"g-block ";
                echo twig_escape_filter($this->env, ($context["class_block"] ?? null), "html", null, true);
                echo "\">
                        <div class=\"wpfc-inner\">
                            ";
                // line 25
                if (($this->getAttribute($context["item"], "link", array()) && $this->getAttribute($this->getAttribute($context["item"], "title", array()), "text", array()))) {
                    // line 26
                    echo "                                <a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "link", array()), "html", null, true);
                    echo "\" target=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "target", array()), "html", null, true);
                    echo "\">
                                    ";
                    // line 27
                    if ($this->getAttribute($this->getAttribute($context["item"], "icon", array()), "icon", array())) {
                        echo "<i class=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["item"], "icon", array()), "icon", array()), "html", null, true);
                        echo "\"></i>";
                    }
                    // line 28
                    echo "                                    ";
                    if ($this->getAttribute($this->getAttribute($context["item"], "title", array()), "text", array())) {
                        echo "<span class=\"wpfc-title\">";
                        echo $this->getAttribute($this->getAttribute($context["item"], "title", array()), "text", array());
                        echo "</span>";
                    }
                    // line 29
                    echo "                                </a>
                            ";
                } else {
                    // line 31
                    echo "                                ";
                    if ($this->getAttribute($this->getAttribute($context["item"], "icon", array()), "icon", array())) {
                        echo "<i class=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["item"], "icon", array()), "icon", array()), "html", null, true);
                        echo "\"></i>";
                    }
                    // line 32
                    echo "                                ";
                    if ($this->getAttribute($this->getAttribute($context["item"], "title", array()), "text", array())) {
                        echo "<span class=\"wpfc-title\">";
                        echo $this->getAttribute($this->getAttribute($context["item"], "title", array()), "text", array());
                        echo "</span>";
                    }
                    // line 33
                    echo "                            ";
                }
                // line 34
                echo "                        </div>
                    </li>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 37
            echo "            </ul>
        ";
        }
        // line 39
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "@particles/wpfc-list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  139 => 39,  135 => 37,  127 => 34,  124 => 33,  117 => 32,  110 => 31,  106 => 29,  99 => 28,  93 => 27,  86 => 26,  84 => 25,  78 => 23,  74 => 22,  71 => 21,  69 => 20,  66 => 19,  63 => 18,  58 => 16,  55 => 14,  52 => 13,  49 => 12,  46 => 11,  43 => 10,  40 => 8,  37 => 7,  34 => 6,  31 => 4,  28 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@particles/wpfc-list.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/particles/wpfc-list.html.twig");
    }
}
