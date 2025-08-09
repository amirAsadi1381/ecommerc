<?php
class querybuilder extends mainDB{
    public $limit;
    public $bace = '';
    public $type;
    public $where;
    public $subQuery;
    public $count;
    public $answer=false;
    public static $search='';
    public static function count(){
        $obj = static::createobj();
        $obj->bace = " SELECT count(*)"; 
        $obj->type = 'select';
        // var_dump($obj->bace);
    }
    public static function first($fields = ["*"]){
        $obj = static::createobj();
          $obj->bace = " SELECT " . implode(" , ",$fields);
          $obj->type = 'select';
        return $obj;
    }
    public static function delete(){
        $obj = static::createobj();
        $obj->bace = " DELETE " . " FROM " . $obj->tablename ;
        $obj->type = 'delete';
        return $obj;
    }
    public static function pagenate(){
$u = $_SERVER['REQUEST_URI'];
$uri = explode("/",$u);
if($uri[3] == 'page'){
    $x = $uri[4];
}
        $limit = 10;
        $offset = ($x-1)*10;
       $obj->bace = " SELECT " . " * " . " FROM " . $obj->tablename . " LIMIT " . $limit . " OFFSET " . $offset;
       $obj->type = 'pagenate'; 
        return $obj;
    }
    public static function select($fields = ["*"]){
        $obj = static::createobj();
        $obj->bace = " SELECT " . implode(" , ",$fields);
        $obj->type = 'select';
        return $obj;
}
    public static function subquerycount(array $datas){
        $obj = static::createobj();
        $tablename = $obj->tablename;
        $subQuery = "";
        foreach($datas as $key => $value){
            foreach($obj->relatedto as $tableee => $related){
                $subQuery = $value[0]::where($related[0],
                $related[1],["count(*)"]) ->get();
                $obj->bace .= " ,(". $subQuery .")" . "count";
                echo "<br>";
            }
        }  
        $obj->subQuery = $subQuery;
        return $obj;
    }
    public static function with(array $datas){
        $obj = static::createobj();
        $subQuery ="";
        if($obj->type==''){
            $obj->select();
        }
        $obj->type = "with";
        // var_dump($obj->bace);
        foreach($datas as $alias => $fields){
            foreach($obj->relatedto as $tablee => $related){
                $sub_query  = $fields[0]::where($obj->relatedto[$tablee][0], 
                $obj->relatedto[$tablee][1],[$fields[1]])->get();
                $subQuery .= ",(" . $sub_query .")" . "subQuery";
            }
        }
        $obj->answer=true;
        // var_dump($sub_query);
        $obj ->subQuery = $subQuery;
        $obj->bace .= $obj->subQuery;
        // var_dump($obj->bace);    
        // die();
        return $obj;
    }
    public static function from(){
        $obj = static::createobj();
        $tablename = $obj->tablename;
        $obj->bace .= " FROM {$tablename}";

        return $obj;
    }
    public static function insert($data){
        $obj = static::createobj();

        $keys=array_keys($data);
        foreach($data as $values){
            $value[]=$values;
        }
        $obj->bace = " INSERT " . " INTO " . $obj->tablename . "(".implode(" , ",$keys) .")" . " VALUES " ."( '". implode("' , '",$value) . "')";
        $obj->type = 'insert'; 
        return $obj;
    }
    public static function find($field,$id){
        $obj = static::createobj();
        return static::select()->where($field,$id)->getsql();
    }
    public static function all(){
        $obj = static::createobj();
        $code = $obj->type = 'select';
        if(in_array($code,['select'])){
            return static::select()->getsql();
        }else{
            echo "null";
        }
    }
    public static function update($data,$equal = '=',$commo = ','){
        var_dump($data);
        $obj = static::createobj();

        $resulte='';
        $ke = array_keys($data);
        $p = array_pop($ke);
        $a = array_pop($data);
        $kv[$p] = $a;
        foreach($kv as $keys=>$values){
            $resulte1 = $keys . $equal . "'" . $values . "'";
        }
    $obj->bace = " UPDATE " . $obj->tablename . " SET " . $resulte1;
        if(count($data) >= 1){
            foreach($data as $key=>$value){
            if($key != 'id'){
                $resulte .= $key . $equal . "'" . $value . "'" . $commo;
            }
        }
        $obj->bace = " UPDATE " . $obj->tablename . " SET " . $resulte . $resulte1; 
    }
    $obj->type = 'update';
    return $obj;
    } 
    public static function sort($resulte,$fields){
        $obj = static::createobj();
        $obj->type = 'sort';
        $arr = static::get();
        $data = $arr;
        $jj = 0;
        for($s = 0;$s<count($arr);$s++){
            if(count(array_keys($data)) > 0){ // maleki
                $max_or_min = $data[array_keys($data)[0]][$fields];
            if($resulte == 'dosc'){
                foreach($data as $dat){
                    if($max_or_min < $dat[$fields]){
                        $max_or_min = $dat[$fields];
                    }
                }
            }else if($resulte == 'asc'){
                foreach($data as $dat){
                    if($max_or_min > $dat[$fields]){
                        $max_or_min = $dat[$fields];
                    }
                }
            }
            foreach($data as $key => $value){
                if($max_or_min == $value[$fields]){
                    $endresulte[] = $value;
                    unset($data[$key]);
                    }
                }
                }else{
            break;
        }
        }
    return $endresulte;
}
    public static function limit($from,$to,$fields = ["*"]){
        $obj = static::createobj();
        $resulte = '';
        if($from > $to){
            $offset = $to;
            $limit = $from - $to;
            $resulte = " LIMIT " . $limit . " OFFSET " . $offset;
        }else if($from < $to){
            $offset = $from;
            $limit = $to - $from;
            $resulte = " LIMIT " . $limit . " OFFSET " . $offset;
        }
       $obj->bace = " SELECT " . implode(" , ",$fields) . " FROM " . $obj->tablename . $resulte;
       $obj->type = 'slelct'; 
        return new static;
        }

