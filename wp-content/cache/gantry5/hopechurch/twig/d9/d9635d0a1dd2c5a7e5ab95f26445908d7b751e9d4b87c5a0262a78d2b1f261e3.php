<?php

/* @particles/wpfc-contact-info.html.twig */
class __TwigTemplate_e167c10ade96093427256e7c437b005c96e541310ab6aea2debe710b1b0e76e2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@nucleus/partials/particle.html.twig", "@particles/wpfc-contact-info.html.twig", 1);
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
        $this->loadTemplate("@particles/wpfc-assets/common/views/partials/particle-header.html.twig", "@particles/wpfc-contact-info.html.twig", 18)->display($context);
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
                if ($this->getAttribute($context["item"], "link", array())) {
                    echo "<a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "link", array()), "html", null, true);
                    echo "\" target=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "target", array()), "html", null, true);
                    echo "\">";
                }
                // line 26
                echo "                                ";
                if ($this->getAttribute($this->getAttribute($context["item"], "icon", array()), "icon", array())) {
                    echo "<i class=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["item"], "icon", array()), "icon", array()), "html", null, true);
                    echo "\"></i>";
                }
                // line 27
                echo "                                <div class=\"wpfc-content-wrapper\">
                                    ";
                // line 28
                if ($this->getAttribute($this->getAttribute($context["item"], "title", array()), "text", array())) {
                    echo "<div class=\"wpfc-title\">";
                    echo $this->getAttribute($this->getAttribute($context["item"], "title", array()), "text", array());
                    echo "</div>";
                }
                // line 29
                echo "                                    ";
                if ($this->getAttribute($this->getAttribute($context["item"], "description", array()), "text", array())) {
                    echo "<div class=\"wpfc-description\">";
                    echo $this->getAttribute($this->getAttribute($context["item"], "description", array()), "text", array());
                    echo "</div>";
                }
                // line 30
                echo "                                </div>
                            ";
                // line 31
                if ($this->getAttribute($context["item"], "link", array())) {
                    echo "</a>";
                }
                // line 32
                echo "                        </div>
                    </li>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 35
            echo "            </ul>
        ";
        }
        // line 37
        echo "        
        ";
        // line 38
        if ($this->getAttribute(($context["particle"] ?? null), "social", array())) {
            // line 39
            echo "            <div class=\"wpfc-social-items\">
                ";
            // line 40
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["particle"] ?? null), "social", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 41
                echo "                    <a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "link", array()), "html", null, true);
                echo "\" target=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "target", array()), "html", null, true);
                echo "\">
                        <i class=\"";
                // line 42
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["item"], "icon", array()), "icon", array()), "html", null, true);
                echo "\"></i>
                    </a>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 45
            echo "            </div>
        ";
        }
        // line 47
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "@particles/wpfc-contact-info.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  166 => 47,  162 => 45,  153 => 42,  146 => 41,  142 => 40,  139 => 39,  137 => 38,  134 => 37,  130 => 35,  122 => 32,  118 => 31,  115 => 30,  108 => 29,  102 => 28,  99 => 27,  92 => 26,  84 => 25,  78 => 23,  74 => 22,  71 => 21,  69 => 20,  66 => 19,  63 => 18,  58 => 16,  55 => 14,  52 => 13,  49 => 12,  46 => 11,  43 => 10,  40 => 8,  37 => 7,  34 => 6,  31 => 4,  28 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@particles/wpfc-contact-info.html.twig", "/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/particles/wpfc-contact-info.html.twig");
    }
}
