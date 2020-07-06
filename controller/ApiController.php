<?php

//开发中
class ApiController
{
  
    public $驱动器;
    public $path;
    public $drives;
    // public $配置文件;
public function __call($method,$ages){
		// 遍历参数$args
		$var = '';
		foreach ($ages as $value) {
			$var .= $value.',';
		}
		return '方法是'.$method.'('.$var.')'.'不存在';
		
	}

    public function __construct()
    {  //Access-Control-Allow-Methods
    header("Access-Control-Allow-Origin: *"); 
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS,DELETE,MOVE,PATH,COPY,RENAME,CREAT,VIEW,PUT"); 
        $varrr = explode('/', $_SERVER['REQUEST_URI']);
        $驱动器 = $varrr['1'];
        $this->$drives=$驱动器;
        array_splice($varrr, 0, 1);
        unset($varrr['0']);
        $请求路径 = implode('/', $varrr);
        $请求路径 = str_replace('?'.$_SERVER['QUERY_STRING'], '', $请求路径);
        $配置文件 = include ROOT.'config/'.$驱动器.'.php';
        $this->$path = $请求路径;
        onedrive::$access_token = $配置文件['access_token'];

        onedrive::$typeurl = $配置文件['api'];
    }

    //功能正常
    public function move()
    {if(!is_login() ){http_response_code(401);exit;}
        $id = ($_GET['id']);
        $id = str_replace('"', '', $id);
        $id = str_replace('[', '', $id);
        $id = str_replace(']', '', $id);
        $ids = explode(',', $id);
        var_dump($ids);
        $newid = $_GET['newid'];
        onedrive::批量移动($ids, $newid);
        echo 'api';
    }
 //功能正常
    public function path()
    {
       
        echo $当前目录id = onedrive::pathtoid(onedrive::$access_token, $this->$path);
    }
//功能正常
    public function put()
    {if(!is_login() && config("guestupload")=="" ){http_response_code(401);exit;}
        $varrr = explode('/', $_SERVER['REQUEST_URI']);
        $驱动器 = $varrr['1'];
        array_splice($varrr, 0, 1);
        unset($varrr['0']);
        $请求路径 = implode('/', $varrr);

        $请求路径 = str_replace('?'.$_SERVER['QUERY_STRING'], '', $请求路径);
        $filename = $_GET['upbigfilename'];
        $path = $请求路径.$filename;
        $path = onedrive::urlencode($path);
        $path = empty($path) ? '/' : ":/{$path}:/";
        $access_token = onedrive::$access_token;
        $request['headers'] = "Authorization: bearer {$access_token}".PHP_EOL.'Content-Type: application/json'.PHP_EOL;
        $request['url'] = onedrive::$typeurl.$path.'createUploadSession';
        $request['post_data'] = '{"item": {"@microsoft.graph.conflictBehavior": "rename"}}';
        $resp = fetch::post($request);
        $data = json_decode($resp->content, true);
        if ($resp->http_code == 409) {
            return false;
        }

        echo $resp->content;
    }

    //功能正常
    public function delete()
    {if(!is_login() ){if(!is_login() ){http_response_code(401);exit;}}
        echo ' 删除文件';
        if ($_GET['action'] == 'dellist') {
            $bodyData = @file_get_contents('php://input');
            $ss = json_decode($bodyData, true);
            if (!is_array($ss)) {
                $ss = array(
     0 => $ss, );
            }

            var_dump($ss);

            echo  onedrive::delete($ss);
        }
    }
//功能正常
    public function rename()
    {if(!is_login() ){if(!is_login() ){http_response_code(401);exit;}}
        onedrive::rename($_GET['rename'], $_GET['name']);
    }

    //功能正常
    public function creat()
    {if(!is_login() ){if(!is_login() ){http_response_code(401);exit;}}
        echo '创建文件夹';
        $varrr = explode('/', $_SERVER['REQUEST_URI']);
        $驱动器 = $varrr['1'];
        array_splice($varrr, 0, 1);
        unset($varrr['0']);
        $请求路径 = implode('/', $varrr);

        $请求路径 = str_replace('?'.$_SERVER['QUERY_STRING'], '', $请求路径);

        var_dump(onedrive::create_folder($请求路径, $_GET['create_folder']));
    }
    
    public function cache(){
       var_dump(oneindex::refresh_current_cache("/uploads/")) ;
    }
}
