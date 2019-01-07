<?php

class Index11
{
    private $model;

    public function __construct(Model11 $model)
    {
        $this->model = $model;
    }

    public function execute()
    {
        $file = $this->model->getData();
        if (isset($file['status']) and (int)$file['status'] === 400) {
            return ['status' => 'error', 'des' => 'error'];
        }
        if (isset($file['status']) and (int)$file['status'] === 500) {
            return ['status' => 'error', 'des' => 'error'];
        }
        $file = $this->reformatFileData($file);
        return $file;
    }

    private function reformatFileData($file)
    {
        $highest = []; // 取得最高pv 用
        $total_pv = 0; // 計算平均pv 用
        $c = 0;
        $tmp = []; // 排序用陣列
        $a_tmp = []; // 暫存文章待排序用陣列
        $rs = [];
        foreach ($file as $k => $v) {
            if (empty($highest)) {
                $highest[] = (int)$v['page_view'];
            } else {
                $highest[0] = ((int)$v['page_view'] > $highest[0]) ? (int)$v['page_view'] : $highest[0];
            }
            $total_pv += (int)$v['page_view'];
            $a_tmp[] = [
                'title' => $v['title'],
                'summary' => $v['summary'],
                'letter_count' => strlen($v['summary']),
                'page_view' => $v['page_view']
            ];
            $tmp[] = $v['page_view'];
            $c++;
        }
        $rs['highest_pv'] = $highest[0];
        $rs['avg_pv'] = ($total_pv / $c);
        arsort($tmp);
        foreach ($tmp as $k => $v) {
            $rs['articles'][] = $a_tmp[$k];
        }
        return $rs;
    }
}

class Model11
{
    public function getData()
    {
        $file = file_get_contents('http://35.236.189.133/tdd_practice_api/public/index.php/api/article?q=1&t=data');
        return json_decode($file, 200);
    }
}