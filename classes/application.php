<?php

class Application {
    
    private $db_connect;
    public function __construct() {
        $host_name='localhost';
        $user_name='root';
        $password='';
        $db_name='muldhara_news';
        $this->db_connect=mysqli_connect($host_name, $user_name, $password, $db_name);
        if(!$this->db_connect) {
            die('Connection Fail'.  mysqli_error($this->db_connect) );
        }
    }
    public function select_all_published_category_info() {
        $sql='SELECT * FROM tbl_category WHERE publication_status=1';
        if(mysqli_query($this->db_connect, $sql)) {
           $query_result=mysqli_query($this->db_connect, $sql);
           return $query_result;
        }else {
            die('Query problem'.  mysqli_error($this->db_connect) );   
        }
    }
    
    public function select_all_recent_post_info() {
        $sql='SELECT * FROM tbl_post WHERE publication_status=1 ORDER BY post_id DESC LIMIT 10';
        if(mysqli_query($this->db_connect, $sql)) {
           $query_result=mysqli_query($this->db_connect, $sql);
           return $query_result;
        }else {
            die('Query problem'.  mysqli_error($this->db_connect) );   
        }
    }
    public function select_published_homepage_post_by_category_id($category_id) {
        if($category_id==1 || $category_id==2 || $category_id==6 || $category_id==7){
            $sql="SELECT * FROM tbl_post WHERE category_id='$category_id' AND publication_status=1 ORDER BY post_id DESC LIMIT 1,4" ;
        }
        elseif($category_id == 4){
            $sql="SELECT * FROM tbl_post WHERE category_id='$category_id' AND publication_status=1 ORDER BY post_id DESC LIMIT 6" ;
        }
        elseif($category_id == 11 || $category_id == 5){
            $sql="SELECT * FROM tbl_post WHERE category_id='$category_id' AND publication_status=1 ORDER BY post_id DESC LIMIT 3" ;
        }
        else{
            $sql="SELECT * FROM tbl_post WHERE category_id='$category_id' AND publication_status=1 ORDER BY post_id DESC LIMIT 4" ;
        }
        if(mysqli_query($this->db_connect, $sql)) {
           $query_result=mysqli_query($this->db_connect, $sql);
           return $query_result;
        }else {
            die('Query problem'.  mysqli_error($this->db_connect) );   
        }
    }
    public function select_published_homepage_big_post_by_category_id($category_id) {
        
        $sql="SELECT * FROM tbl_post WHERE category_id='$category_id' AND publication_status=1 ORDER BY post_id DESC LIMIT 1" ;
        
        if(mysqli_query($this->db_connect, $sql)) {
           $query_result=mysqli_query($this->db_connect, $sql);
           return $query_result;
        }else {
            die('Query problem'.  mysqli_error($this->db_connect) );   
        }
    }
    public function select_published_post_by_category_id($category_id) {
        $sql="SELECT * FROM tbl_post WHERE category_id='$category_id' AND publication_status=1 ORDER BY post_id DESC" ;
        
        if(mysqli_query($this->db_connect, $sql)) {
           $query_result=mysqli_query($this->db_connect, $sql);
           return $query_result;
        }else {
            die('Query problem'.  mysqli_error($this->db_connect) );   
        }
    }
    public function select_related_post_by_category_id($category_id) {
        $sql="SELECT * FROM tbl_post WHERE category_id='$category_id' AND publication_status=1 ORDER BY post_id DESC LIMIT 6" ;
        
        if(mysqli_query($this->db_connect, $sql)) {
           $related=mysqli_query($this->db_connect, $sql);
           return $related;
        }else {
            die('Query problem'.  mysqli_error($this->db_connect) );   
        }
    }
    public function select_category_name_by_category_id($category_id) {
        $sql="SELECT p.*, c.category_name, c.category_id FROM tbl_post as p, tbl_category as c WHERE p.category_id=c.category_id AND p.category_id='$category_id' AND p.publication_status=1 ORDER BY p.post_id DESC LIMIT 0,9" ;
        
        if(mysqli_query($this->db_connect, $sql)) {
           $category_result=mysqli_query($this->db_connect, $sql);
           return $category_result;
        }else {
            die('Query problem'.  mysqli_error($this->db_connect) );   
        }
    }
    