    public static function where($field,$id,$valueSelect = null,$equal = '='){
        $obj = static::createobj();
        if(!$obj->type && $valueSelect != null){
            $obj->select($valueSelect);          
        }else if(!in_array($obj->type,['update','delete'])){
            $obj->select();
        }
        if(in_array($obj->type,['select','delete','update','pagenate','with','count','whit'])){
            if(static::$search=='search'){
                $obj->where[] = "$field $equal '$id'";
                echo "🚗🚗🚗🚗";
                // var_dump($obj->where);
                static::$search='';
            }else{
                $obj->where[] = "$field $equal $id";
                // var_dump($obj->where);
                echo "🚕🚕🚕🚕";
            }
        }
        return $obj;
    }
    public static function get(){
        $obj = static::createobj();
        if(!in_array($obj->type,['insert','update'])){
            $obj->from();
        }
        if(!empty($obj->where)){
            $obj->bace .= " WHERE " . implode(" AND ",$obj->where);
        }
        $obj->where=[];
        
        if($obj->type == 'sort'){
            var_dump($obj->bace);    
            $p = $obj->connection->query($obj->bace);
            for($c = 0;$c<$p->num_rows;$c++){
                $x[] = $p->fetch_assoc();
            }
            return $x;
        }
        // echo $obj -> bace ."<br >";
        // var_dump($obj -> bace);
        echo "<br>";
        
        // var_dump($obj -> bace);
        if($obj->type != 'sort'){
        return  $obj->bace;
        }
        // return  $obj;
        // return $obj;
        // die();
    }


    public static function getsql(){     
        $obj = static::createobj();
        $obj -> get();
        $resulte = $obj->bace;
        // var_dump($resulte);
        $types = $obj->type;
        var_dump($types);
        if($types != 'sort'){
    if(!in_array($types,['update','insert'])){
            // var_dump($resulte);
            return $obj->connection->query($resulte);
        }else{
            var_dump($resulte);
            $obj->connection->query($resulte);
        }
    }
    }
}
