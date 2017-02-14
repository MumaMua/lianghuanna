<?php
/*作者：绿子小姐
 *time：2016.7.26
 *说明：数据库操作类
 */
class me_db{
    //定义私有属性
    private $host='localhost';
    private $user='root';
    private $pwd='123456';
    private $database='webhuan';
    /*创建对象 直接链接数据库服务器及选择数据库
     *
     *
     */
    function __construct($host1='',$user1='',$pwd1='',$database1=''){
        if(empty($host1) && empty($user1)&& empty($pwd1)&& empty($database1))
        {
        mysql_connect($this->host,$this->user,$this->pwd) or die(mysql_error("默认的数据库服务器链接失败。"));
     mysql_select_db($this->database)  or die(mysql_error("默认的数据库选择失败。"));
        }else{
         mysql_connect($host1,$user1,$pwd1) or die(mysql_error("传递的数据库服务器失败。"));
            mysql_select_db($database1) or die(mysql_error("传递的数据库失败。")) ;
        
        }
        mysql_query('set names utf8');
    }
    public function query($sql){
        $query=mysql_query($sql) or die(mysql_error());
        return $query;
    }

    /*功能：获取数据库表中所有的数据
     *参数：@para $sql string 获取sql语句
     *      @para $type 值的类型
     *return $arr 二维数组
     */
    public function get_all_data($sql,$type=MYSQL_ASSOC){
        $arr=array();
        $i=0;
       $query=$this->query($sql);
       while($row=mysql_fetch_array($query,$type)){
           $arr[$i]=$row;
           $i++;       
       }
       return $arr;    
    }
    /*功能：通过表名和条件获取表中的记录，并直接以列表的形式输出
     *
     *
     */
    public function get_data($table,$condition){
        $arr=array();
        $i=0;
        //构建sql语句
        $sql="select * from $table $condition";
        $query=mysql_query($sql) or die(mysql_error());
        while($res=mysql_fetch_array($query)){
            $arr[$i]=$res;
            $i++;
        }
        return $arr;
    }
    /*功能：根据传递的id获取一条数据并返回
     *@para1 $table 表名
     *@para2 $id  删除的id
     *return $res array
     */
    public function getone($table,$id){
        $id=intval($id);
        $sql="select * from $table where sid=$id limit 1";
        $query=mysql_query($sql) or die(mysql_error());
        $res=mysql_fetch_array($query);
        return $res;    
    }
    /*功能：完成对表中数据的插入操作
     *@para :表名  $table string
     *@para :要插入的数据  $insertData array
     *return boolean true/false
     */
    public function insert($table,$insertData,$page='index.php'){
        $key='';//把数组$insertData所有的key取出组合成key
        $value='';
        if(!is_array($insertData)|| (count($insertData)<=0)){
            echo "数据错误或数组中没有要插入的值。";
            return false;
        }
        //list each
        //判断插入的值是否是数组，并且不能为空
        //当$insertData是数组时，并且为空，则返回出错信息。
        //当$insertData不是数组时，则返回出错信息。
        while(list($k,$v)=each($insertData) ){
            $key .="$k,";
            $value .="'$v',";
        }
        $key=substr($key,0,-1);//构建好了要插入的键
        $value=substr($value,0,-1);//构建好了要插入的值
        $sql="insert into $table ($key) values ($value)";   
        $this->query($sql);
        if(mysql_insert_id()>0){
         echo "<script>
        alert('数据插入成功。');
        window.location.href='$page';
        </script>";
        }else{
        echo "<script>
        alert('数据插入失败。');
        window.location.href='$page';
        </script>";
        }
    }
    /*功能：此方法实现对表的更新操作
     *@para: 表名 $table
     *@para: 更新的数据 updateData array
     *@para: 更新条件 $condition string
     */
    public function update($table,$updateData,$condition='',$page='index.php'){
        if(empty($condition)){
         echo "
            <script>
            alert('没有条件呀，怎么更新。');
            window.location.href='getdata.php';
            </script>        
            ";     
        }
        $res='';
        while(list($k,$v)=each($updateData)){
        $res.="$k='$v',";
        }
        $res=substr($res,0,-1);
        $sql="update $table set $res where $condition";
        $this->query($sql);
        if(mysql_affected_rows()>0){
        echo "
            <script>
            alert('数据更新成功。');
            window.location.href='$page';
            </script>        
            ";        
        } else{    
          echo "
            <script>
            alert('数据更新失败。');
           window.location.href='$page';
            </script>
            ";    
                 }
    }
    /*功能：按照某种条件对数据库的记录进行删除
     *@para :$table string
     *@para :$condition string
     *return void
     */
    public function del($table,$condition='',$page='index.php'){
         if(empty($condition)){
         echo "
            <script>
            alert('没有条件呀,怎么删。');
            window.location.href='getdata.php';
            </script>        
            ";     
        }
        $sql="delete from $table where $condition";
         $this->query($sql);
        if(mysql_affected_rows()>0){
        echo "
            <script>
            alert('数据删除成功。');
            window.location.href='$page';
            </script>        
            ";        
        } else{    
          echo "
            <script>
            alert('数据删除失败。');
            window.location.href='$page';
            </script>
            ";    
                 }
    }

}
//$db=new me_db;
?>
