
<?php

defined("G_IN_ADMIN") || exit("No permission resources.");
echo "<!DOCTYPE html>\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\r\n<title></title>\r\n<link rel=\"stylesheet\" href=\"";
echo G_GLOBAL_STYLE;
echo "/global/css/global.css\" type=\"text/css\">\r\n<link rel=\"stylesheet\" href=\"";
echo G_GLOBAL_STYLE;
echo "/global/css/style.css\" type=\"text/css\">\r\n <style>\r\n \tth{ border:0px solid #000;}\r\n </style>\r\n</head>\r\n<body>\r\n<div class=\"header lr10\">\r\n    ";
echo headerment($ments);
echo "</div>\r\n<div class=\"bk10\"></div>\r\n<div class=\"table-list lr10\">\r\n <table width=\"100%\" cellspacing=\"0\">\r\n    <thead>\r\n         <tr>\r\n            <th width=\"60\">ID</th>\r\n            <th align='center'>功能名称</th>\r\n            <th align='center' width='70'>是否启用</th>\r\n             <th align='center' width='70'>是否菜单</th>\r\n             <th align='center' width='70'>模块</th>\r\n             <th align='center' width='70'>功能</th>\r\n\t\t\t<th align='center'>管理操作</th>\r\n         </tr>\r\n    </thead>\r\n    <tbody>\r\n    ";
if (is_array($data) && (0 < count($data))) {
    foreach ($data as $v ) {
        echo "    <tr>\r\n        <td width=\"60\">";
        echo $v["id"];
        echo "</td>\r\n        <td>";
        echo $v["name"];
        echo "</td>\r\n        <td align='center' width='70'>";

        if ($v["is_enable"] == 1) {
            echo "是";
        }
        else {
            echo "否";
        }

        echo "</td>\r\n        <td align='center' width='70'>";

        if ($v["type"] == 1) {
            echo "<span style='color:green;'>是</span>";
        }
        else {
            echo "否";
        }

        echo "</td>\r\n        <td width=\"300\">";
        echo $v["c"];
        echo "</td>\r\n        <td width=\"300\">";
        echo $v["a"];
        echo "</td>\r\n        <td align='center'>\r\n            <a href=\"";
        echo G_MODULE_PATH;
        echo "/auth/fun_edit/";
        echo $v["id"];
        echo "\">修改</a>\r\n            <a href=\"";
        echo G_MODULE_PATH;
        echo "/auth/fun_del/";
        echo $v["id"];
        echo "\" onClick=\"return confirm('是否真的删除！');\">删除</a>\r\n        </td>\r\n    </tr>\r\n    ";
    }
}

echo "    </tbody>\r\n  </table>\r\n</div>\r\n</body>\r\n</html> ";

?>
