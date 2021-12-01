<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* modules/custom/leelee/templates/leeleeguestbook.html.twig */
class __TwigTemplate_c4bba5a1876fb0a20ad45265e39273000814f57b73f09310c138b5d2790186f6 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("leelee/leelees.entity"), "html", null, true);
        echo "
<div class=\"content\">
  <div class=\"form\">";
        // line 3
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["form"] ?? null), 3, $this->source), "html", null, true);
        echo "</div>
  ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 5
            echo "  <div class=\"content-review\">
      <div class=\"user-info\">
        <div class=\"user-ava\">
          <div class=\"avatar\">";
            // line 8
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["row"], "avatar__target_id", [], "any", false, false, true, 8), "data", [], "any", false, false, true, 8)) {
                // line 9
                echo "              ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["row"], "avatar__target_id", [], "any", false, false, true, 9), 9, $this->source), "html", null, true);
                echo "
            ";
            } else {
                // line 11
                echo "              <img src=\"modules/custom/leelee/files/non-avatar.png\" alt=\"default_user\">
            ";
            }
            // line 12
            echo "</div>
        </div>
        <div class=\"user-variables\">
          <div class=\"name\">";
            // line 15
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["row"], "name", [], "any", false, false, true, 15), 15, $this->source), "html", null, true);
            echo "</div>
          <div class=\"email\">";
            // line 16
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["row"], "email", [], "any", false, false, true, 16), 16, $this->source), "html", null, true);
            echo "</div>
          <div class=\"phone_number\">";
            // line 17
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["row"], "phone_number", [], "any", false, false, true, 17), 17, $this->source), "html", null, true);
            echo "</div>
          <div class=\"timestamp\">";
            // line 18
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_date_format_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["row"], "timestamp", [], "any", false, false, true, 18), 18, $this->source), "M-d-Y H:i:s"), "html", null, true);
            echo "</div>
        </div>
      </div>
      <div class=\"user-response\">
        <div class=\"response\">";
            // line 22
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["row"], "response", [], "any", false, false, true, 22), 22, $this->source), "html", null, true);
            echo "</div>
        <div class=\"image\">";
            // line 23
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["row"], "image__target_id", [], "any", false, false, true, 23), 23, $this->source), "html", null, true);
            echo "</div>
      </div>
    ";
            // line 25
            if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasPermission", [0 => "administer nodes"], "method", false, false, true, 25)) {
                // line 26
                echo "      <div class=\"guestbook_buttons\">
        <a href=\"/guestbook/edit/";
                // line 27
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["row"], "id", [], "any", false, false, true, 27), 27, $this->source), "html", null, true);
                echo "\" class=\"use-ajax guestbook-edit\" data-dialog-type=\"modal\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Edit"));
                echo "</a>
        <a href=\"/guestbook/delete/";
                // line 28
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["row"], "id", [], "any", false, false, true, 28), 28, $this->source), "html", null, true);
                echo "\" class=\"use-ajax guestbook-delete\" data-dialog-type=\"modal\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Delete"));
                echo "</a>
      </div>
    ";
            }
            // line 31
            echo "  </div>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "</div>



";
    }

    public function getTemplateName()
    {
        return "modules/custom/leelee/templates/leeleeguestbook.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  128 => 33,  121 => 31,  113 => 28,  107 => 27,  104 => 26,  102 => 25,  97 => 23,  93 => 22,  86 => 18,  82 => 17,  78 => 16,  74 => 15,  69 => 12,  65 => 11,  59 => 9,  57 => 8,  52 => 5,  48 => 4,  44 => 3,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/leelee/templates/leeleeguestbook.html.twig", "/var/www/web/modules/custom/leelee/templates/leeleeguestbook.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("for" => 4, "if" => 8);
        static $filters = array("escape" => 1, "date" => 18, "trans" => 27);
        static $functions = array("attach_library" => 1);

        try {
            $this->sandbox->checkSecurity(
                ['for', 'if'],
                ['escape', 'date', 'trans'],
                ['attach_library']
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
