<?php

/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 13-9-20
 * Time: 下午6:15
 * To change this template use File | Settings | File Templates.
 */
class TesAction extends PublicAction {

    public function index() {
        $resPath = C('TMPL_PARSE_STRING.__RESOURCES__');
        $folder = $this->getResource($resPath);
        var_dump($folder);
    }

}
