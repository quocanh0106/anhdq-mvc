<?php
namespace mvc;

class Router
{

    static public function parse($url, $request)
    {
        /* loại bỏ khoảng trắng thừa */
        $url = trim($url);

        //gán trang /mvc là controller/action/paramaram */
    if ($url == "/mvc/")
        {
            $request->controller = "Tasks";
            $request->action = "index";
            $request->params = [];
        }
        else
        {
            /* tách các kí tự bắt đầu bằng / trong $url thành phần tử của 1 mảng */
            $explode_url = explode('/', $url);
            /* giữ lại 3 phần tử đầu tiên của $explode_url */
            $explode_url = array_slice($explode_url, 2);
            /* controller là phần từ số 0 của mảng */
            $request->controller = $explode_url[0];
            /* action là phần từ số 1 của mảng */
            $request->action = $explode_url[1];
            /* param là phần từ số 2 của mảng */
            $request->params = array_slice($explode_url, 2);
        }

    }
}
?>