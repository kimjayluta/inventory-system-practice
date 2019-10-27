<?php
class DBOperation {
    private $_CON;

    function __construct() {
        include_once("../database/db.php");
        $db = new Database();
        $this->_CON = $db->connect();
    }
    /**
        --   $$$$$$\        $$\       $$\       $$$$$$$$\                             $$\     $$\
        --  $$  __$$\       $$ |      $$ |      $$  _____|                            $$ |    \__|
        --  $$ /  $$ | $$$$$$$ | $$$$$$$ |      $$ |   $$\   $$\ $$$$$$$\   $$$$$$$\$$$$$$\   $$\  $$$$$$\  $$$$$$$\   $$$$$$$\
        --  $$$$$$$$ |$$  __$$ |$$  __$$ |      $$$$$\ $$ |  $$ |$$  __$$\ $$  _____\_$$  _|  $$ |$$  __$$\ $$  __$$\ $$  _____|
        --  $$  __$$ |$$ /  $$ |$$ /  $$ |      $$  __|$$ |  $$ |$$ |  $$ |$$ /       $$ |    $$ |$$ /  $$ |$$ |  $$ |\$$$$$$\
        --  $$ |  $$ |$$ |  $$ |$$ |  $$ |      $$ |   $$ |  $$ |$$ |  $$ |$$ |       $$ |$$\ $$ |$$ |  $$ |$$ |  $$ | \____$$\
        --  $$ |  $$ |\$$$$$$$ |\$$$$$$$ |      $$ |   \$$$$$$  |$$ |  $$ |\$$$$$$$\  \$$$$  |$$ |\$$$$$$  |$$ |  $$ |$$$$$$$  |
        --  \__|  \__| \_______| \_______|      \__|    \______/ \__|  \__| \_______|  \____/ \__| \______/ \__|  \__|\_______/
    **/

    public function addCategory($parent, $cat, $status = 1){
        $sql = "INSERT INTO `categories`(`parent_category`, `category_name`, `status`) VALUES (?,?,?);";
        $pre_stmt = $this->_CON->prepare($sql);
        $pre_stmt->bind_param("iss",$parent,$cat,$status);
        $result = $pre_stmt->execute() or die($this->_CON->error);

        if ($result){
            echo "CATEGORY_ADDED";
        } else {
            return 0;
        }
    }

    public function addBrand($brand_name, $status = 1){
        $sql = "INSERT INTO `brands`(`brand_name`, `brand_status`) VALUES (?,?);";
        $pre_stmt = $this->_CON->prepare($sql);
        $pre_stmt->bind_param("si",$brand_name,$status);
        $result = $pre_stmt->execute() or die($this->_CON->error);

        if ($result){
            echo "BRAND_ADDED";
        } else {
            return 0;
        }
    }


    public function getAllRecord($table){
        $pre_stmt = $this->_CON->prepare("SELECT * FROM ".$table);
        $pre_stmt->execute() or die($this->_CON->error);
        $result = $pre_stmt->get_result();
        $row = array();
        if ($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }
        return "NO_DATA";
    }
}

// $opr = new DBOperation();
// echo $opr->addCategory(1,"Mobiles");
// echo  "<pre>";
// print_r($opr->getAllRecord("categories"));
?>