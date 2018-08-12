<?php

class Super_admin {

    private $db_connect;

    public function __construct() {
        $host_name = 'localhost';
        $user_name = 'root';
        $password = '';
        $db_name = 'muldhara_news';
        $this->db_connect = mysqli_connect($host_name, $user_name, $password, $db_name);
        if (!$this->db_connect) {
            die('Connection Fail' . mysqli_error($this->db_connect));
        }
    }

    public function save_category_info($data) {
        $sql = "INSERT INTO tbl_category (category_name, category_description, publication_status) VALUES ('$data[category_name]', '$data[category_description]', '$data[publication_status]')";
        if (mysqli_query($this->db_connect, $sql)) {
            $message = "Waoooo category info save successfully";
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }

    public function select_all_category_info() {
        $sql = "SELECT * FROM tbl_category";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }

    public function unpublished_category_by_id($category_id) {
        $sql = "UPDATE tbl_category SET publication_status= 0 WHERE category_id='$category_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $meassage = "Category info unpublished successfully";
            return $meassage;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }

    public function published_category_by_id($category_id) {
        $sql = "UPDATE tbl_category SET publication_status= 1 WHERE category_id='$category_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $meassage = "Category info published successfully";
            return $meassage;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }

    public function select_category_info_by_id($category_id) {
        $sql = "SELECT * FROM tbl_category WHERE category_id='$category_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }

    public function update_category_info($data) {
        $sql = "UPDATE tbl_category SET category_name='$data[category_name]', category_description='$data[category_description]' , publication_status='$data[publication_status]' WHERE category_id='$data[category_id]' ";
        if (mysqli_query($this->db_connect, $sql)) {

            $_SESSION['message'] = 'Category info update successfully';

            header('Location: manage_category.php');
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }

    public function delete_category_by_id($category_id) {
        $sql = "DELETE FROM tbl_category WHERE category_id='$category_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $message = "Category info delete successfully";
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }

    public function save_post_info($data) {
        $directory = '../assets/admin_assets/post_images/';
        $target_file = $directory . $_FILES['featured_image']['name'];
        $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
        $file_size = $_FILES['featured_image']['size'];
        $image = getimagesize($_FILES['featured_image']['tmp_name']);
        if ($image) {
            if (file_exists($target_file)) {
                echo 'This image already exists';
                exit();
            } else {
                if ($file_size > 5242880) {
                    echo 'File size is too large. Please select a file within 5MB';
                    exit();
                } else {
                    if ($file_type != 'jpg' && $file_type != 'png' && $file_type != 'jpeg' && $file_type != 'gif') {
                        die('File type is not valid');
                    } else {
                        move_uploaded_file($_FILES['featured_image']['tmp_name'], $target_file);
                        $sql = "INSERT INTO tbl_post (post_title, category_id, post_content, featured_image, publication_status) VALUES ('$data[post_title]', '$data[category_id]', '$data[post_content]', '$target_file', '$data[publication_status]')";
                        if(mysqli_query($this->db_connect, $sql)) {
                            $message="Post saved successfully";
                            return $message;
                        } else {
                            die('Query problem'.  mysqli_error($this->db_connect) );   
                        }
                    }
                }
            }
        } else {
            echo 'You must upload a valid image.';
            exit();
        }
    }
    public function select_all_post_info() {
        $sql = "SELECT p.post_id, p.post_title, p.category_id, p.post_content, p.publication_status, c.category_name FROM tbl_post as p, tbl_category as c WHERE p.category_id=c.category_id";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    public function select_post_info_by_id($post_id) {
        $sql = "SELECT p.*, c.category_name FROM tbl_post as p, tbl_category as c WHERE p.category_id=c.category_id AND p.post_id='$post_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    public function unpublished_post_by_id($post_id) {
        $sql = "UPDATE tbl_post SET publication_status= 0 WHERE post_id='$post_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $meassage = "Category info unpublished successfully";
            return $meassage;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }

    public function published_post_by_id($post_id) {
        $sql = "UPDATE tbl_post SET publication_status= 1 WHERE post_id='$post_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $meassage = "Category info published successfully";
            return $meassage;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    public function update_post_info($data) {
        $sql = "UPDATE tbl_post SET post_title='$data[post_title]', category_id='$data[category_id]', post_content='$data[post_content]' , publication_status='$data[publication_status]' WHERE post_id='$data[post_id]' ";
        if (mysqli_query($this->db_connect, $sql)) {

            $_SESSION['message'] = 'Post info update successfully';

            header('Location: manage_post.php');
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    public function delete_post_by_id($post_id) {
        $sql = "DELETE FROM tbl_post WHERE post_id='$post_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $message = "Category info delete successfully";
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    public function save_video_info($data) {
        $directory = '../assets/admin_assets/post_images/';
        $target_file = $directory . $_FILES['video_thumb']['name'];
        $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
        $file_size = $_FILES['video_thumb']['size'];
        $image = getimagesize($_FILES['video_thumb']['tmp_name']);
        if ($image) {
            if (file_exists($target_file)) {
                echo 'This image already exists';
                exit();
            } else {
                if ($file_size > 5242880) {
                    echo 'File size is too large. Please select a file within 5MB';
                    exit();
                } else {
                    if ($file_type != 'jpg' && $file_type != 'png' && $file_type != 'jpeg' && $file_type != 'gif') {
                        die('File type is not valid');
                    } else {
                        move_uploaded_file($_FILES['video_thumb']['tmp_name'], $target_file);
                        $sql = "INSERT INTO tbl_video (video_title, video_content, video_link, video_thumb, publication_status) VALUES ('$data[video_title]', '$data[video_content]', '$data[video_link]', '$target_file', '$data[publication_status]')";
                        if(mysqli_query($this->db_connect, $sql)) {
                            $message="Video saved successfully";
                            return $message;
                        } else {
                            die('Query problem'.  mysqli_error($this->db_connect) );   
                        }
                    }
                }
            }
        } else {
            echo 'You must upload a valid image.';
            exit();
        }
    }
    
    public function select_all_video_info() {
        $sql = "SELECT * FROM tbl_video";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    
    public function unpublished_video_by_id($video_id) {
        $sql = "UPDATE tbl_video SET publication_status= 0 WHERE video_id='$video_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $meassage = "Video info unpublished successfully";
            return $meassage;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }

    public function published_video_by_id($video_id) {
        $sql = "UPDATE tbl_video SET publication_status= 1 WHERE video_id='$video_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $meassage = "Video info published successfully";
            return $meassage;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    public function update_video_info($data) {
        $sql = "UPDATE tbl_video SET video_title='$data[video_title]', video_link='$data[video_link]', video_content='$data[video_content]', publication_status='$data[publication_status]' WHERE video_id='$data[video_id]' ";
        if (mysqli_query($this->db_connect, $sql)) {

            $message = 'Video info update successfully';

            header('Location: manage_video.php');
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    public function delete_video_by_id($post_id) {
        $sql = "DELETE FROM tbl_video WHERE video_id='$video_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $message = "Video info delete successfully";
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    public function save_photo_gallery_info($data) {
        $directory = '../assets/admin_assets/post_images/';
        $target_file = $directory . $_FILES['upload_image']['name'];
        $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
        $file_size = $_FILES['upload_image']['size'];
        $image = getimagesize($_FILES['upload_image']['tmp_name']);
        if ($image) {
            if (file_exists($target_file)) {
                echo 'This image already exists';
                exit();
            } else {
                if ($file_size > 5242880) {
                    echo 'File size is too large. Please select a file within 5MB';
                    exit();
                } else {
                    if ($file_type != 'jpg' && $file_type != 'png' && $file_type != 'jpeg' && $file_type != 'gif') {
                        die('File type is not valid');
                    } else {
                        move_uploaded_file($_FILES['upload_image']['tmp_name'], $target_file);
                        $sql = "INSERT INTO tbl_photo_gallery (photo_title, photo_link, publication_status) VALUES ('$data[image_title]', '$target_file', '$data[publication_status]')";
                        if(mysqli_query($this->db_connect, $sql)) {
                            $message="Gallery Image saved successfully";
                            return $message;
                        } else {
                            die('Query problem'.  mysqli_error($this->db_connect) );   
                        }
                    }
                }
            }
        } else {
            echo 'You must upload a valid image.';
            exit();
        }
    }
    
    public function select_photo_gallery_info() {
        $sql = "SELECT * FROM tbl_photo_gallery";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    public function unpublished_photo_gallery_by_id($photo_id) {
        $sql = "UPDATE tbl_photo_gallery SET publication_status= 0 WHERE photo_id='$photo_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $meassage = "Gallery info unpublished successfully";
            return $meassage;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }

    public function published_photo_gallery_by_id($photo_id) {
        $sql = "UPDATE tbl_photo_gallery SET publication_status= 1 WHERE photo_id='$photo_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $meassage = "Gallery info published successfully";
            return $meassage;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    public function delete_photo_gallery_by_id($photo_id) {
        $sql = "DELETE FROM tbl_photo_gallery WHERE photo_id='$photo_id' ";
        if (mysqli_query($this->db_connect, $sql)) {
            $message = "Video info delete successfully";
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    public function save_footer_info($data) {
        $sql = "INSERT INTO tbl_footer (footer_left, footer_right) VALUES ('$data[footer_left]', '$data[footer_right]')";
        if (mysqli_query($this->db_connect, $sql)) {
            $message = "Footer Info Save Successfully";
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    public function select_footer_info() {
        $sql = "SELECT * FROM tbl_footer";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    public function update_footer_info($data) {
        $sql = "UPDATE tbl_footer SET footer_left='$data[footer_left]', footer_right='$data[footer_right]', copyright_text='$data[copyright_text]' WHERE footer_id='1' ";
        if (mysqli_query($this->db_connect, $sql)) {

            $_SESSION['message'] = 'Footer info update successfully';
            header('Location: footer_info.php');

        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    public function select_social_info() {
        $sql = "SELECT * FROM tbl_social";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    public function update_social_info($data) {
        $sql = "UPDATE tbl_social SET facebook='$data[facebook]', twitter='$data[twitter]', google_plus='$data[google_plus]' WHERE social_id='1' ";
        if (mysqli_query($this->db_connect, $sql)) {

            $_SESSION['message'] = 'Social info update successfully';
            header('Location: social.php');

        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    public function select_site_title_info() {
        $sql = "SELECT * FROM tbl_logo ORDER BY title_id DESC LIMIT 1";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    public function update_site_title_info($data) {
        $directory = '../assets/admin_assets/post_images/';
        $target_file = $directory . $_FILES['site_logo']['name'];
        $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
        $file_size = $_FILES['site_logo']['size'];
        $image = getimagesize($_FILES['site_logo']['tmp_name']);
        if ($image) {
            if (file_exists($target_file)) {
                echo 'This image already exists';
                exit();
            } else {
                if ($file_size > 5242880) {
                    echo 'File size is too large. Please select a file within 5MB';
                    exit();
                } else {
                    if ($file_type != 'jpg' && $file_type != 'png' && $file_type != 'jpeg' && $file_type != 'gif') {
                        die('File type is not valid');
                    } else {
                        move_uploaded_file($_FILES['site_logo']['tmp_name'], $target_file);
                        $sql = "INSERT INTO tbl_logo (site_title, site_logo, site_description) VALUES ('$data[site_title]', '$target_file', '$data[site_description]')";
                        if(mysqli_query($this->db_connect, $sql)) {
                            $message="Site Title Info updated successfully";
                            return $message;
                        } else {
                            die('Query problem'.  mysqli_error($this->db_connect) );   
                        }
                    }
                }
            }
        } else {
            echo 'You must upload a valid image.';
            exit();
        }
    }
    public function select_advertise_info() {
        $sql = "SELECT * FROM tbl_advertise ORDER BY add_id DESC LIMIT 1";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    public function update_advertise_info($data) {
        $directory = '../assets/admin_assets/post_images/';
        $target_file = $directory . $_FILES['add_image']['name'];
        $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
        $file_size = $_FILES['add_image']['size'];
        $image = getimagesize($_FILES['add_image']['tmp_name']);
        if ($image) {
            if (file_exists($target_file)) {
                echo 'This image already exists';
                exit();
            } else {
                if ($file_size > 5242880) {
                    echo 'File size is too large. Please select a file within 5MB';
                    exit();
                } else {
                    if ($file_type != 'jpg' && $file_type != 'png' && $file_type != 'jpeg' && $file_type != 'gif') {
                        die('File type is not valid');
                    } else {
                        move_uploaded_file($_FILES['add_image']['tmp_name'], $target_file);
                        $sql = "INSERT INTO tbl_advertise (company_link, add_image) VALUES ('$data[company_link]', '$target_file')";
                        if(mysqli_query($this->db_connect, $sql)) {
                            $message="Advertise Info updated successfully";
                            return $message;
                        } else {
                            die('Query problem'.  mysqli_error($this->db_connect) );   
                        }
                    }
                }
            }
        } else {
            echo 'You must upload a valid image.';
            exit();
        }
    }
    
    

    public function logout() {

        unset($_SESSION['admin_name']);
        unset($_SESSION['admin_id']);

        header('Location: index.php');
    }

}
