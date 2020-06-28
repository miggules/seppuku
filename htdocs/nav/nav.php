<?php
$menu = array(
    'home'  => array(
        'text'=> 'home',
        'url'=> '../index.php'
    ),
    'login'  => array(
        'text'=> 'log in',
        'url'=> 'login/user_index.php'
    ),
    'about' => array(
        'text'=> 'progress',
        'url'=> '?p=about'
    ),
    'logout' => array(
        'text' => 'log out',
        'url' => '../includes/logout.inc.php'
    ),
);

class CNavigation {
    public static function GenerateMenu($items) {
        $html = "<nav>\n";
        foreach($items as $item) {
            $html .= "<a href='{$item['url']}'>{$item['text']}</a>\n";
        }
        $html .= "</nav>\n";
        return $html;
    }
};

print CNavigation::GenerateMenu($menu);