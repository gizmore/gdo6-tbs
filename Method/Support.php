<?php
namespace GDO\TBS\Method;

use GDO\UI\MethodPage;
use GDO\Core\Website;

final class Support extends MethodPage
{
    public function getTitleLangKey() { return 'tbs_support'; }
    
    public function onInit()
    {
        $webroot = GDO_WEB_ROOT;
        $css = <<<END
        p.contribs {
            margin: 5px 10px 0px 10px;
            text-align: justify;
        }
        ul.list {
            padding: 4px 8px 4px 28px;
        }
        ul.list, ul.list li {
            list-style-image:url({$webroot}GDO/TBS/images/misc/bullet1.gif);
        }
        END;
        Website::addInlineCSS($css);
    }
    
}
