<?php  
class Zend_View_Helper_Article extends Zend_View_Helper_Abstract 
{ 
    function article($title = 'default a title') { 
        $url = "/articles";
        echo '<a href="' . $url . '"">' . $title . '</a>';
        echo 'I`m article helper';
        return 'dupeczka';
    } 
}