    public function select_post_info_by_id($post_id) {
        $sql="SELECT * FROM tbl_post WHERE post_id='$post_id' AND publication_status=1";
        if(mysqli_query($this->db_connect, $sql)) {
           $query_result=mysqli_query($this->db_connect, $sql);
           return $query_result;
        }else {
            die('Query problem'.  mysqli_error($this->db_connect) );   
        }
    }
    public function select_video_info_by_id($video_id) {
        $sql="SELECT * FROM tbl_video WHERE video_id='$video_id' AND publication_status=1";
        if(mysqli_query($this->db_connect, $sql)) {
           $video_result=mysqli_query($this->db_connect, $sql);
           return $video_result;
        }else {
            die('Query problem'.  mysqli_error($this->db_connect) );   
        }
    }
    public function select_all_recent_video_info() {
        $sql='SELECT * FROM tbl_video WHERE publication_status=1 ORDER BY video_id DESC LIMIT 10';
        if(mysqli_query($this->db_connect, $sql)) {
           $query_result=mysqli_query($this->db_connect, $sql);
           return $query_result;
        }else {
            die('Query problem'.  mysqli_error($this->db_connect) );   
        }
    }
    public function select_single_video_info() {
        $sql='SELECT * FROM tbl_video WHERE publication_status=1 ORDER BY video_id DESC LIMIT 1';
        if(mysqli_query($this->db_connect, $sql)) {
           $query_result=mysqli_query($this->db_connect, $sql);
           return $query_result;
        }else {
            die('Query problem'.  mysqli_error($this->db_connect) );   
        }
    }
    public function select_all_photo_gallery_info() {
        $sql='SELECT * FROM tbl_photo_gallery WHERE publication_status=1 ORDER BY photo_id DESC';
        if(mysqli_query($this->db_connect, $sql)) {
           $query_result=mysqli_query($this->db_connect, $sql);
           return $query_result;
        }else {
            die('Query problem'.  mysqli_error($this->db_connect) );   
        }
    }
    public function select_site_title_info() {
        $sql = "SELECT * FROM tbl_logo ORDER BY title_id DESC LIMIT 1";
        if (mysqli_query($this->db_connect, $sql)) {
            $title_info = mysqli_query($this->db_connect, $sql);
            return $title_info;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    public function select_advertise_info() {
        $sql = "SELECT * FROM tbl_advertise ORDER BY add_id DESC LIMIT 1";
        if (mysqli_query($this->db_connect, $sql)) {
            $add_info = mysqli_query($this->db_connect, $sql);
            return $add_info;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    public function textShorten($text, $limit = 350){
        //$text = $text." ";
        $text = substr($text,0,$limit);
        //$text = substr($text,0,  strrpos($text, ' '));
        $text = strip_tags($text);
        //list($text) = explode("\n",wordwrap(strip_tags($text), 500),1);
        //$text = substr($text, 0, strrpos($text, ' ')).'... <a href="/this/story">Read More></a>';
        
        $text = substr($text, 0, strrpos($text, ' ')).'......';
        return $text;
    }
    public function select_all_footer_info() {
        $sql='SELECT * FROM tbl_footer WHERE footer_id=1';
        if(mysqli_query($this->db_connect, $sql)) {
           $result=mysqli_query($this->db_connect, $sql);
           return $result;
        }else {
            die('Query problem'.  mysqli_error($this->db_connect) );   
        }
    }
    public function select_all_social_info() {
        $sql='SELECT * FROM tbl_social WHERE social_id=1';
        if(mysqli_query($this->db_connect, $sql)) {
           $social=mysqli_query($this->db_connect, $sql);
           return $social;
        }else {
            die('Query problem'.  mysqli_error($this->db_connect) );   
        }
    }
    
    
}
